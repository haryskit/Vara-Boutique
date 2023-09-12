<?php 
class Database {
    private static $database_name = 'saci_water';
    private static $database_host = '68.178.149.7';
    private static $database_user = 'saciwater';
    private static $database_user_password = 'saciwater@123';
    private static $connection_status = null;
    public function __construct()
    {
        die('Init function is not allowed');
    }
    
    public static function connect()
    {
        if (self::$connection_status == null)         try {
            self::$connection_status = new PDO('mysql:host=' . self::$database_host . ';dbname=' . self::$database_name . '', self::$database_user, self::$database_user_password);
        } catch (PDOException $e) {
            echo "Database could not be connected: " . $e->getMessage();
        }
        return self::$connection_status;
    }
    public static function disconnect()
    {
        self::$connection_status = null;
    }
}