<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Controller;
use App\Core\Router;
use App\Model\categoriaModel;
use App\Model\GenreModel;
use App\Model\MovieModel;
use App\Model\PartnerModel;
use App\Model\producteModel;
use App\Model\UserModel;
use Exception;
use PDOException;
use App\Entity\Movie;



class DefaultController extends Controller
{
    public function index(): string
    {


        try {

            $pdo = App::get("DB");

            $numberOfRecordsPerPage = 4;
            $categoriaModel = App::getModel(categoriaModel::class);
            $categories = $categoriaModel->findAll();
            $producteModel = App::getModel(producteModel::class);

            $consulta = $pdo->query("SELECT COUNT(*) as productes FROM producte");

            $productes = $consulta->fetch();


            $paginesTotals = $productes["productes"];

            $paginesTotals = ceil($paginesTotals /$numberOfRecordsPerPage);

            $currentPage = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);
            if (empty($currentPage))
                $currentPage = 1;

            $limit = $numberOfRecordsPerPage;

            $productes = $producteModel->findAllPaginated($currentPage, $limit);



        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }


        $title = "Agrow";

        $router = App::get(Router::class);

        return $this->response->renderView("index", "default", compact('title', 'productes', 'router','categories','paginesTotals'));
    }

/*    public function demo(): string
    {

        $producteModel = App::getModel(producteModel::class);
        $productes = $producteModel->findAllPaginated(1, 8);
        return $this->response->jsonResponse($productes);

    }*/

    public function filter(): string
    {
        // S'executa amb el POST
        $categoriaModel = App::getModel(categoriaModel::class);
        $categories = $categoriaModel->findAll();
        $router = App::get(Router::class);
        $title = "Agrow";
        $errors = [];

        $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_STRING);
        $tipo_busqueda = filter_input(INPUT_POST, "optradio", FILTER_SANITIZE_STRING);


        if (!empty($text) || $tipo_busqueda == "cat") {

            $pdo = App::get("DB");
            $producteModel = new producteModel($pdo);

            if ($tipo_busqueda == "nom") {
                $productes = $producteModel->executeQuery("SELECT * FROM producte WHERE nom LIKE :text",
                    ["text" => "%$text%"]);

            }
            if ($tipo_busqueda == "descripcio") {
                $productes = $producteModel->executeQuery("SELECT * FROM producte WHERE descripcio LIKE :text",
                    ["text" => "%$text%"]);

            }
            if ($tipo_busqueda == "cat") {
                $tipusCategoria = filter_input(INPUT_POST, "catsel", FILTER_SANITIZE_STRING);
                $productes = $producteModel->executeQuery("SELECT * FROM producte WHERE categoria_id LIKE :tipusCategoria",
                    ["tipusCategoria" => "%$tipusCategoria%"]);

            }

        } else {

            $pdo = App::get("DB");
            $producteModel = new producteModel($pdo);

            $productes = $producteModel->findAll();
            $errors[] = "Cal introduir una paraula de búsqueda o marcar la categoria";

        }

        $numberOfRecordsPerPage = 4;
        $paginesTotals = count($productes);

        $paginesTotals = ceil($paginesTotals /$numberOfRecordsPerPage);

        $currentPage = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);
        if (empty($currentPage))
            $currentPage = 1;


        return $this->response->renderView("index", "default", compact('title', 'productes', 'errors', "router", 'categories','paginesTotals'));
    }
}