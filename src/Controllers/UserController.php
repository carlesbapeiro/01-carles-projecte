<?php


namespace App\Controllers;


use App\Core\App;
use App\Core\Controller;
use App\Core\Exception\NotFoundException;
use App\Core\Router;

use App\Core\Security;
use App\Entity\User;
use App\Model\producteModel;
use App\Model\UserModel;
use Exception;
use PDO;

class UserController extends Controller
{

    public function index(): string
    {
/*        if (!Security::isAuthenticatedUser())
            App::get(Router::class)->redirect('login');*/

        $title = "Users - Movie FX";
        $errors = [];
        $userModel = new UserModel(App::get("DB"));
        $users = $userModel->findAll();

        $router = App::get(Router::class);

        return $this->response->renderView("users", "default", compact('title', 'users',
            'userModel', 'errors', 'router'));
    }

    public function create(): string
    {
        $title = "New User - Movie FX";

        return $this->response->renderView("users-create", "default", compact('title'));
    }
    public function store(): string
    {

        $errors = [];
        $title = "New User";
        $pdo = App::get("DB");



        $name = filter_input(INPUT_POST, "name");
        if (empty($name)) {
            $errors[] = "The name is mandatory";
        }
        $password = filter_input(INPUT_POST, "password");
        if (empty($password)) {
            $errors[] = "The password is mandatory";
        }
        $role = filter_input(INPUT_POST, "role");
        if (empty($role)) {

            //Rol per defecte
            $role = "ROLE_USER";
            //$errors[] = "The role is mandatory";
        }
        $mail = filter_input(INPUT_POST, "mail");
        if (empty($mail)) {
            $errors[] = "The mail is mandatory";
        }

        $password = App::get("security")->encode($password);

        if (empty($errors)) {
            try {
                $userModel = new UserModel($pdo);
                $user = new User();
                $user->setUsername($name);
                $user->setPassword($password);
                $user->setRole($role);
                $user->setMail($mail);



                $userModel->save($user);


            } catch (Exception $e) {
                $errors[] = 'Error: ' . $e->getMessage();
            }
        }
        return $this->response->renderView("users-store", "default", compact('errors', 'title'));
    }


    public function delete(int $id): string
    {
        $errors = [];
        $userModel = App::getModel(UserModel::class);
        $title = "Partner delete - Movie FX";
        $user = $userModel->find($id);

        $producteModel = App::getModel(ProducteModel::class);
        $productesAssociats = $producteModel->findBy(["usuari_id"=>$id]);
        $router = App::get(Router::class);


        return $this->response->renderView("users-delete", "default",
            compact('title', 'user', 'errors', 'router','productesAssociats'));


    }

    public function destroy(): string
    {
        $errors = [];
        $title = "User delete - Movie FX";
        $userAnswer = filter_input(INPUT_POST, "userAnswer");
        $router = App::get(Router::class);
        if (!empty($userAnswer) && $userAnswer == "yes") {
            $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
            $userModel = App::getModel(UserModel::class);
            $user = $userModel ->find($id);
            $producteModel = App::getModel(ProducteModel::class);
            $productesAssociats = $producteModel->findBy(["usuari_id"=>$id]);


            if (!$userModel->delete($user))
                $errors[] = "There were errors deleting entity";

            foreach ($productesAssociats as $producte){

                if(!$producteModel->delete($producte))
                    $errors[] = "There were errors deleting entity";
            }


        }
        else
            $router->redirect('users');

        return $this->response->renderView("users-destroy", "default",
            compact('title', 'user', 'errors', 'router'));
    }

    public function edit(int $id): string
    {
        $title = "Edit User - Movie FX";
        // 1. Get connection
        $pdo = App::get("DB");

        // 2. Prepare query
        $stmt = $pdo->prepare('SELECT * FROM user WHERE id=:id');

        // 3. Assign parameters values
        $stmt->bindValue("id", $id, PDO::PARAM_INT);

        // 4. Execute query
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);

        // 5. Get result
        $user = $stmt->fetch();
        $router = App::get(Router::class);

        return $this->response->renderView("users-edit", "default", compact('title',
            'user', 'router'));

    }
    public function update(int $id): string
    {
        $errors = [];

        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        if (empty($id)) {
            $errors[] = "Wrong ID";
        }

        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (empty($name)) {
            $errors[] = "The username is mandatory";
        }
        //Contrassenya
        $password = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (empty($password)) {
            $errors[] = "The password is mandatory";
        }
        $mail = filter_input(INPUT_POST, "mail", FILTER_VALIDATE_EMAIL);

        if (empty($mail)) {
            $errors[] = "The mail is mandatory";
        }


        $password = App::get("security")->encode($password);

        if (empty($errors)) {
            try {
                $userModel = App::getModel(UserModel::class);
                // getting the partner by its identifier
                $user = $userModel->find($id);
                $user->setUsername($name);
                $user->setPassword($password);
                $user->setMail($mail);

                // updating changes
                $userModel->update($user);
            } catch (Exception $e) {
                $errors[] = 'Error: ' . $e->getMessage();
            }
        }
        return $this->response->renderView("users-update");
    }

/*    public function show(int $id)
    {
        $errors = [];
        if (!empty($id)) {
            try {
                $userModel = new UserModel(App::get("DB"));
                $user = $userModel->find($id);

            } catch (NotFoundException $notFoundException) {
                $errors[] = $notFoundException->getMessage();
            }
        }
        return $this->response->renderView("perfil", "default", compact(
            "errors", "user"));


    }*/




}