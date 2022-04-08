<?php



abstract class Model{

    // private static $pdo;
    private static $pdo;

    // private static function setBdd(){
    private static function setBdd(){
        require_once "conf.php";
          self::$pdo = new PDO("mysql:host=$host;dbname=$dbName;$attribut",$login,$password);
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