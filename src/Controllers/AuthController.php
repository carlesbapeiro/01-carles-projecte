<?php


namespace App\Controllers;


use App\Core\App;
use App\Core\Controller;
use App\Core\Exception\NotFoundException;
use App\Model\UserModel;
use Exception;

class AuthController extends Controller
{
    public function login()
    {

        return $this->response->renderView('auth/login', 'default');
    }

    public function checkLogin()
    {
        $messages = [];
        $mail = filter_input(INPUT_POST, 'mail');
        $password = filter_input(INPUT_POST, 'password');

        if (!empty($mail) && !empty($password)) {

            $userModel = new userModel(App::get("DB"));
            //ar_dump($userModel);



            //TODO: ARREGLAR EL LOGIN, PREGUNTAR JORDA
            try {

                $user = $userModel->findOneBy(['mail' => $mail]);

                var_dump($user);
                if($user != null && App::get("security")->checkPassword($password, $user->getPassword()) === true){

                    $_SESSION["loggedUser"] = $user->getId();
                    $_SESSION["role"] = $user->getRole();
                    App::get("router")->redirect("productes");
                }else{

                    App::get('flash')->set("message", "Contrassenya o usuari incorrecte");
                }

            }catch (Exception $e){

                App::get('flash')->set("message", "Ha ocorregut un error inesperat, perfavor revisa les teues dades");

            }


        }
        App::get('flash')->set("message", "Contrassenya o usuari incorrecte");
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