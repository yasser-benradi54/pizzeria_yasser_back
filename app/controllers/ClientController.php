<?php
require_once 'app/models/ClientModel.php';

class ClientController {
    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $adresse = $_POST["adresse"];
            $telephone = $_POST["telephone"];
            $email = $_POST["email"];
            $mot_de_passe = $_POST["mot_de_passe"];

            $clientModel = new ClientModel();
            if ($clientModel->registerClient($nom, $prenom, $adresse, $telephone, $email, $mot_de_passe)) {
                echo "Inscription réussie !";
            } else {
                echo "Erreur lors de l'inscription.";
            }
        }
        require 'app/views/register.php';
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $mot_de_passe = $_POST["mot_de_passe"];

            $clientModel = new ClientModel();
            $client = $clientModel->loginClient($email, $mot_de_passe);
            if ($client) {
                session_start();
                $_SESSION["client_id"] = $client["id_client"];
                echo "Connexion réussie !";
            } else {
                echo "Email ou mot de passe incorrect.";
            }
        }
        require 'app/views/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /");
        exit();
    }
}
?>