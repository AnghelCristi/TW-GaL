<?php

// session_start();
include_once 'my-account.model.php';

if (isset($_POST['submit'])) {

    header('Location: my-account.view.php');

    change_password($_COOKIE["email"], $_POST['submit']);
}
