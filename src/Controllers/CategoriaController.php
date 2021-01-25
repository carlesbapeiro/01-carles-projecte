<?php


namespace App\Controllers;


use App\Core\App;
use App\Core\Controller;
use App\Core\Router;
use App\Core\Security;
use App\Model\categoriaModel;

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



}