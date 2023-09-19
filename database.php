<?php 

class Database
{
    private static $dbHost = "localhost";
    private static $dbName = "coin_pour_phone";
    private static $dbUsername = "root";
    private static $dbUserpassword = "root";
    private static $connection = null;

    public static function connect() : PDO
    {
        if(self::$connection==null)
        {
            try
            {
                self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName , self::$dbUsername, self::$dbUserpassword);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$connection;
    }
    public static function disconnect()
    {
        self::$connection=null;
    }
}
