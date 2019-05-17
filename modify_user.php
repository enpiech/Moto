<?php
include './models/userMysqli.php';
$user_db = new userMysqli();

var_dump($_POST);

if (isset($_POST['delete'])) {
    $user_db->deleteUser($_POST['id']);
} else if (isset($_POST['create'])) {
    if ($_POST['name'] !== "" && $_POST['email'] !== "" && $_POST['phone'] !==""){
        $user_db->createUser($_POST);
    }   
} else if (isset($_POST['update'])) {
    if ($_POST["id"] !== "" && $_POST['name'] !== "" && $_POST['email'] !== "" && $_POST['phone'] !==""){
        var_dump($user_db->updateUser($_POST));
    } 
}  

header('location:index.php');
