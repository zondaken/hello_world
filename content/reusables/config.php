<?php

class Reusables
{
    public static $head;
    public static $bodyLower;

    public static function Initialize()
    {
        self::$head = file_get_contents(__DIR__ . "/head.html");
        self::$bodyLower = file_get_contents(__DIR__ . "/body-lower.html");
    }
}

Reusables::Initialize();
