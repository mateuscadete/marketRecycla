<?php
 
namespace App\persistence;
 
 
 
class ConnectionFactory {
 
//singleton
private static $connection = null;
  
public static function getConnection(): PDO {
 
if (self::$connection == null){
$dnsStr = "mysql:host=localhost;dbname=dn_name";
 self::$connection = new \PDO($dnsStr, "admin","admin123");
 self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
return self::$connection;
    }
}