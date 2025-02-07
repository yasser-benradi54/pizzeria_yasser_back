<?php
require_once 'core/Router.php';

$router = new Router();

$router->add("/", "ClientController", "index");
$router->add("/register", "ClientController", "register");
$router->add("/login", "ClientController", "login");
$router->add("/logout", "ClientController", "logout");
$router->add("/pizzas", "PizzaController", "index");
$router->add("/ingredients", "IngredientController", "index");
$router->add("/commande", "CommandeController", "create");
$router->add("/commandes", "CommandeController", "index");

$router->dispatch($_SERVER['REQUEST_URI']);
?>