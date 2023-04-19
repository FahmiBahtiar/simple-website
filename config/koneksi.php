<?php

    // // Declare DB Variables
    // $servername  = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "blog";

    // // Create connection
    // try {
    //     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     $GLOBALS['conn'] = $conn;

    // } catch(PDOException $e) {
    //     $GLOBALS['e'] = $e;
    //     echo "Connection failed: " . $e->getMessage();
    // }


    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'simplewebsite');

    /* Attempt to connect to MySQL database */
    try{
        $conn = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $GLOBALS['conn'] = $conn;

    } catch(PDOException $e){
        $GLOBALS['e'] = $e;
        die("ERROR: Could not connect. " . $e->getMessage());
    }

