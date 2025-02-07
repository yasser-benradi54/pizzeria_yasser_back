<?php
require_once 'app/models/PizzaModel.php';

class PizzaController {
    public function index() {
        session_start();
        if (!isset($_SESSION["client_id"])) {
            header("Location: /login");
            exit();
        }

        $pizzaModel = new PizzaModel();
        $pizzas = $pizzaModel->getAllPizzas();
        require 'app/views/menu.php';
    }
}
?>