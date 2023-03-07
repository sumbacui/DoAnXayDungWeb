<?php

/**
 * Class UserModel
 */
class UserModel extends DB
{
    const TABLE_NAME = 'users';

    /**
     * @param $name
     * @param $email
     * @param $password
     * @param $phone
     * @param $sex
     * @return int|string
     */
    public function insert($name, $email, $password, $sex = null, $phone = '0123456789')
    {
        $pass = md5($password);
        $sql = "INSERT INTO {$this->getTableName()} (name, email, password, phone, sex)
                VALUES ('{$name}', '{$email}', '{$pass}', '{$phone}', '{$sex}')";
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
     * @param $phone
     * @param $sex
     * @return int|string
     */
    public function update($id, $name, $sex, $phone)
    {
        $sql = "UPDATE {$this->getTableName()}
                SET name = '{$name}', phone = '{$phone}', sex = '{$sex}'
                WHERE id = {$id}";
        return mysqli_query($this->con, $sql);
    }

    /**
     * @return array
     */
    public function getList()
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE role = 0";
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

    /**
     * @param $email
     * @return string[]
     */
    public function check($email, $password)
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                if ($row['email'] == $email && md5($password) === $row['password']) {
                    $_SESSION['customer_id'] = $row['id'];
                    $_SESSION['customer_name'] = $row['name'];
                    $_SESSION['role'] = $row['role'];
                    return true;
                }
            }
        }
        return false;
    }

    public function checkEmailExist($email) {
        $sql = "SELECT * FROM {$this->getTableName()}";
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                if ($row['email'] == $email) {
                    return false;
                }
            }
        }
        return true;
    }

    public function getCustomerByEmail($email) {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE email = '{$email}'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function checkCurrentPassword($id, $password)
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                if ($row['id'] == $id && md5($password) === $row['password']) {
                    return true;
                }
            }
        }
        return false;
    }

    public function updatePass($id, $password)
    {
        $password = md5($password);
        $sql = "UPDATE {$this->getTableName()} SET password = '{$password}' WHERE id = {$id}";
        return mysqli_query($this->con, $sql);
    }
}