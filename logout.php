<?php
session_start();
    $cookie_name = "key";
    $cookie_value = '';
    setcookie($cookie_name, $cookie_value, time() - (86400 * 30), "/"); // 86400 = 1 hari

session_destroy();

header("Location: index.php");