<?php
class Model
{
    public static $connection = NULL;

    public function __construct()
    {
        if(!self::$connection) {
            self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            self::$connection->set_charset('utf8mb4');
        }
        return self::$connection;
    }

    public static function select($sql)
    {
        $items = [];
        $result = self::$connection->query($sql); // Sử dụng $sql thay vì $stmt
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $items[] = $row;
            }
        }
        return $items;
    }
    
    // public static function select($sql)
    // {
    //     $sql->execute(); // Thực thi truy vấn
    //     $result = $sql->get_result(); // Nhận kết quả từ truy vấn
    //     $data = [];
    //     while ($row = $result->fetch_assoc()) {
    //         $data[] = $row;
    //     }
    //     return $data;
    // }
}
