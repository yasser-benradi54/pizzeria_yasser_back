<?php
require_once 'core/Database.php';

class CommandeModel {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function ajouterCommande($client_id, $pizza_id, $quantite) {
        $query = 'INSERT INTO commande (id_client, id_pizza, quantite_commande, date_commande) 
                  VALUES (:id_client, :id_pizza, :quantite, NOW())';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_client', $client_id);
        $stmt->bindParam(':id_pizza', $pizza_id);
        $stmt->bindParam(':quantite', $quantite);
        return $stmt->execute();
    }
}
?>