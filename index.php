<?php
    session_start();

    const IP = __DIR__;

    require_once IP. "/php/config.php";
    require_once IP. "/php/classes/Renderer.php";

    $loginActions = ["mainmenu", "mm_login", "mm_register"];

    if(array_search(Config::$action, $loginActions) and isset($_SESSION['login_id'])) {
        header("Location: .");
    }

    $renderer = new Renderer();
    $renderer->RenderView(IP, Config::$action);
