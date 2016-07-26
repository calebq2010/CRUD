<?php
class Database
{
    private $dbName = 'admin' ;
    private $dbHost = 'localhost' ;
    private $dbUsername = 'root';
    private $dbUserPassword = 'root';
     
    private $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}

$database = new Database;
$database->connect();
?>