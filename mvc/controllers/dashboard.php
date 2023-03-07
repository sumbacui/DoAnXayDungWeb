<?php

/**
 * Class Dashboard
 */
class Dashboard extends Controller
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
        $orderModel = $this->model('OrderModel');
        $order = $orderModel->getOrderByDate();
        $this->view('index',
            [
                'page'          => 'dashboard',
                'title'         => 'Thống kê',
                'order'         => $order
            ]
        );
    }
}