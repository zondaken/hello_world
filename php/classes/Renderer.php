<?php
class Renderer
{
    private $map;

    public function __construct()
    {
        $ds = DIRECTORY_SEPARATOR;

        $this->map = [
            "mainmenu" => "content/mainmenu.php",
            "notfound" => "content/notfound.php",

            "mm_login" => "content/mm_login.php",
            "mm_register" => "content/mm_register.php",

            "register" => "php/logic/check_register.php",
            "login" => "php/logic/check_login.php",

            "u_home" => "content/u_home.php",
            "u_show_users" => "content/u_show_users.php",
            "u_edit_profile" => "content/u_edit_profile.php",
            "u_logout" => "content/u_logout.php",

            "edit_profile" => "php/logic/check_edit_profile.php",
        ];
    }

    public function RenderView(string $includePath, string $action_)
    {
        $ds = DIRECTORY_SEPARATOR;

        require_once __DIR__ . "/../../content/reusables/config.php";

        if(!array_key_exists($action_, $this->map))
        {
            $action_ = "notfound";
        }

        ob_start();
        require $includePath. $ds. $this->map[$action_];
        $content = ob_get_clean();

        echo $content;
    }
}