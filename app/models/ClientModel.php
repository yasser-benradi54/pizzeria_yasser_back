<?php
require_once 'core/Database.php';

class ClientModel {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function registerClient($nom, $prenom, $adresse, $telephone, $email, $mot_de_passe) {
        $query = 'INSERT INTO client (nom_client, prenom_client, adresse_client, telephone_client, email_client, mot_de_passe_client) 
                  VALUES (:nom_client, :prenom_client, :adresse_client, :telephone_client, :email_client, :mot_de_passe_client)';
        $stmt = $this->db->prepare($query);
        $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $stmt->bindParam(':nom_client', $nom);
        $stmt->bindParam(':prenom_client', $prenom);
        $stmt->bindParam(':adresse_client', $adresse);
        $stmt->bindParam(':telephone_client', $telephone);
        $stmt->bindParam(':email_client', $email);
        $stmt->bindParam(':mot_de_passe_client', $mot_de_passe_hash);
        return $stmt->execute();
    }

    public function loginClient($email, $mot_de_passe) {
        $query = 'SELECT * FROM client WHERE email_client = :email_client';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email_client', $email);
        $stmt->execute();
        $client = $stmt->fetch();
        if ($client && password_verify($mot_de_passe, $client['mot_de_passe_client'])) {
            return $client;
        }
        return null;
    }
}
?>