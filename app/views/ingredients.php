<!DOCTYPE html>
<html>
<head><title>Ingrédients</title></head>
<body>
    <h2>Liste des Ingrédients</h2>
    <ul>
        <?php foreach ($ingredients as $ingredient) {
            echo "<li>" . htmlspecialchars($ingredient['nom_ingredient']) . "</li>";
        } ?>
    </ul>
</body>
</html>