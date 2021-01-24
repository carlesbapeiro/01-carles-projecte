<?php

/* Default routes */
$router->get("", "DefaultController", "index");
$router->get("contact", "DefaultController", "contact");
$router->get("api/demo", "DefaultController", "demo");

/* Productes route*/

$router->get("productes", "ProducteController", "index");
$router->post("productes", "ProducteController", "filter");


$router->get("productes/create", "ProducteController", "create");
$router->post("productes/create", "ProducteController", "store");

$router->get("productes/:id/delete", "ProducteController", "delete",["id"=>"number"], "productes_delete");
$router->post("productes/delete", "ProducteController", "destroy", [],"productes_destroy");

$router->get("productes/:id/edit", "ProducteController", "edit", ["id" => "number"], "productes_edit");
$router->post("productes/:id/edit", "ProducteController", "edit", ["id" => "number"],"productes_edit");

/* Usuaris */

$router->get("login","AuthController","login");
$router->post("login","AuthController", "checkLogin");


$router->get("logout", "AuthController", "logout");


$router->get("users", "UserController", "index");

$router->get("users/create", "UserController", "create", [], "user-create");
$router->post("users/create", "UserController", "store", [], "user-create");

$router->get("users/:id/delete", "UserController", "delete", ["id"=>"number"], "users_delete","ROLE_ADMIN");
$router->post("users/delete", "UserController", "destroy", [],"users_destroy","ROLE_ADMIN");

$router->get("users/:id/edit", "UserController", "edit", ["id"=>"number"], "users_edit");
$router->post("users/:id/edit", "UserController", "update", ["id"=>"number"], "users_update");


/* Movies routes */

$router->post("movies", "MovieController", "filter");

$router->get("movies/:id/edit", "MovieController", "edit", ["id" => "number"], "","ROLE_USER");
$router->post("movies/:id/edit", "MovieController", "edit", ["id" => "number"],"","ROLE_USER");






