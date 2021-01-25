<?php


namespace App\Model;


use App\Core\Model;
use App\Entity\Categoria;
use App\Entity\Producte;
use PDO;

class categoriaModel extends Model
{
    public function __construct(PDO $pdo, string $tableName = "categoria", string $className = Categoria::class)
    {
        parent::__construct($pdo, $tableName, $className);
    }


}