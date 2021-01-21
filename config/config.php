<?php


return [
    "database" =>
        [
            "connection" => "mysql:host=localhost;dbname=tenda;charset=utf8",
            "username" => "dbuser",
            "password" => "1234",
            "options" => [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => true]
        ]
    ,
    "logfile" => "my_app.log",
    "partners_path" => "images/partners/",
    "posters_path" => "images/posters/",

    "security" => ["roles" =>
        [
            "ROLE_ADMIN" => 3,
            "ROLE_USER" => 2,
            "ROLE_ANONYMOUS" => 1
        ]
    ]


];
