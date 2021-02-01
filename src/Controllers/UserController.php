<?php

//TODO:Cap la posibilitat de que si poses mal la contrassenya al inici de sessio et done error. Gestionar-ho.
namespace App\Controllers;


use App\Core\App;
use App\Core\Controller;
use App\Core\Exception\NotFoundException;
use App\Core\Router;

use App\Core\Security;
use App\Entity\User;
use App\Exception\UploadedFileException;
use App\Exception\UploadedFileNoFileException;
use App\Model\producteModel;
use App\Model\UserModel;
use App\Utils\UploadedFile;
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
                $uploadedFile = new UploadedFile("foto", 1024 * 1024, ["image/jpeg", "image/jpg","image/png"]);
                if ($uploadedFile->validate()) {
                    $uploadedFile->save(User::FOTO_PATH, uniqid("MOV"));
                    $filename = $uploadedFile->getFileName();
                }
            } catch (Exception $exception) {
                $errors[] = "Error uploading file ($exception)";
            }
        }

        if (empty($errors)) {
            try {
                $userModel = new UserModel($pdo);
                $user = new User();
                $user->setUsername($name);
                $user->setPassword($password);
                $user->setRole($role);
                $user->setMail($mail);
                $user->setFoto($filename);



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
        $title = "User delete - Agrow";
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
        $title = "Edit User - Agrow";
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

        /*
        //Contrassenya
        $password = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (empty($password)) {
            $errors[] = "The password is mandatory";
        }*/
        $mail = filter_input(INPUT_POST, "mail", FILTER_VALIDATE_EMAIL);

        if (empty($mail)) {
            $errors[] = "The mail is mandatory";
        }


        /*$password = App::get("security")->encode($password);*/

        $filename = filter_input(INPUT_POST, "foto");

        // if there are errors we don't upload image file
        if (empty($errors)) {
            try {
                $uploadedFile = new UploadedFile("foto");
                if ($uploadedFile->validate()) {
                    // we get the path form config file
                    $directory = App::get("config")["foto_path"];
                    // we use uniqid to generate a uniqid filename;
                    $uploadedFile->save($directory, uniqid("PTN"));
                    // we get the generated name to save it in the db
                    $filename = $uploadedFile->getFileName();
                }
            } catch (UploadedFileNoFileException $uploadedFileNoFileException) {
                // When updating is possible not to upload a file
            } catch (UploadedFileException $uploadedFileException) {
                $errors[] = $uploadedFileException->getMessage();
            }
        }

        if (empty($errors)) {
            try {
                $userModel = App::getModel(UserModel::class);
                // getting the partner by its identifier
                $user = $userModel->find($id);
                $user->setUsername($name);
                /*$user->setPassword($password);*/
                $user->setMail($mail);
                $user->setFoto($filename);

                // updating changes
                $userModel->update($user);
            } catch (Exception $e) {
                $errors[] = 'Error: ' . $e->getMessage();
            }
        }
        return $this->response->renderView("users-update");
    }

    public function show(int $id)
    {
        $errors = [];
        if (!empty($id)) {
            try {

                $producteModel = new producteModel(App::get("DB"));
                $productes = $producteModel->findBy(["usuari_id"=>$id]);
                $userModel = new UserModel(App::get("DB"));
                $user = $userModel->find($id);

            } catch (NotFoundException $notFoundException) {
                $errors[] = $notFoundException->getMessage();
            }
        }
        return $this->response->renderView("perfil", "default", compact(
            "errors", "user","productes"));


    }



    public function check(int $id)
    {

        $errors = [];
        $userModel = App::getModel(UserModel::class);
        $title = "Passwords - Agrow";
        $user = $userModel->find($id);


        $router = App::get(Router::class);


        return $this->response->renderView("password-change", "default",
            compact('title', 'user', 'errors', 'router'));


    }

    public function validate(int $id){

        $errors = [];

        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        if (empty($id)) {
            $errors[] = "Wrong ID";
        }

        //Contrassenya

        $pass = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (empty($pass)) {
            $errors[] = "The old password is mandatory";
        }
        $pass2 = filter_input(INPUT_POST, "pass2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (empty($pass2)) {
            $errors[] = "The new password is mandatory";
        }
        if($pass != $pass2){

        }else{
            $errors[] = "No pots ficar la mateixa contrassenya. Prova un altra vegada!";
        }

        $pass = App::get("security")->encode($pass2);

        $pass2 = App::get("security")->encode($pass2);


        if (empty($errors)) {
            try {
                $userModel = App::getModel(UserModel::class);
                // getting the partner by its identifier
                $user = $userModel->find($id);

                //TODO:Preguntar a Jorda com comparar contrassenyes ja codificades.

/*                $contrassenya = $user->getPassword();
                if($contrassenya == $pass){*/
                    $user->setPassword($pass2);


                    // updating changes
                    $userModel->update($user);

/*                }else{
                    $errors[] = "La contrassenya vella no es correcta";
                }*/


            } catch (Exception $e) {
                $errors[] = 'Error: ' . $e->getMessage();
            }
        }
        return $this->response->renderView("password-validate","default",compact( 'errors'));



    }





}