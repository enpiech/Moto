<?php

$_DIR_ = dirname(dirname(__FILE__));
include_once $_DIR_ . '\db\db_dbo.php';

//TODO Convert to var
define('COLOR', 'moto_color');
define('WEIGHT', 'moto_weight');
define('ID', 'moto_id');
define('SIZE', 'moto_size');
define('$name', 'motos');

class motoPDO extends db_dbo
{
    private $table = "motos";
    private $name = "moto_name";
    private $color = "moto_color";
    private $weight = "moto_weight";
    private $id = "moto_id";
    private $size = "moto_size";

    public function readAllMoto()
    {
        $sql = "SELECT * FROM " . $this->table;
        return $this->select($sql);
    }

    public function readMotoWithID($id)
    {
        $sql = 'SELECT * FROM `' . $this->table . '` WHERE `' . $this->id . '`="' . $id .'"';
        return $this->select($sql);
    }

    public function createMoto($moto)
    {
        $sql = "INSERT INTO " . $this->table . " (`" . $this->name . "`, `" . $this->color . "`, `" . $this->weight . "`, `" . $this->id . "`, `" . $this->size . "`) VALUES (?, ?, ?, ?, ?)";
        $this->query($sql, $moto);
    }

    public function updateMoto($moto)
    {
        $sql = "UPDATE `" . $this->table . "` 
            SET `" . $this->name . "` = (?),
             `" . $this->color . "` = (?),
             `" . $this->weight . "` = (?), 
             `" . $this->size . "` = (?) 
            WHERE `" . $this->id . "` = (?)";

        $data = array(
            $moto[$this->name],
            $moto[$this->color],
            $moto[$this->weight],
            $moto[$this->size],
            $moto[$this->id]);
        $this->query($sql, $data);
    }

    public function deleteMoto($id)
    {
        $sql = "DELETE FROM `" . $this->table . "` 
            WHERE `" . $this->id . "` = (?)";
        $this->query($sql, $id);
    }
}