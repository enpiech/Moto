<?php

$_DIR_ = dirname(dirname(__FILE__));
include_once $_DIR_.'\db\db_dbo.php';

class userPDO extends db_dbo
{
    var $table = "users";

    public function readAllUser()
    {
        $sql = "SELECT * FROM " . $this->table;
        return $this->select($sql);
    }

    public function readUserWithID($id)
    {
        $sql = "SELECT * FROM '" . $this->table . "' WHERE id='.$id.'";
        return $this->select($sql);
    }

    public function createUser($user)
    {
        if (isset($user["name"]) && isset($user["email"]) && isset($user["phone"])) {
            $name = $user["name"];
            $email = $user["email"];
            $phone = $user["phone"];
            $data = array( $name, $email, $phone);
            $stmt = self::$conn->prepare("INSERT INTO users (`name`, `email`, `phone`) VALUES (?, ?, ?)");
            $stmt->execute($data);
        }
    }

    public function updateUser($user)
    {
    }

    public function deleteUser($id)
    {
    }

}