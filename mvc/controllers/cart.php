<?php

/**
 * Class Cart
 */
class Cart extends Controller
{
    /**
     * @inheritDoc
     */
    public function execute()
    {
        $this->view('client',
            [
                "page"      => 'cart',
                "title"     => 'Giỏ hàng',
                "category"  => $this->getCategory()
            ]
        );
    }
}