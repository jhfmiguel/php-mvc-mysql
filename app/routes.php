<?php

$route -> get("/", "Index@index");

$route -> get("/login", "Login@index");

$route -> get("/cadastro", "Index@cadCliente");

$route -> get("/editar", "Index@editCliente");

$route -> get("/logout", "Login@logout");

$route -> get("/erroCadastro", "Index@erroCadastro");
$route -> get("/erroUpdate", "Index@erroUpdate");
$route -> get("/erroDelete", "Index@erroDelete");


$route -> get("/editCliente/[i:id]", "Index@editCliente");
$route -> get("/deleteCliente/[i:id]", "Index@deleteCliente");

//rotas para POST
$route -> post("/cadastro", "Index@cadClientePost");
$route -> post("/editCliente/[i:id]", "Index@editClientePost");
$route -> post("/login", "Login@loginPost");