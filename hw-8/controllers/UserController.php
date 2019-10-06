<?php


namespace app\controllers;

use app\engine\App;
use app\models\repositories\UserRepository;
use app\models\entities\User;


class UserController extends Controller
{
    public function actionLogin() {
        if (isset(App::call()->request->getParams()['submit'])) {
            $login = App::call()->request->getParams()['login'];
            $pass = App::call()->request->getParams()['pass'];
            if (!(App::call()->userRepository->auth($login, $pass))) {
                Die("Не верный пароль!");
            } else {
                if (isset(App::call()->request->getParams()['save'])) {
                    $hash = uniqid(rand(), true);
                    $id = $_SESSION['id'];
                    //пока что ручной update
                    //$sql = "UPDATE users SET hash = :hash WHERE id = :id";
                    App::call()->userRepository->update(new User(
                        $id,
                        $login,
                        $pass,
                        $hash));
                    //App::call()->db->execute($sql, ['id' => $id, 'hash' => $hash]);
                    setcookie("hash", $hash, time() + 3600);
                    header("Location: /");
                }
                header("Location: /");
            }
            exit();
        }
    }
    public function actionLogout() {
        session_destroy();
        header("Location: /");
        exit();
    }
}