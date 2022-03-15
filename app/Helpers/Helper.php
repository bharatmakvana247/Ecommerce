<?php
namespace App\Helpers;

class Helper
{
    public static function Url()
    {
        return $_SERVER['HTTP_HOST'];
    }
}
