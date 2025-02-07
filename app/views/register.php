<!DOCTYPE html>
<html>
<head><title>Inscription</title></head>
<body>
    <h2>Inscription</h2>
    <form method="POST" action="/register">
        <input type="text" name="nom" placeholder="Nom" required><br>
        <input type="text" name="prenom" placeholder="Prénom" required><br>
        <input type="text" name="adresse" placeholder="Adresse" required><br>
        <input type="text" name="telephone" placeholder="Téléphone" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="mot_de_passe" placeholder="Mot de passe" required><br>
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>