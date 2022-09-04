<?php

// 1. check if post variables are there
// 2. check user info
// 2a. does exist?
// 2b. password matches?
// TODO: fix hashing in different code locations

$action = "";

if(!isset($_POST['username']) or !isset($_POST['password']))
{
    $action = "mm_register";
    unset($_SESSION['form_username']);
} else {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userInfo = Config::$dbHandler->GetUserByName($username);

    if(!$userInfo) {
        // no such username
        $action = "mm_login";
        unset($_SESSION['form_username']);
        $_SESSION['message'] = "Username does not exist";
        $_SESSION['message_type'] = "error";
    } else if($userInfo['password'] != md5($password)) {
        // wrong password
        $action = "mm_login";
        $_SESSION['form_username'] = $username;
        $_SESSION['message'] = "Password incorrect";
        $_SESSION['message_type'] = "error";
    } else {
        // login success
        unset($_SESSION['form_username']);
        $_SESSION['login_id'] = $userInfo['id'];
        $_SESSION['message'] = "Login success";
        $_SESSION['message_type'] = "success";
    }
}

if(!empty($action)) {
    header("Location: ?action=$action");
} else {
    header("Location: .");
}