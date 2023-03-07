<?php

/**
 * Class Checkout
 */
class Checkout extends Controller
{
    /**
     * @inheritDoc
     */
    public function execute()
    {
        $model = $this->model('UserModel');
        $data  = $model->getById($_SESSION['customer_id']);
        $this->view("client",
            [
                "page"              => "checkout",
                "title"             => "Thanh toán",
                "customer"          => $data,
                "category"          => $this->getCategory()
            ]
        );
    }
}