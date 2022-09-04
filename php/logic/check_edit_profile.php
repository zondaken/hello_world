<?php

$action = "";

if (!isset($_POST['passwordOld']) or !isset($_POST['passwordNew'])) {
    $action = "u_edit_profile";
} else {
    $passwordOld = $_POST['passwordOld'];
    $passwordNew = $_POST['passwordNew'];

    if ($passwordOld == $passwordNew) {
        $action = "u_edit_profile";
        $_SESSION['message'] = "Both entered passwords are equal";
        $_SESSION['message_type'] = "error";
    } else {
        $userInfo = Config::$dbHandler->GetUserById($_SESSION['login_id']);

        if ($userInfo['password'] != md5($passwordOld)) {
            $action = "u_edit_profile";
            $_SESSION['message'] = "Wrong old password";
            $_SESSION['message_type'] = "error";
        } else {
            Config::$dbHandler->ChangePassword($_SESSION['login_id'], md5($passwordNew));
            $_SESSION['message'] = "Successfully changed password";
            $_SESSION['message_type'] = "success";
        }
    }
}

if(!empty($action)) {
    header("Location: ?action=$action");
} else {
    header("Location: .");
}