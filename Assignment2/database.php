

<?php
//check the connection
$username = 'hdp36';
$password = 'cKkTBWzVS';
$hostname = 'sql1.njit.edu';
$dsn = "mysql:host=$hostname;dbname=$username";

try {
    $conn = new PDO($dsn, $username, $password);
    //echo "Connected successfully<br>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>