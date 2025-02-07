<?php
require_once 'app/models/CommandeModel.php';

class CommandeController {
    public function validerCommande() {
        session_start();
        if (!isset($_SESSION["client_id"])) {
            echo "Vous devez être connecté pour passer une commande.";
            exit();
        }

        $data = json_decode(file_get_contents("php://input"), true);
        $client_id = $_SESSION["client_id"];

        $commandeModel = new CommandeModel();
        foreach ($data['panier'] as $item) {
            $commandeModel->ajouterCommande($client_id, $item['id_pizza'], $item['quantite']);
        }

        echo "Commande validée !";
    }
}
?>