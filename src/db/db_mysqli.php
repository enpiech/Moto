<?php

$_DIR_ = dirname(dirname(__FILE__));
include_once $_DIR_.'\config\config.php';

class dbMysqli {
    public static $conn  = NULL;
    protected $table = NULL;

    public function __construct() {
        if (!self::$conn) {
            self::$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            mysqli_set_charset(self::$conn, 'UTF8');   
        }
    }

    public function query($sql) {
        $data = mysqli_query(self::$conn, $sql);
        return $data;
    }

    public function getData($sql) {
        $data = $this->query($sql);
        $items = [];
        while ($row = mysqli_fetch_assoc($data)) {
            $items[] = $row;
        }
        return $items;
    }
}