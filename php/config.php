<?php

require_once __DIR__ . "/classes/DBHandler.php";

class Config
{
    /**
     * @var DBHandler
     */
    public static $dbHandler;

    /**
     * @var string
     */
    public static $action;

    public static $linkMap;

    public static function Initialize()
    {
        self::$dbHandler = new DBHandler("127.0.0.1", "postgres", "pass", "hello_world");
        self::$action = self::GetAction();


        // TODO: fix hardcoded links
        self::$linkMap = [
            "login" => "/hello_world/?action=login"
        ];
    }

    private static function GetAction(): string
    {
        $action = $_GET['action'] ?? "";

        if (empty($action)) {
            if (isset($_SESSION['login_id'])) {
                return "u_home";
            } else {
                return "mainmenu";
            }
        }

        return $action;
    }
}

Config::Initialize();
