<?php

// session_start();
include_once 'learn.model.php';

if (isset($_POST['mark-as-read'])) {

    // header('Location:' .  $_COOKIE["game_name"] . '.view.php');

    addPoints($_COOKIE["email"], $_COOKIE["game_name"], $_POST['difficulty']);

    echo'OK';
}
