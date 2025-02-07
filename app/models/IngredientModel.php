<?php
require_once 'core/Database.php';

class IngredientModel {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getAllIngredients() {
        $query = 'SELECT * FROM ingredient';
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>