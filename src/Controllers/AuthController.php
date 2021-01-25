<?php


namespace App\Controllers;


use App\Core\App;
use App\Core\Controller;
use App\Model\UserModel;

class AuthController extends Controller
{
    public function login()
    {

        return $this->response->renderView('auth/login', 'default');
    }

    public function checkLogin()
    {
        $messages = [];
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        if (!empty($username) && !empty($password)) {

            $userModel = new userModel(App::get("DB"));
            //ar_dump($userModel);

            $user = $userModel->findOneBy(['username' => $username]);

            if(App::get("security")->checkPassword($password, $user->getPassword()) === true){

                $_SESSION["loggedUser"] = $user->getId();
                $_SESSION["role"] = $user->getRole();
                App::get("router")->redirect("productes");
            }

        }
        App::get('flash')->set("message", "No s'ha pogut iniciar sessió");
        App::get('router')->redirect("login");
    }

    public function logout()
    {
        session_unset();
        unset($_SESSION);
        session_destroy();
        setcookie(session_name());

        App::get('router')->redirect("");
    }
}