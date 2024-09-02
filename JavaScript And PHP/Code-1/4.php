<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if password is the reverse of username
    if (strrev($username) == $password) {
        // Password is correct, display welcome
        echo "Welcome, $username!";
    } else {
        // Password is incorrect, redirect to home page
        header("Location: home.htm");
        exit;
    }
}
?>
