<?php

/**
 * Class CategoryModel
 */
class CategoryModel extends DB
{
    const TABLE_NAME = 'categories';

    /**
     * @param $name
     * @return int|string
     */
    public function insert($name)
    {
        $sql = "INSERT INTO {$this->getTableName()} (name)
                VALUES ('{$name}')";
        mysqli_query($this->con, $sql);
        return mysqli_insert_id($this->con);
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
     * @param $name
     * @return bool|mysqli_result
     */
    public function update($id, $name)
    {
        $sql = "UPDATE {$this->getTableName()}
                SET name = '{$name}' WHERE id = {$id}";
        return mysqli_query($this->con, $sql);
    }

    /**
     * @return array
     */
    public function getList()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
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
     * @return string
     */
    public function getTableName()
    {
        return self::TABLE_NAME;
    }
}