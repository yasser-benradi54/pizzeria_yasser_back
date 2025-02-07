<!DOCTYPE html>
<html>
<head>
    <title>Menu des Pizzas</title>
    <script>
        let panier = [];

        function ajouterAuPanier(id_pizza, nom_pizza, prix_pizza) {
            let item = panier.find(p => p.id_pizza === id_pizza);
            if (item) {
                item.quantite++;
            } else {
                panier.push({ id_pizza, nom_pizza, prix_pizza, quantite: 1 });
            }
            afficherPanier();
        }

        function afficherPanier() {
            let panierHtml = '<h3>Panier</h3>';
            panier.forEach(item => {
                panierHtml += `<p>${item.nom_pizza} x ${item.quantite} - ${item.prix_pizza * item.quantite}€</p>`;
            });
            panierHtml += '<button onclick="validerCommande()">Valider</button>';
            document.getElementById("popupPanier").innerHTML = panierHtml;
        }

        function validerCommande() {
            fetch('/validerCommande', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ panier })
            }).then(response => response.text()).then(data => {
                alert(data);
                panier = [];
                afficherPanier();
            });
        }
    </script>
</head>
<body>
    <h2>Menu des Pizzas</h2>
    <div id="menuPizzas">
        <?php foreach ($pizzas as $pizza): ?>
            <div>
                <h3><?php echo $pizza['nom_pizza']; ?> - <?php echo number_format($pizza['prix_pizza'], 2); ?>€</h3>
                <p><?php echo $pizza['ingredients']; ?></p>
                <button onclick="ajouterAuPanier(<?php echo $pizza['id_pizza']; ?>, '<?php echo $pizza['nom_pizza']; ?>', <?php echo $pizza['prix_pizza']; ?>)">Ajouter au Panier</button>
            </div>
        <?php endforeach; ?>
    </div>
    <div id="popupPanier" style="position: fixed; top: 10px; right: 10px; background: white; padding: 10px;"></div>
</body>
</html>