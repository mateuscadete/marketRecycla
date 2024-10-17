<?php
 
namespace App\persistence;
 
 
 
class ConnectionFactory {
 
//singleton
private static $connection = null;
  
public static function getConnection() {
    error_reporting(E_ALL);
    ini_set('display_errors',1);
 
if (self::$connection == null){
    $host = getenv('DB_HOST') ?: '192.168.15.62';
    $dbname = getenv('DB_NAME') ?: 'db_name';
    $username = getenv('DB_USER') ?: 'root';
    $password = getenv('DB_PASS') ?: '';
    $dsn = "mysql:host=$host;dbname=$dbname";

    try{
        self::$connection = new \PDO("mysql:host=localhost;dbname=db_name", $username, $password);

        self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    catch(\PDOExpection $e){

        die('Connection failed:' . $e->getMessage());
    }
} 
return self::$connection;
    }
}