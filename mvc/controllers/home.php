<?php

/**
 * Class Home
 */
class Home extends Controller
{
    /**
     * @inheritDoc
     */
    public function execute()
    {
        $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page']:12;
        $current_page = !empty($_GET['page']) ? $_GET['page']:1;
        $offset = ($current_page - 1) * $item_per_page;
        $this->view("client", [
            "page"          => "home",
            "title"         => "Trang chủ",
            "category"      => $this->getCategory(),
            'product'       => $this->getProducts($item_per_page,$offset),
            'total'         => $this->getTotal($item_per_page),
            'item_per_page' => $item_per_page,
            'current_page'  => $current_page
        ]);
    }

    public function getProducts($item_per_page,$offset){
        $model = $this->model('ProductModel');
        return $model->getProducts($item_per_page,$offset);
    }

    public function getTotal($item_per_page)
    {
        $model = $this->model('ProductModel');
        return $model->getTotal($item_per_page);
    }

    /**
     * @return mixed
     */
    public function login()
    {
        $this->view("client", [
            "page"      => "login",
            "title"     => "Đăng nhập",
            "category"  => $this->getCategory()
        ]);
    }

    /**
     * @return mixed
     */
    public function handleLogin()
    {
        $email = $_POST['email'] ?: '';
        $password = $_POST['password'] ?: '';

        $model = $this->model('UserModel');
        $exists = $model->check($email,$password);

        if ($exists) {
            if ($_SESSION['role'] == 0) {
                return $this->redirect('?url=home');
            } else {
                return $this->redirect('?url=dashboard');
            }
        } else {
            $this->addErrorMessage('Email/mật khẩu không đúng hoặc tài khoản đã bị khóa');
            return $this->redirect('?url=home/login');
        }
    }

    /**
     * @return mixed
     */
    public function register()
    {
        $this->view("client", [
            "page"      => "register",
            "title"     => "Đăng ký",
            "category"  => $this->getCategory()
        ]);
    }

    /**
     * @return mixed
     */
    public function handleRegister()
    {
        $name = $_POST['name'] ?: '';
        $email = $_POST['email'] ?: '';
        $password = $_POST['password'] ?: '';
        $repassword = $_POST['repeatpassword'] ?: '';
        $sex = $_POST['sex'] ?: '';
        $phone = $_POST['phone'] ?: '';
        $model = $this->model('UserModel');
        $isCheck = $model->checkEmailExist($email);
        if($isCheck) {
            if ($password === $repassword) {
                $exists = $model->insert($name, $email, $password, $sex, $phone);
                if ($exists) {
                    $this->addSuccessMessage('Đăng ký thành công');
                    return $this->redirect('?url=home/login');
                } else {
                    $this->addErrorMessage('Đã xảy ra lỗi đăng ký');
                    return $this->redirect('?url=home/register');
                }
            } else {
                $this->addErrorMessage('Mật khẩu không khớp, vui lòng nhập lại');
                return $this->redirect('?url=home/register');
            }
        } else {
            $this->addErrorMessage('Email đã tồn tại');
            return $this->redirect('?url=home/register');
        }
    }

    /**
     * @return mixed
     */
    public function detail($id)
    {
        $khModel = $this->model('UserModel');
        $data = $khModel->getById($id);
        $this->view("client", [
            "page"      => "profile",
            "title"     => "Chi tiết khách hàng",
            "category"  => $this->getCategory(),
            "customer"  => $data
        ]);
    }

    /**
     * @return mixed
     */
    public function logout()
    {
        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_name']);
        unset($_SESSION['success']);
        unset($_SESSION['error']);
        unset($_SESSION['role']);
        $this->redirect('?url=home/login');
    }

    /**
     * @return mixed
     */
    public function getOrder($id)
    {
        $orderModel = $this->model('OrderModel');
        $data = $orderModel->getOrderByCustomerId($id);
        $this->view("client", [
            "page"      => "order",
            "title"     => "Đơn hàng của tôi",
            "category"  => $this->getCategory(),
            "order"     => $data
        ]);
    }

    /**
     * @return mixed
     */
    public function getOrderDetail($id)
    {
        $orderModel = $this->model('OrderModel');
        $data = $orderModel->getDetailOrder($id);
        $this->view("client", [
            "page"      => "order_detail",
            "title"     => '#'.$id,
            "category"  => $this->getCategory(),
            "order"     => $data,
            "id"        => $id
        ]);
    }

    /**
     * @return mixed
     */
    public function cancleOrder($id)
    {
        $orderModel = $this->model('OrderModel');
        $status = $orderModel->updateStatus($id,2);
        $model = $this->model('UserModel');
        $model->updateCancle();
        if($status){
            $this->addSuccessMessage('Hủy đơn hàng thành công');
            $this->redirect('?url=home/getOrder/'.$_SESSION['customer_id']);
        }
    }

    public function changepass()
    {
        $this->view('client',
        [
            'page'          => 'changepass',
            'title'         => 'Đổi mật khẩu',
            "category"      => $this->getCategory(),
        ]);
    }

    public function handleChangePass($id)
    {
        $current_password = $_POST['current-password'];
        $new_password = $_POST['new-password'];
        $password = $_POST['password'];
        $model = $this->model('UserModel');
        $is_check = $model->checkCurrentPassword($id, $current_password);
        if ($is_check) {
            if ($new_password == $password) {
                $model->updatePass($id, $password);
                $this->addSuccessMessage('Đổi mật khẩu thành công');
                return $this->redirect('?url=home/logout');
            } else {
                $this->addErrorMessage('Mật khẩu không trùng khớp');
                return $this->redirect('?url=user/changepass');
            }
        } else {
            $this->addErrorMessage('Mật khẩu hiện tại không đúng');
            return $this->redirect('?url=user/changepass');
        }
    }

    public function getProductOrder()
    {
        $orderModel = $this->model('OrderModel');
        $products = $orderModel->getDetailOrder($_GET['order']);
        echo json_encode($products);
    }
}