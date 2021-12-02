<?php

namespace App;

class Auth
{
    public static function login($name,$password)
    {

        $_SESSION['name']=$name;
        $_SESSION['password']=$password;

    }

    public static function logout()
    {
        unset($_SESSION['name']);
        unset($_SESSION['password']);
    }

    public static function isLogged()
    {
        return isset($_SESSION['name']);
    }

    public static function getName()
    {
        return (Auth::isLogged() ? $_SESSION['name'] : "Anonym");
    }


}