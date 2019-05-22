<?php
$_DIR_ = dirname(dirname(__FILE__));
include_once $_DIR_ . '\src\models\userMysqli.php';
include_once $_DIR_ . '\models\userPDO.php';

$db_type = "mysqli";
if ($db_type == "mysqli") {
    $user_db = new userMysqli();
} else {
    $user_db =  new userPDO();
}

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
