<?php

/**
 * Class Product
 */
class Product extends Controller
{
    /**
     * @inheritDoc
     */
    public function execute()
    {
        $this->view('index',
            [
                'page'          => 'product',
                'title'         => 'Quản lý sản phẩm',
                'products'      => $this->getListProduct()
            ]
        );
    }

    /**
     * @inheritDoc
     */
    public function detail($id)
    {
        $proModel = $this->model('ProductModel');
        $product = $proModel->getById($id);
        $this->view('client',
            [
                'page'  => 'detail',
                'title' => $product['name'],
                'product' => $product,
                "category"  => $this->getCategory(),
            ]
        );
    }

    /**
     * @inheritDoc
     */
    public function category($id)
    {
        $proModel = $this->model('ProductModel');
        $product = $proModel->getByCateId($id);
        $cateModel = $this->model('CategoryModel');
        $cate = $cateModel->getById($id);
        $this->view('client',
            [
                'page'      => 'product_category',
                'title'     => $cate['name'],
                'product'   => $product,
                "category"  => $this->getCategory()
            ]
        );
    }

    /**
     * @inheritDoc
     */
    public function addToCart()
    {
       if(!isset($_SESSION['customer_id'])){
         $this->addErrorMessage('Vui lòng đăng nhập trước khi mua hàng.');
         return $this->redirect('?url=user/login');
       }

        if(isset($_POST['submit'])){
            if(isset($_SESSION["shopping_cart"])){
                $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
                if(!in_array($_POST["id"], $item_array_id)){
                    $item_array = [
                        'item_id' => $_POST['id'],
                        'item_name' => $_POST['name'],
                        'item_price' => $_POST['price'],
                        'item_image' => $_POST['image'],
                        'item_qty' => 1,
                        'user_id' => $_SESSION['customer_id']
                    ];
                    $_SESSION["shopping_cart"][$_POST['id']] = $item_array;
                    echo "<script>
                        alert('Thêm giỏ hàng thành công');
                        window.location.href = '?url=product/detail/".$_POST['id']."';</script>";
                }else{  
                    $_SESSION["shopping_cart"][$_POST['id']]['item_qty'] += 1;
                    echo "<script>
                        alert('Thêm giỏ hàng thành công');
                        window.location.href = '?url=product/detail/".$_POST['id']."';</script>";
                }
            }else{
                $item_array = [
                    'item_id' => $_POST['id'],
                    'item_name' => $_POST['name'],
                    'item_price' => $_POST['price'],
                    'item_image' => $_POST['image'],
                    'item_qty' => 1,
                    'user_id' => $_SESSION['customer_id']
                ];
                $_SESSION["shopping_cart"][$_POST['id']] = $item_array;
                echo "<script>
                alert('Thêm giỏ hàng thành công');
                window.location.href = '?url=product/detail/".$_POST['id']."';</script>";
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function deleteCart($id)
    {
        if(isset($_SESSION["shopping_cart"])){
            foreach($_SESSION["shopping_cart"] as $key => $values){
                if($id === $values["item_id"]){
                    unset($_SESSION["shopping_cart"][$key]);
                }
            }
            $this->redirect('?url=cart');
        }
    }

    /**
     * @inheritDoc
     */
    public function increase($id)
    {
        if(isset($_SESSION["shopping_cart"])){
            foreach($_SESSION["shopping_cart"] as $key => $values){
                if($id === $values["item_id"]){
                    $_SESSION["shopping_cart"][$key]['item_qty'] += 1;
                }
            }
            $this->redirect('?url=cart');
        }
    }

    /**
     * @inheritDoc
     */
    public function decrease($id)
    {
        if(isset($_SESSION["shopping_cart"])){
            foreach($_SESSION["shopping_cart"] as $key => $values){
                if($id === $values["item_id"]){
                    $_SESSION["shopping_cart"][$key]['item_qty'] -= 1;
                    if($_SESSION["shopping_cart"][$key]['item_qty'] == 0){
                        unset($_SESSION["shopping_cart"][$key]);
                    }
                }
            }
            $this->redirect('?url=cart');
        }
    }

    /**
     * @inheritDoc
     */
    public function pay()
    {
        $data = null;
        $cartModel = $this->model('CartModel');
        $order_id = 'order_' . random_int(100000, 999999);
        $status = $cartModel->pay($_SESSION['customer_id'],$_SESSION['shopping_cart'],$_POST,$order_id);
        if($status){
            unset($_SESSION['shopping_cart']);
            echo "<script>
                alert('Thanh toán thành công');
                window.location.href = '?url=home';
            </script>";
        }
    }

    /**
     * @inheritDoc
     */
    public function search()
    {
        $q = $_POST['q'];
        $proModel = $this->model('ProductModel');
        $data = $proModel->search($q);
        $this->view('client',
            [
                'page'      => 'search',
                'title'     => 'Tìm kiếm sản phẩm với từ khóa '.$q,
                'product'   => $data,
                "category"  => $this->getCategory(),
                'q'         => $q
            ]
        );
    }

    /**
     * @param null $id
     */
    public function edit($id = null)
    {
        $data = [];
        if ($id) {
            $data = $this->getById($id);
        }

        $this->view('index',
            [
                'page'          => 'product_edit',
                'title'         => 'Tạo mới sản phẩm',
                'product'       => $data,
                'categories'    => $this->getList()
            ]
        );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $model = $this->model('ProductModel');
        return $model->getById($id);
    }

    public function getList()
    {
        $model = $this->model('CategoryModel');
        return $model->getList();
    }

    /**
     * @return mixed
     */
    public function update()
    {
        $id          = $_POST['id'] ?: null;
        $category    = $_POST['category'] ?: '';
        $name        = $_POST['name'] ?: '';
        $price       = $_POST['price'] ?: '';
        $qty         = $_POST['qty'] ?: '';
        $description = $_POST['description'] ?: '';
        $fileImg     = $_FILES['thumbnail'];

        try {
            $model = $this->model('ProductModel');
            //$check_name = $model->checkName($name);
            if ($check_name >0){
                $this->addErrorMessage('Đã có lỗi trùng tên sản phẩm');
                return $this->redirect();
            }
            if ($id) {
                $info = $model->update($id, $category, $name, $price, $qty, $description, $fileImg);
                if ($info) {
                    $this->addSuccessMessage('Cập nhật sản phẩm thành công.');
                } else {
                    $this->addErrorMessage('Đã có lỗi xảy ra khi cập nhật thông tin sản phẩm.');
                }
            } else {
                $hh = $model->insert($category, $name, $price, $qty, $description, $fileImg);
                if ($hh) {
                    $this->addSuccessMessage('Tạo mới sản phẩm thành công.');
                } else {
                    $this->addErrorMessage('Đã có lỗi xảy ra khi tạo mới thông tin sản phẩm.');
                }
            }
        } catch (\Exception $exception) {
            $this->addErrorMessage($exception->getMessage());
        }

        return $this->redirect('?url=product');
    }

    public function getListProduct()
    {
        $model = $this->model('ProductModel');
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
            return $this->redirect('?url=product');
        }

        try {
            $model = $this->model('ProductModel');
            $model->deleteById($id);
            $this->addSuccessMessage('Xóa sản phẩm thành công.');
        } catch (\Exception $e) {
            $this->addErrorMessage($e->getMessage());
        }

        return $this->redirect('?url=product');
    }
}