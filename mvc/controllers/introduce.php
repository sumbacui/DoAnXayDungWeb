<?php

/**
 * Class Introduce
 */
class Introduce extends Controller
{
    function execute()
    {
        $this->view('client',
            [
                'page'          => 'introduce',
                'title'         => 'Giới thiệu',
                "category"      => $this->getCategory()
            ]
        );
    }
}