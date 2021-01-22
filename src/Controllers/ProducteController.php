<?php


namespace App\Controllers;


use App\Core\App;
use App\Core\Controller;
use App\Core\Router;
use App\Entity\Producte;
use App\Model\producteModel;
use Exception;
use PDOException;

class ProducteController extends Controller
{

    public function index(): string
    {
        try {

            $producteModel = App::getModel(producteModel::class);
            $productes = $producteModel->findAll(["nom" => "ASC"]);


        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }


        $title = "Agrow";

        $router = App::get(Router::class);

        return $this->response->renderView("productes", "default", compact('title', 'productes', 'router'));

    }

    public function create(): string
    {
        $title = "Nou producte - Agrow";
        return $this->response->renderView("productes-create", "default", compact('title'));
    }
    public function store(): string
    {

        $errors = [];
        $title = "Nou Producte";

        $nom = filter_input(INPUT_POST, "nom");
        if (empty($name)) {
            $errors[] = "No pots deixar el nom buit";
        }
        $descripcio = filter_input(INPUT_POST, "descripcio");
        if (empty($preu)) {
            $errors[] = "No pots deixar la descripcio buida";
        }
        $preu = filter_input(INPUT_POST, "preu");
        if (empty($preu)) {
            $errors[] = "No pots deixar el preu buit";
        }


        if (empty($errors)) {
            try {
                $producte = new Producte();
                $producte->setNom($nom);
                $producte->setDescripcio($descripcio);
                $producte->setPreu($preu);


                $producteModel = App::getModel(producteModel::class);
                $producteModel->save($producte);

                $flash = App::get("flash");
                $flash::set("message", "El producte s'ha creat correctament");
                $redirect = App::get("router");
                $redirect::redirect('productes');

            } catch (Exception $e) {
                $errors[] = 'Error: ' . $e->getMessage();
            }
        }
        return $this->response->renderView("productes-store", "default", compact('errors', 'title'));
    }






}