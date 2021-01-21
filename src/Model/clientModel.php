<?php


use App\Core\Model;

class clientModel extends Model
{

    public function __construct(PDO $pdo, string $tableName = "client", string $className = Client::class)
    {
        parent::__construct($pdo, $tableName, $className);
    }

}