<?php
include 'db/db_dbo.php';
define('NAME', 'moto_name');
define('COLOR', 'moto_color');
define('WEIGHT', 'moto_weight');
define('ID', 'moto_size');
define('SIZE', 'moto_size');
define('TABLE', 'motos');

class motoPDO extends db_dbo
{
    public function readAllMoto()
    {
        $sql = "SELECT * FROM " . TABLE;
        return $this->select($sql);
    }

    public function readMotoWithID($id)
    {
        $sql = "SELECT * FROM '" . TABLE . "' WHERE id='.$id.'";
        return $this->select($sql);
    }

    public function createMoto($moto)
    {
        $sql = "INSERT INTO '" . TABLE . "' (`".NAME."`, `".COLOR."`, `".WEIGHT."`, `".ID."`, `".SIZE."`) VALUES (?, ?, ?, ?, ?)";

        $data = array( $moto[NAME], $moto[COLOR], $moto[WEIGHT], $moto[ID], $moto[SIZE]);
        $this->query($sql, $data);
    }

    public function updateMoto($moto)
    {
        $sql = "UPDATE '" . TABLE . "' SET `".NAME."` = (?), `".COLOR."` = (?), `".WEIGHT."` = (?), `".SIZE."` = (?) WHERE `".ID."` = (?)";

        $data = array( $moto[NAME], $moto[COLOR], $moto[WEIGHT], $moto[ID], $moto[SIZE]);
        $this->query($sql, $data);
    }

    public function deleteMoto($id)
    {
        $sql = "DELETE FROM '" . TABLE . "' WHERE `".ID."` = (?)";
        $data = $id;
        $this->query($sql, $data);
    }
}