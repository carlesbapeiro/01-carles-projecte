<?php

namespace App\Model;
use App\Core\Model;
use App\Entity\Client;
use PDO;

class clientModel extends Model
{

    public function __construct(PDO $pdo, string $tableName = "client", string $className = Client::class)
    {
        parent::__construct($pdo, $tableName, $className);
    }

}