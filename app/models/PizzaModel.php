<?php
require_once 'core/Database.php';

class PizzaModel {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getAllPizzas() {
        $query = 'SELECT p.*, GROUP_CONCAT(i.nom_ingredient SEPARATOR ", ") AS ingredients 
                  FROM pizza p 
                  LEFT JOIN compose c ON p.id_pizza = c.id_pizza 
                  LEFT JOIN ingredient i ON c.id_ingredient = i.id_ingredient 
                  GROUP BY p.id_pizza';
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>