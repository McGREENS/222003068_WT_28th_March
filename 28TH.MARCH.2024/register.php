<?php
$connection = new mysqli('localhost', 'root', '', 'mytest');
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Add a semicolon here
    $sql = "INSERT INTO user (email, password) VALUES ('$email', '$password')"; // Corrected SQL syntax

    if ($connection->query($sql) === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
$connection->close();
?>