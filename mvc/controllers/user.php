<?php

/**
 * Class User
 */
class User extends Controller
{
    public function __construct()
    {
        if ($_SESSION['role'] == 0) {
            return $this->redirect('?url=home/login');
        }
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $this->view('index',
            [
                'page'          => 'user',
                'title'         => 'Quản lý người dùng',
                'users'         => $this->getList()
            ]
        );
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        $model = $this->model('UserModel');
        return $model->getList();
    }

    /**
     * @param null $id
     * @return mixed
     */
    public function delete($id = null)
    {
        if (!$id) {
            $this->addErrorMessage('Trang không tồn tại.');
            return $this->redirect('?url=user');
        }

        try {
            $model = $this->model('UserModel');
            $status = $model->deleteById($id);
            if ($status) {
                $this->addSuccessMessage('Xóa người dùng thành công.');
            } else {
                $this->addErrorMessage('Vui lòng xóa đơn hàng của người dùng này trước khi xóa tài khoản người dùng');
            }
        } catch (\Exception $e) {
            $this->addErrorMessage($e->getMessage());
        }

        return $this->redirect('?url=user');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCustomerById($id)
    {
        $model = $this->model('UserModel');
        return $model->getById($id);
    }

    public function edit()
    {
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $phone = $_POST['phone'];
        $id = $_SESSION['customer_id'];

        $model = $this->model('UserModel');

        $info = $model->update($id, $name, $sex, $phone);
        if ($info) {
            $this->addSuccessMessage('Cập nhật tài khoản thành công.');
        } else {
            $this->addErrorMessage('Đã có lỗi xảy ra khi cập nhật tài khoản.');
        }

        return $this->redirect('?url=home/detail/'.$id);
    }
}