<?php

// session_start();
include_once 'login.model.php';

if (isset($_POST['submit'])) {

    $query_string = file_get_contents("php://input");
    $keywords = preg_split("/[\s,=,&]+/", $query_string);
    $arr = [];
    for ($i = 0; $i < sizeof($keywords); $i++) {
        $arr[$keywords[$i]] = $keywords[++$i];
    }
    $data = (object)$arr;

    header('Location: login.view.php');

    setUserCookie($data);
    switch ($_POST['submit']) {
        case 'Login':
            login($data);
            break;

        case 'Register':
            register($data);
            break;
    }
}
