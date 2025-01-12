<?php 
namespace App\Config;
use PDO;
use PDOExeption;
class Connexion
{
    private static $host='localhost';
    private static $db='Youdemy';
    private static $username='root';
    private static $password='';
     public static $conn=null;

    static function connexion()
    {
        if(self::$conn===null)
        {
            try{
                self::$conn= new PDO("mysql:host=".self::$host.";dbname=".self::$db,
                self::$username,
                self::$password,
            );
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo'3la slama';
            
            }catch(PDOExeption $exeption)
            {
                die ( " L'error est " . $exeption->getMessage());
            }
            return self::$conn;

        }
        // else
        // {
        //     return self::$conn;
        // }

    }


}