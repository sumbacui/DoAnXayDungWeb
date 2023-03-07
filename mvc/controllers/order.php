<?php

/**
 * Class Order
 */
class Order extends Controller
{
    /**
     * @inheritDoc
     */
    public function execute()
    {
        $model = $this->model('OrderModel');
        $data = $model->getOrder();
        $this->view('index',
            [
                'page'          => 'order',
                'title'         => 'Danh sách đơn hàng',
                'order'         => $data
            ]
        );
    }


    function delete($id = null)
    {
        $model = $this->model('OrderModel');
        $status = $model->deleteById($id);
        if($status){
            $this->addSuccessMessage('Xóa đơn hàng thành công.');
            return $this->redirect('?url=order');
        }
    }

    function show($id = null)
    {
        $model = $this->model('OrderModel');
        $data = $model->getOrderByCustomerId($id);
        $this->view('index',
            [
                'page'          => 'order',
                'title'         => 'Đơn hàng của tôi',
                'order'         =>  $data,
                'category'      => $this->getCategory()
            ]
        );
    }

    /**
     * @return mixed
     */
    public function detail_client($id)
    {
        $orderModel = $this->model('OrderModel');
        $data = $orderModel->getDetailOrder($id);
        $this->view("client", [
            "page"      => "order_detail",
            "title"     => '#'.$id,
            "order"     => $data,
            "id"        => $id,
            "category"  => $this->getCategory()
        ]);
    }

    /**
     * @return mixed
     */
    public function detail_admin($id)
    {
        $orderModel = $this->model('OrderModel');
        $data = $orderModel->getDetailOrder($id);
        $this->view("index", [
            "page"      => "order_detail",
            "title"     => '#'.$id,
            "order"     => $data,
            "id"        => $id
        ]);
    }

    /**
     * @return mixed
     */
    public function accept($id)
    {
        $orderModel = $this->model('OrderModel');
        $status = $orderModel->updateStatus($id,1);
        if($status){
            $this->addSuccessMessage('Xác nhận đơn hàng thành công');
            $this->redirect('?url=order');
        }
    }

    /**
     * @return mixed
     */
    public function cancle($id)
    {
        $orderModel = $this->model('OrderModel');
        $status = $orderModel->updateStatus($id,2);
        if($status){
            $this->addSuccessMessage('Hủy đơn hàng thành công');
            $this->redirect('?url=order');
        }
    }
}
