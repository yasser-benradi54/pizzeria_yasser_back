<?php
require_once 'app/models/IngredientModel.php';

class IngredientController {
    public function index() {
        $ingredientModel = new IngredientModel();
        $ingredients = $ingredientModel->getAllIngredients();
        require 'app/views/ingredients.php';
    }
}
?>