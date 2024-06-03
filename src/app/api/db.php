<?php
include 'database.php';
class Database {
    public static $connection;
    public function __construct(){
        if(!self::$connection){
            self::$connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_PORT);
            self::$connection->set_charset('utf8');
            // echo 'Kết nối thành công';
           }
     return self::$connection;
    }
}
$db = new Database();

