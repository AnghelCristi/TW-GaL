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

function getQuestions($game, $difficulty)
{
    global $conn;
    $questions = [];

    $stmt = $conn->prepare('SELECT question FROM questions WHERE game = ? and difficulty = ? ');
    $stmt->bind_param('ss', $game, $difficulty);
    $stmt->execute();

    $questions = $stmt->get_result()->fetch_array();
    return $questions;
}


function addPoints($email, $game, $difficulty)
{
    global $conn;

    $stmt = $conn->prepare('SELECT points FROM learn WHERE email=? and game = ? and difficulty = ?');
    $stmt->bind_param('sss', $email, $game, $difficulty);
    $stmt->execute();

    $num = $stmt->num_rows();
    if ($num == 1) {
        $update_stmt = $conn->prepare('UPDATE learn SET points=? where email=? and game = ? and difficulty = ?');
        $update_stmt->bind_param('ssss', $stmt->get_result() + 1, $email, $game, $difficulty);
        $stmt->execute();
    } else {
        $points = 0;
        $insert_stmt = $conn->prepare('INSERT INTO learn SET email=? , game = ? , difficulty = ?, points=?');
        $insert_stmt->bind_param('ssss', $email, $game, $difficulty, $points);
        $stmt->execute();
    }
}
