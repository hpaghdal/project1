

<?php

class Database {
    private static $dsn = 'mysql:host=sql1.njit.edu;dbname=hdp36';
    private static $username = 'hdp36';
    private static $password = 'J5qFbS1K';
    private static $conn;
    private function __construct() {}
    public static function getDB () {
        if (!isset(self::$conn)) {
            try {
                self::$conn = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../errors/database_error.php');
                exit();
            }
        }
        return self::$conn;
    }
}

//
//$username = 'hdp36';
//$password = 'J5qFbS1K';
//$hostname = 'sql1.njit.edu';
//$dsn = "mysql:host=$hostname;dbname=$username";
//
//try {
//    $conn = new PDO($dsn, $username, $password);
//
//} catch(PDOException $e) {
//    echo "Connection failed: " . $e->getMessage();
//}
?>