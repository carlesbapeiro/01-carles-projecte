<?php


namespace App\Controllers;


use App\Core\App;
use App\Core\Controller;
use App\Core\Exception\NotFoundException;
use App\Core\Router;
use App\Core\Security;
use App\Entity\Producte;
use App\Exception\UploadedFileException;
use App\Exception\UploadedFileNoFileException;
use App\Model\producteModel;
use App\Utils\UploadedFile;
use Exception;
use PDOException;

class ProducteController extends Controller
{

    public function index(): string
    {
        try {

/*            if (!Security::isAuthenticatedUser())
                App::get(Router::class)->redirect('login');*/

            $producteModel = App::getModel(producteModel::class);
            $productes = $producteModel->findAll(["nom" => "ASC"]);




        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }

        if(!empty($_SESSION["loggedUser"])){

            $messageUser = $_SESSION["loggedUser"];

        }else{
            $messageUser="";
        }


        $title = "Agrow";

        $router = App::get(Router::class);

        return $this->response->renderView("productes", "default", compact('title', 'productes', 'router','messageUser'));

    }

    public function create(): string
    {
/*        if (!Security::isAuthenticatedUser())
            App::get(Router::class)->redirect('login');*/
        $title = "Nou producte - Agrow";
        return $this->response->renderView("productes-create", "default", compact('title'));
    }
    public function store(): string
    {
/*        if (!Security::isAuthenticatedUser())
            App::get(Router::class)->redirect('login');*/

        $errors = [];
        $title = "Nou Producte";

        $nom = filter_input(INPUT_POST, "nom");
        if (empty($nom)) {
            $errors[] = "No pots deixar el nom buit";
        }
        $descripcio = filter_input(INPUT_POST, "descripcio");
        if (empty($descripcio)) {
            $errors[] = "No pots deixar la descripcio buida";
        }
        $preu = filter_input(INPUT_POST, "preu");
        if (empty($preu)) {
            $errors[] = "No pots deixar el preu buit";
        }

        if (empty($errors)) {
            try {
                $uploadedFile = new UploadedFile("poster", 2000 * 1024, ["image/jpeg", "image/jpg"]);
                if ($uploadedFile->validate()) {
                    $uploadedFile->save(Producte::POSTER_PATH, uniqid("MOV"));
                    $filename = $uploadedFile->getFileName();
                }
            } catch (Exception $exception) {
                $errors[] = "Error uploading file ($exception)";
            }
        }


        if (empty($errors)) {
            try {
                $producte = new Producte();
                $producte->setNom($nom);
                $producte->setDescripcio($descripcio);
                $producte->setPreu($preu);
                $producte->setPoster($filename);


                $producteModel = App::getModel(producteModel::class);
                $producteModel->save($producte);

                $flash = App::get("flash");
                $flash::set("message", "El producte s'ha creat correctament");
                $redirect = App::get("router");
                //$redirect::redirect('productes');

            } catch (Exception $e) {
                $errors[] = 'Error: ' . $e->getMessage();
            }
        }
        return $this->response->renderView("productes-store", "default", compact('errors', 'title'));
    }

    public function delete(int $id): string
    {
        if (!Security::isAuthenticatedUser())
            App::get(Router::class)->redirect('login');

        $errors = [];
        $producte = null;
        $producteModel = App::getModel(producteModel::class);

        if (empty($id)) {
            $errors[] = '404 Not Found';
        } else {
            try {
                $producte = $producteModel->find($id);
            } catch (NotFoundException $e) {
                $errors[] = '404 Movie Not Found';
            }
        }

        $router = App::get(Router::class);
        $productePath = App::get("config")["productes_path"];

        return $this->response->renderView("productes-delete", "default", compact(
            "errors", "producte", 'productePath', 'router'));
    }

