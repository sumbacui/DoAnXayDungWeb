<?php
/**
 * Class OrderModel
 */
class OrderModel extends DB
{
    const TABLE_NAME = 'orders';
    
    /**
     * @return string
     */
    public function getTableName()
    {
        return self::TABLE_NAME;
    }

    public function updateStatus($id,$mode)
    {
        if($mode == 1){
            $sql = "UPDATE orders
            SET status = 1
            WHERE id = '{$id}'";
        }else{
            $sql = "UPDATE orders
            SET status = 2
            WHERE id = '{$id}'";
        }
        return mysqli_query($this->con, $sql);
    }


    function getOrderByCustomerId($id)
    {
        $data = [];
        $sql = "SELECT * FROM {$this->getTableName()} WHERE user_id = {$id}";
        $result = mysqli_query($this->con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }

    public function getDetailOrder($id)
    {
        $data = [];
        $sql = "SELECT o.*, p.name FROM order_details o, products p
        WHERE o.product_id = p.id AND o.order_id = '{$id}'";
        $result = mysqli_query($this->con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }

    public function getOrder()
    {
        $data = [];
        $sql = "SELECT o.*, c.name FROM orders o, users c WHERE o.user_id = c.id";
        $result = mysqli_query($this->con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }

    public function getOrderByDate()
    {
        $data = [];
        $sql = "SELECT SUM(total) total_price, DATE_FORMAT(created_at, '%d/%m/%Y') order_day FROM orders
        WHERE status = 1 GROUP BY DATE_FORMAT(created_at,'%d/%m/%Y')";
        $result = mysqli_query($this->con, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
} 