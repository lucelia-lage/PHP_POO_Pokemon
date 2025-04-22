<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Super poke</h1>
    <section>
        <h2>Capturer poke</h2>
        <?php if (isset($poke)): // si un pokemon est dispo pour capture?>
            <p>un Pokémon sauvage apparaît, <?= $poke->getName() // afficher le nom du pokemon?> est dans la place.</p> 
              <form action="/capture" method="post">
            <button type="submit" name="capture" value=<?= $poke->getId() ?>>Capturer</button>
        </form>

        <form action="/free" method="POST">
            <button type="submit" name="chill">Laisser tranquile</button>
        </form>
        <?php else: // si pas de pokemon dispo ?>
            <p>Tous les Pokemons ont été capturés</p>
        <?php endif ?> 
    </section>
    <section>
        <h2>Mes pokemons</h2>
        <?php foreach ($pokeArray as $pokeCapt): // afficher les pokemons capturés ?>
            <h3>
    <a href="/moreaboutpoke/<?= $pokeCapt->getId() // lien vers la page de détail du pokemon capturé ?>">
        <?= $pokeCapt->getName() // afficher le nom du pokemon capturé?> 
    </a>
</h3>
            <form action="/free" method="post">
                <button type="submit" name="free" value=<?= $pokeCapt->getId() // afficher le bouton pour libérer le pokemon capturé?>>Libérer</button> 
            </form>
        <?php endforeach ?>
    </section>
</body>
</html>


