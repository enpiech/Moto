<?php
$_DIR_ = dirname(dirname(__FILE__));
include_once $_DIR_."\config\config.php";

class db_dbo
{
    public static $conn = null;

    /**
     * db_dbo constructor.
     */
    public function __construct()
    {
        if (!self::$conn) {
            $dsn = 'mysql:host='.DB_HOST.'.;dbname='.DB_NAME;
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            try {
                self::$conn = new PDO($dsn, DB_USER, DB_PASS, $options);
            } catch (PDOException $e) {
                echo 'error:'.$e->getMessage();
            }
        }
    }

    public function query($sql, $data)
    {
        $stmt = self::$conn->prepare($sql);
        if ($data != false) {
            return $stmt->execute($data);
        }
        return $stmt->execute();
    }

    public function select($sql, $data = false)
    {
        $stmt = self::$conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();

        return $stmt->fetchAll();
    }


}