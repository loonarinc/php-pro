<?php


namespace app\controllers;

use app\engine\Db;
use app\engine\Request;
use app\models\User;


class UserController extends Controller
{
    public function actionLogin()
    {
        if (isset($_POST['submit'])) {
            //TODO переделать на request
            $request = new Request();
            $login = $request->getParams()['login'];
            $pass = $request->getParams()['pass'];
            if (!User::auth($login, $pass)) {
                Die("Не верный пароль!");
            } else {
                if (isset($_POST['save'])) {
                    $hash = uniqid(rand(), true);
                    $id = $_SESSION['id'];
                    //пока что ручной update
                    $sql = "UPDATE users SET hash = :hash WHERE id = :id";
                    Db::getInstance()->execute($sql, ['id' => $id, 'hash' => $hash]);
                    setcookie("hash", $hash, time() + 3600);
                    header("Location: /");
                }
            }
            exit();
        }
    }
        public function actionLogout()
        {
            session_destroy();
            setcookie("hash");
            header("Location: /");
            exit();
        }
    }