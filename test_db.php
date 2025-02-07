<?php
require_once 'core/Database.php';

try {
    $db = new Database();
    $conn = $db->getConnection();
    echo "Connexion réussie à la base de données !<br>";

    // Test récupération des pizzas
    $query = "SELECT * FROM pizza";
    $stmt = $conn->query($query);
    $pizzas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($pizzas) {
        echo "Liste des pizzas disponibles : <br>";
        foreach ($pizzas as $pizza) {
            echo "🍕 " . $pizza['nom_pizza'] . " - " . number_format($pizza['prix_pizza'], 2) . "€<br>";
        }
    } else {
        echo "Aucune pizza trouvée dans la base de données.<br>";
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>