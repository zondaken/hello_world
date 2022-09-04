<?php

// 1. check if post variables are there
// 2. check if passwords match
// 3. check if user exists
// => if any fails, send back to register

$action = "";

$username = "";
$password = "";
$passwordRepeat = "";

if(!isset($_POST['username']) or !isset($_POST['password']) or !isset($_POST['passwordRepeat']))
{
    $action = "mm_register";
    $_SESSION['form_username'] = $_POST['username'] ?? "";
} else {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];

    if($password != $passwordRepeat)
    {
        $action = "mm_register";
        $_SESSION['form_username'] = $username;
        $_SESSION['message'] = "Passwords don't match";
        $_SESSION['message_type'] = "error";
    } else if(Config::$dbHandler->UserExists($username)) {
        $action = "mm_register";
        unset($_SESSION['form_username']);
        $_SESSION['message'] = "Username already exists";
        $_SESSION['message_type'] = "error";
    } else {
        $password = md5($password); // TODO: fix md5
        Config::$dbHandler->InsertUser($username, $password);

        $action = "mainmenu";
        unset($_SESSION['form_username']);
        $_SESSION['message'] = "Successfully registered";
        $_SESSION['message_type'] = "success";
    }
}

if(!empty($action)) {
    header("Location: ?action=$action");
} else {
    header("Location: .");
}