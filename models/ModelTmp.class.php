<?php



abstract class Model{

// private static $pdo;
public $pdo;



// private static function setBdd(){
public function setBdd(){
self::$pdo = new PDO("mysql:host=localhost;dbname=videotheque;charset=utf8","root","");

self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

}

//    protected function getBdd()
public function getBdd()  
{
        if (self::$pdo === null) {
            self::setBdd();
        }
        return self::$pdo;

}

}