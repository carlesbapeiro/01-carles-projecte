<?php


namespace App\Controllers;


use App\Core\App;
use App\Core\Controller;
use App\Core\Exception\NotFoundException;
use App\Core\Router;
use App\Core\Security;
use App\Database;
use App\Entity\Categoria;
use App\Model\categoriaModel;
use App\Utils\UploadedFile;
use Exception;
use PDOException;

class CategoriaController extends Controller
{

    public function index(): string
    {


        $title = "Categories - AGROW";
        $errors = [];
        $categoriaModel = new categoriaModel(App::get("DB"));
        $categories = $categoriaModel->findAll();

        $order = filter_input(INPUT_GET, "order", FILTER_SANITIZE_STRING);

/*        if (!empty($_GET['order'])) {
            $orderBy = [$_GET["order"] => $_GET["tipo"]];
            try {
                $movies = $movieModel->findAll($orderBy);
            } catch (Exception $e) {
                $errors[] = $e->getMessage();
            }
        }*/

        if(!empty($_SESSION["loggedUser"])){

            $messageUser = $_SESSION["loggedUser"];

        }else{
            $messageUser="";
        }
        $router = App::get(Router::class);

        return $this->response->renderView("categories", "default", compact('title', 'categories',
            'categoriaModel', 'errors', 'router', 'messageUser'));
    }

    public function create(): string
    {


        $title = "Nova Categoria - Agrow";
        return $this->response->renderView("categories-create", "default", compact('title'));
    }

    public function store(): string
    {


        $errors = [];
        $title = "Nova Categoria";

        $nom = filter_input(INPUT_POST, "nom");
        if (empty($nom)) {
            $errors[] = "No pots deixar el nom buit";
        }

        if (empty($errors)) {
            try {
                $categoria = new Categoria();
                $categoria->setNom($nom);

                $categoriaModel = App::getModel(categoriaModel::class);
                $categoriaModel->save($categoria);

/*                $flash = App::get("flash");
                $flash::set("message", "El producte s'ha creat correctament");*/
               /* $redirect = App::get("router");*/
                //$redirect::redirect('productes');

            } catch (Exception $e) {
                $errors[] = 'Error: ' . $e->getMessage();
            }
        }
        return $this->response->renderView("categories-store", "default", compact('errors', 'title'));
    }
    public function delete(int $id): string
    {

        $errors = [];
        $categoria = null;
        $categoriaModel = App::getModel(categoriaModel::class);

        if (empty($id)) {
            $errors[] = '404 Not Found';
        } else {
            try {
                $categoria = $categoriaModel->find($id);
            } catch (NotFoundException $e) {
                $errors[] = '404 Categoria Not Found';
            }
        }

        $router = App::get(Router::class);

        return $this->response->renderView("categories-delete", "default", compact(
            "errors", "categoria", 'router'));
    }

    public function destroy(): string
    {
        $errors = [];
        $categoriaModel = App::getModel(categoriaModel::class);

        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        if (empty($id)) {
            $errors[] = '404 Not Found';
        } else {
            $categoria = $categoriaModel->find($id);
        }
        $userAnswer = filter_input(INPUT_POST, "userAnswer");
        if ($userAnswer === 'yes') {
            if (empty($errors)) {
                try {
                    $categoria = $categoriaModel->find($id);
                    $result = $categoriaModel->delete($categoria);
                } catch (PDOException $e) {
                    $errors[] = "Error: " . $e->getMessage();
                }
            }
        }
        else
            App::get(Router::class)->redirect('categories');

/*        if (empty($errors))
            App::get(Router::class)->redirect('categories');
        else*/
            return $this->response->renderView("categories-destroy", "default",
                compact("errors", "categoria"));
    }

    public function edit(int $id): string
    {
        $title = "Editar Categories - Agrow";

        $categoriaModel = App::getModel(categoriaModel::class);
        $categoria = $categoriaModel->find($id);

        $router = App::get(Router::class);

        return $this->response->renderView("categories-edit", "default", compact('title',
            'categoria', 'router'));

    }

    public function update(int $id): string
    {
        $errors = [];

        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        if (empty($id)) {
            $errors[] = "Wrong ID";
        }

        $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (empty($nom)) {
            $errors[] = "The name is mandatory";
        }

        if (empty($errors)) {
            try {
                $categoriaModel = App::getModel(categoriaModel::class);


                $categoria = $categoriaModel->find($id);
                $categoria->setNom($nom);

                $categoriaModel->update($categoria);
            } catch (Exception $e) {
                $errors[] = 'Error: ' . $e->getMessage();
            }
        }
        return $this->response->renderView("categories-update");
    }









}