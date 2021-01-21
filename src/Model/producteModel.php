<?php


use App\Core\Model;

class producteModel extends Model
{

    public function __construct(PDO $pdo, string $tableName = "producte", string $className = Producte::class)
    {
        parent::__construct($pdo, $tableName, $className);
    }

}