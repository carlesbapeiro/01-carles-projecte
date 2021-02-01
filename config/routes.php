<?php

/* Default routes */
$router->get("", "DefaultController", "index",[],"index");
$router->post("", "DefaultController", "filter", [],"default_filter");
/*$router->get("contact", "DefaultController", "contact");*/
$router->get("api/demo", "DefaultController", "demo");

/* Productes route*/

$router->get("productes", "ProducteController", "index",[],"","ROLE_USER");
$router->post("productes", "ProducteController", "filter", [],"productes_filter");


$router->get("productes/create", "ProducteController", "create",[],"","ROLE_USER");
$router->post("productes/create", "ProducteController", "store",[],"","ROLE_USER");

//Tots els usuaris poden vore la pagina del producte


$router->get("productes/:id/show","ProducteController","show",["id"=>"number"],"");

$router->get("productes/:id/delete", "ProducteController", "delete",["id"=>"number"], "productes_delete","ROLE_USER");
$router->post("productes/delete", "ProducteController", "destroy", [],"productes_destroy","ROLE_USER");

$router->get("productes/:id/edit", "ProducteController", "edit", ["id" => "number"], "productes_edit","ROLE_USER");
$router->post("productes/:id/edit", "ProducteController", "edit", ["id" => "number"],"productes_edit","ROLE_USER");

$router->get("productes/:id/cesta", "ProducteController", "cesta", ["id" => "number"],"productes_cesta","ROLE_USER");
$router->get("productes/cesta", "ProducteController", "mostrarCesta", [],"productes_cesta_mostrar","ROLE_USER");

$router->get("users/:id/show", "UserController", "show",
    ["id" => "number"], "users_show");

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

$router->get("users/:id/show", "UserController", "show",
    ["id" => "number"], "users_show");

$router->get("users/:id/check", "UserController", "check",
    ["id" => "number"], "users_check");
$router->post("users/:id/validate", "UserController", "validate",
    ["id" => "number"], "users_validate");

$router->post("users", "UserController", "filter", [],"users_filter");

/*   Categories   */


$router->get("categories", "CategoriaController", "index",[],"","ROLE_ADMIN");

$router->get("categories/create", "CategoriaController", "create",[],"","ROLE_ADMIN");
$router->post("categories/create", "CategoriaController", "store",[],"","ROLE_ADMIN");

$router->get("categories/:id/delete", "CategoriaController", "delete",["id"=>"number"],"categories_delete","ROLE_ADMIN");
$router->post("categories/destroy", "CategoriaController", "destroy",[],"categories_destroy","ROLE_ADMIN");

$router->get("categories/:id/edit", "CategoriaController", "edit", ["id"=>"number"], "categories_edit");
$router->post("categories/:id/edit", "CategoriaController", "update", ["id"=>"number"], "categories_update");






