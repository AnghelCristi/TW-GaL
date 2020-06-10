<?php

session_start();

$CONFIG = [
    'servername' => "localhost",
    'username' => "root",
    'password' => '',
    'db' => 'test'
];

$conn = new mysqli($CONFIG["servername"], $CONFIG["username"], $CONFIG["password"], $CONFIG["db"]);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function change_password($email, $password)
{
    global $conn;

    $stmt = $conn->prepare('UPDATE users SET password=? where email=?');
    $stmt->bind_param('ss', $password, $email);
    $stmt->execute();

    echo '<script>
           alert("Password changed");
            </script>';
}
