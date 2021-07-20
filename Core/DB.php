<?php
namespace Core;
require_once '../Config/Database.php';
class DB{
    private static function connect(){
        global $conn;
        return $conn;
    }
    public static function fetch_all(){
        $con = self::connect();
        return "Hello";
    }
}
?>