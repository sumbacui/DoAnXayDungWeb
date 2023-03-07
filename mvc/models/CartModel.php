<?php

/**
 * Class CartModel
 */
class CartModel extends DB
{
    public function pay($customerId, $data, $request, $orderId)
    {
        $total = 0;
        foreach ($data as $item) { 
            $total += $item['item_qty'] * $item['item_price'];
        }
        $sql = "INSERT INTO `orders` (id, user_id, address, total)
            VALUES ('{$orderId}', $customerId, '{$request['address']}', $total)";
        $status = mysqli_query($this->con, $sql);
        if ($status) {
            mysqli_query($this->con, $sql);
            foreach ($data as $item) {
                $productId = $item['item_id'];
                $qty = $item['item_qty'];
                $price = $item['item_price'];
                $sql = "INSERT INTO `order_details` (order_id, product_id, qty, price)
                VALUES ('{$orderId}', $productId, $qty, $price)";
                $status = mysqli_query($this->con, $sql);
                if($status){
                    $sql = "UPDATE products SET qty = qty - $qty WHERE id = {$productId}";
                    mysqli_query($this->con, $sql);
                }
            }
            return true;
        }
    }
}