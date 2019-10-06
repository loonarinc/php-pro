<?php

namespace app\models;

class User extends DbModel
{
    public $id;
    public $login;
    public $pass;

    public static function getTableName()
    {
        return 'users';
    }

    public static function auth($login, $pass)
    {
        $user = static::getWhere('login', $login);
        if ($pass == $user->pass) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $user->id;
            return true;
        }
        return false;
    }

    public static function isAuth()
    {
        if (isset($_COOKIE["hash"])) {
            $hash = $_COOKIE["hash"];
            $user = static::getWhere('hash', $hash);
            if (!empty($user)) {
                $_SESSION['login'] = $user;
            }
        }
        return isset($_SESSION['login']) ? true : false;
    }

    public static function getName()
    {
        return static::isAuth() ? $_SESSION['login'] : "Guest";
    }

}