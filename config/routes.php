<?php

/* Default routes */
$router->get("", "DefaultController", "index");
$router->get("contact", "DefaultController", "contact");
$router->get("api/demo", "DefaultController", "demo");

/* Productes route*/

$router->get("productes", "ProducteController", "index",[],"","ROLE_USER");
$router->post("productes", "ProducteController", "filter", [],"productes_filter");


$router->get("productes/create", "ProducteController", "create",[],"","ROLE_ADMIN");
$router->post("productes/create", "ProducteController", "store",[],"","ROLE_ADMIN");

$router->get("productes/:id/delete", "ProducteController", "delete",["id"=>"number"], "productes_delete","ROLE_ADMIN");
$router->post("productes/delete", "ProducteController", "destroy", [],"productes_destroy","ROLE_ADMIN");

$router->get("productes/:id/edit", "ProducteController", "edit", ["id" => "number"], "productes_edit","ROLE_ADMIN");
$router->post("productes/:id/edit", "ProducteController", "edit", ["id" => "number"],"productes_edit","ROLE_ADMIN");

/* Usuaris */

$router->get("login","AuthController","login");
$router->post("login","AuthController", "checkLogin");


$router->get("logout", "AuthController", "logout");


$router->get("users", "UserController", "index",[],"","ROLE_ADMIN");

$router->get("users/create", "UserController", "create", [], "user-create");
$router->post("users/create", "UserController", "store", [], "user-create");

$router->get("users/:id/delete", "UserController", "delete", ["id"=>"number"], "users_delete","ROLE_ADMIN");
$router->post("users/delete", "UserController", "destroy", [],"users_destroy","ROLE_ADMIN");

$router->get("users/:id/edit", "UserController", "edit", ["id"=>"number"], "users_edit");
$router->post("users/:id/edit", "UserController", "update", ["id"=>"number"], "users_update");

/*   Categories   */


$router->get("categories", "CategoriaController", "index",[],"","ROLE_ADMIN");





