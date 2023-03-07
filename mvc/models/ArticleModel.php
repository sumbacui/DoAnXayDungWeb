<?php
/**
 * Class ArticleModel
 */
class ArticleModel extends DB
{
    const TABLE_NAME = 'articles';
    
    /**
     * @return string
     */
    public function getTableName()
    {
        return self::TABLE_NAME;
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
     * @return string[]|null
     */
    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = {$id}";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }


    public function insert($title,$content,$sort_order)
    {
        $content = htmlentities($content);
        $sql = "INSERT INTO {$this->getTableName()} (title,content,sort_order) 
            VALUES ('{$title}','{$content}',{$sort_order})";
        mysqli_query($this->con, $sql);
        return mysqli_insert_id($this->con);
    }

     /**
     * @param $id
     * @return bool|mysqli_result
     */
    function deleteById($id)
    {
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = {$id}";
        return mysqli_query($this->con, $sql);
    }


    function update($id,$title,$content,$sort_order)
    {
        $content = htmlentities($content);
            $sql = "UPDATE {$this->getTableName()} SET `title` = '{$title}', `content` = '{$content}', `sort_order` = {$sort_order} WHERE `id` = {$id}";
        return mysqli_query($this->con, $sql);
    }
}