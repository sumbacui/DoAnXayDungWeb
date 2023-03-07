<?php

/**
 * Class ProductModel
 */
class ProductModel extends DB
{
    const TABLE_NAME = 'products';

    /**
     * @return array
     */
    public function getList()
    {
        $sql = "SELECT main.*, l.name AS cate_name FROM {$this->getTableName()} AS main
        LEFT JOIN categories AS l ON main.category_id = l.id";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        return self::TABLE_NAME;
    }

    /**
     * @param $id
     * @return string[]|null
     */
    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = {$id}";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    /**
     * @param $id
     * @return bool|mysqli_result
     */
    public function deleteById($id)
    {
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = {$id}";
        return mysqli_query($this->con, $sql);
    }

    /**
     * @param $category
     * @param $name
     * @param $price
     * @param $qty
     * @param $description
     * @param $image
     * @return int|string
     */
    public function insert($category, $name, $price, $qty, $description, $fileImg)
    {
        $img_name = date('Y_m_d_H_i_s').$fileImg['name'];
        $tmp_name = $fileImg['tmp_name'];
        if (!move_uploaded_file($tmp_name, str_replace('\\', '/', ROOT_PATH).'/uploads/products/'.$img_name)) {
            $img_name = '';
        }
        $description = htmlentities($description);
        $sql = "INSERT INTO {$this->getTableName()} (`category_id`, `name`, `price`, `qty`, `description`, `image`)
                VALUES ('{$category}', '{$name}', {$price}, {$qty}, '{$description}', '{$img_name}')";
        mysqli_query($this->con, $sql);
        return mysqli_insert_id($this->con);
    }

    /**
     * @param $id
     * @param $category
     * @param $name
     * @param $price
     * @param $qty
     * @param $description
     * @param $image
     * @return int|string
     */
    public function update($id, $category, $name, $price, $qty, $description, $fileImg)
    {   
        $img_name = date('Y_m_d_H_i_s').$fileImg['name'];
        $tmp_name = $fileImg['tmp_name'];
        $description = htmlentities($description);
        $sql = "UPDATE {$this->getTableName()}
                SET `name` = '{$name}', `description` = '{$description}', `price` = {$price}, `qty` = {$qty}, `category_id` = '{$category}'";
        if (move_uploaded_file($tmp_name, str_replace('\\', '/', ROOT_PATH).'/uploads/products/'.$img_name)) {
            $sql .= ", image = '{$img_name}'";
        }
        $sql .= "  WHERE id = {$id}";
        return mysqli_query($this->con, $sql);
    }


    /**
     * @param $id
     * @return string[]|null
     */
    public function getByCateId($id)
    {
        $data = [];
        $sql = "SELECT * FROM {$this->getTableName()} WHERE category_id = {$id}";
        $result = mysqli_query($this->con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }

    /**
     * @param $q
     * @return string[]|null
     */
    public function search($q)
    {
        $data = [];
        $sql = "SELECT * FROM {$this->getTableName()} WHERE name LIKE '%".$q."%'";
        $result = mysqli_query($this->con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }

    public function getProducts($item_per_page,$offset)
    {
        $sql = "SELECT * FROM {$this->getTableName()} LIMIT {$item_per_page} OFFSET {$offset}";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getTotal($item_per_page)
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        $result = mysqli_query($this->con, $sql);
        $totalRecords = mysqli_num_rows($result);
        return ceil($totalRecords/$item_per_page);
    }
    public function checkName($name){
        $sql = "SELECT * FROM {$this->getTableName()} WHERE `name` = '{$name}'";
        $result =mysqli_query($this->con, $sql);
        return mysqli_num_rows($result);
    }
}