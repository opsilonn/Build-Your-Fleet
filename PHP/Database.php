<?php
$servername = "localhost";
$username = "root";
$password = "";

try
{
    $DATABASE = new PDO("mysql:host=$servername;dbname=build_your_fleet", $username, $password);
    // set the PDO error mode to exception
    $DATABASE->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*echo "Connected successfully"; */
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>