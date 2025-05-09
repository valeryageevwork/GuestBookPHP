<?php

class CheckDataClass
{

    public static function CheckName($name) : bool
    {
        $name = trim($name);
        return ((strlen($name) <= 30) && preg_match('/[a-zA-Zа-яА-ЯёЁ]+/u', $name));
    }

    public static function CheckMessage($message) : bool
    {
        return (strlen($message) <= 500);
    }
}