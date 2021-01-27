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
            $categoriaModel = App::getModel(categoriaModel::class);
            $categories = $categoriaModel->findAll();
            $producteModel = App::getModel(producteModel::class);
            $productes = $producteModel->findAll();


        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }


        $title = "Agrow";

        $router = App::get(Router::class);

        return $this->response->renderView("index", "default", compact('title', 'productes', 'router','categories'));
    }

    public function contact()
    {

// 2. S'ha enviat el formulari
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 3. Validar
            if (empty($_POST['nom'])) {
                $errors[] = "No has posat el nom i cognom";
            } else {
                $nom = trim($_POST['nom']);
                $nom = htmlspecialchars($nom);
            }

            if (empty($_POST['data'])) {
                $errors[] = "No has posat la data";
            } else {
                $data = trim($_POST['data']);
                $data = htmlspecialchars($data);
            }

            if (empty($_POST['email'])) {
                $errors[] = "No has posat el correu";
            } else {
                $email = trim($_POST['email']);
                $email = htmlspecialchars($email);
            }

            if (empty($_POST['assumpte'])) {
                $errors[] = "No has posat l'assumpte";
            } else {
                $assumpte = trim($_POST['assumpte']);
                $assumpte = htmlspecialchars($assumpte);
            }

            if (empty($_POST['missatge'])) {
                $errors[] = "No has posat el missatge";
            } else {
                $missatge = trim($_POST['missatge']);
                $missatge = htmlspecialchars($missatge);
            }

        }
        require 'views/contact.view.php';
    }

    public function demo(): string
    {

        $movieModel = App::getModel(MovieModel::class);
        $movies = $movieModel->findAllPaginated(1, 8,
            ["release_date" => "DESC", "title" => "ASC"]);
        return $this->response->jsonResponse($movies);

    }

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
        return $this->response->renderView("index", "default", compact('title', 'productes', 'errors', "router", 'categories'));
    }
}