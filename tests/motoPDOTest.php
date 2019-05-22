<?php
$_DIR_ = dirname(dirname(__FILE__));
include_once $_DIR_."\src\models\motoPDO.php";

use PHPUnit\Framework\TestCase;

class motoPDOTest extends TestCase
{

    public function testReadAllMoto()
    {
        $moto = new motoPDO();
        $actualArray = $moto->readAllMoto();
        $expectedArray = array(array(
            "moto_name" => "name",
            "moto_color" => "color",
            "moto_weight" => '10',
            "moto_id" => "abc123",
            "moto_size" => '125'));
        $this->assertEquals($actualArray, $expectedArray);
    }

    public function testCreateMotoWithDuplicateID()
    {
        try {
            $data = array("name", "color", 10, "abc123", 150);
            $moto = new motoPDO();
            $actual = $moto->createMoto($data);
        } catch (PDOException $e) {
            $this->assertEquals(23000, $e->getCode());
        }
    }

    public function testReadMotoWithExistId()
    {
        $moto = new motoPDO();
        $actualArray = $moto->readMotoWithID("abc123");
        $expectedArray = array(array(
            "moto_name" => "name",
            "moto_color" => "color",
            "moto_weight" => '10',
            "moto_id" => "abc123",
            "moto_size" => '125'));
        $this->assertEquals($actualArray, $expectedArray);
    }

    public function testDeleteMotoWithExistId()
    {
        $moto = new motoPDO();
        $id = ["abc123"];
        $actual = $moto->deleteMoto($id);
        $this->assertEquals($actual, null);
    }

    public function testUpdateMoto()
    {
        $moto = new motoPDO();
        $data = array(
            "moto_name" => "name",
            "moto_color" => "color",
            "moto_weight" => 10,
            "moto_id" => "abc123",
            "moto_size" => 125);
        $actual = $moto->updateMoto($data);
        $expected = null;
        $this->assertEquals($actual, $expected);
    }
}
