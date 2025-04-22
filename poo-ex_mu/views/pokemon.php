
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail du Pokémon</title>
</head>
<body>
    <h1>Pokémon</h1>
    <p>ID : <?= $pokemon->getId() ?></p>
    <p>Nom : <?= $pokemon->getName() ?></p>
    <p>Statut : <?= $pokemon->getIsCaptured() ? 'Capturé' : 'Sauvage' ?></p>

    <a href="/">Retour</a>
</body>
</html>
