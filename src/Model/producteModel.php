<?php

namespace App\Model;
use App\Core\Model;
use App\Entity\Producte;
use PDO;

class producteModel extends Model
{

    public function __construct(PDO $pdo, string $tableName = "producte", string $className = Producte::class)
    {
        parent::__construct($pdo, $tableName, $className);
    }

}