    public function destroy(): string
    {
        $errors = [];
        $producteModel = App::getModel(producteModel::class);

        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        if (empty($id)) {
            $errors[] = '404 Not Found';
        } else {
            $producte = $producteModel->find($id);
        }
        $userAnswer = filter_input(INPUT_POST, "userAnswer");
        if ($userAnswer === 'yes') {
            if (empty($errors)) {
                try {
                    $producte = $producteModel->find($id);
                    $result = $producteModel->delete($producte);
                } catch (PDOException $e) {
                    $errors[] = "Error: " . $e->getMessage();
                }
            }
        }
        else
            App::get(Router::class)->redirect('productes');

        if (empty($errors))
            App::get(Router::class)->redirect('productes');
        else
            return $this->response->renderView("productes-destroy", "default",
                compact("errors", "producte"));
    }

    public function filter(): string
    {
        // S'executa amb el POST

        $title = "Productes - Agrow";
        $errors = [];

        $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_STRING);

        $tipo_busqueda = filter_input(INPUT_POST, "optradio", FILTER_SANITIZE_STRING);

        if (!empty($text)) {
            $pdo = App::get("DB");
            $producteModel = new producteModel($pdo);
            if ($tipo_busqueda == "both") {
                $productes = $producteModel->executeQuery("SELECT * FROM producte WHERE preu LIKE :text OR nom LIKE :text",
                    ["text" => "%$text%"]);

            }
            if ($tipo_busqueda == "nom") {
                $productes = $producteModel->executeQuery("SELECT * FROM producte WHERE nom LIKE :text",
                    ["text" => "%$text%"]);

            }
            if ($tipo_busqueda == "preu") {
                $productes = $producteModel->executeQuery("SELECT * FROM producte WHERE preu LIKE :text",
                    ["text" => "%$text%"]);

            }

        } else {
            $error = "Cal introduir una paraula de búsqueda";

        }
        return $this->response->renderView("productes", "default", compact('title', 'productes',
            'producteModel', 'errors'));
    }


    public function edit(int $id)
    {
/*        if (!Security::isAuthenticatedUser())
            App::get(Router::class)->redirect('login');*/

        $isGetMethod = true;
        $errors = [];
        $producteModel = new producteModel(App::get("DB"));

        if (empty($id)) {
            $errors[] = '404 Not Found';
        } else {
            $producte = $producteModel->find($id);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $isGetMethod = false;

            $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
            if (empty($id)) {
                $errors[] = "Wrong ID";
            }

            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if (empty($nom)) {
                $errors[] = "The nom is mandatory";
            }

            $descripcio = filter_input(INPUT_POST, "descripcio", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if (empty($descripcio)) {
                $errors[] = "The descripcio is mandatory";
            }

            $preu = filter_input(INPUT_POST, "preu", FILTER_VALIDATE_INT);

            /*$releaseDate = DateTime::createFromFormat("Y-m-d", $_POST["release_date"]);*/
          /*  if (empty($releaseDate)) {
                $errors[] = "The release date is mandatory";
            }*/

            if (empty($errors)) {
                //Si no se sube una imagen cogera la que tenemos en el formulario oculta
                $poster = filter_input(INPUT_POST, "poster");
                //Gestion de la imagen si se ha subido
                try {
                    $image = new UploadedFile('poster', 300000, ['image/jpg', 'image/jpeg']);
                    if ($image->validate()) {
                        $image->save(Producte::POSTER_PATH);
                        $poster = $image->getFileName();
                    }
                    //Al estar editando no nos interesa que se muestre este error ya que puede ser que no suba archivo
                } catch (UploadedFileNoFileException $uploadFileNoFileException) {
                    //$errors[] = $uploadFileNoFileException->getMessage();
                } catch (UploadedFileException $uploadFileException) {
                    $errors[] = $uploadFileException->getMessage();
                }
            }

            if (empty($errors)) {
                try {
                    // Instead of creating a new object we load the current data object.
                    $producte = $producteModel->find($id);

                    //then we set the new values
                    $producte->setNom($nom);
                    $producte->setDescripcio($descripcio);
                    $producte->setPreu($preu);
                    $producte->setPoster($poster);

                    $producteModel->update($producte);

                } catch (PDOException $e) {
                    $errors[] = "Error: " . $e->getMessage();
                }
            }
        }

        return $this->response->renderView("productes-edit", "default", compact("isGetMethod",
            "errors", "producte"));
    }





}