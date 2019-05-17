<?php
include_once __DIR__ . '/../db/db_mysqli.php';

class userMysqli extends dbMysqli {
    public function readAllUser() {
        $sql = "SELECT * FROM users";
        $result = $this->getData($sql);
        return $result;
    }

    public function readUserWithID($id) {
        $sql = "SELECT * FROM users WHERE `id`='".$id."'";
        $result = $this->getData($sql);
        return $result;
    }

    public function createUser($user) {
        
        $name = $user['name'];
        $email = $user['email'];
        $phone = $user['phone'];

        $sql = "INSERT INTO `users`(`name`, `email`, `phone`) VALUES ('".$name."','".$email."','".$phone."')";
        $result = $this->query($sql);
        return $result;
    }

    public function deleteUser($id) {
        $sql = "DELETE FROM `users` WHERE id=".$id;
        $result = $this->query($sql);

        return $result;
    }

    public function updateUser($user) {
        $id = $user['id'];
        $name = $user['name'];
        $email = $user['email'];
        $phone = $user['phone'];

        $sql = "UPDATE `users` SET`name`='".$name."',`email`='".$email."',`phone`='".$phone."' WHERE `id`=".$id;
        $result = $this->query($sql);
        return $result;
    }
}