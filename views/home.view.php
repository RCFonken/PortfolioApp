<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home - PPortfolioApp</title>
    <link href="./CSS/style.css" rel="stylesheet">
</head>
<?php require 'components/nav.view.php' ?>
<body>
<main class="grid-container">
    <div>
            <h2> Welkom op PortfolioApp</h2>
            <h4>Het portfolio van Renee Chantal Fonken.</h4>
    </div>

    <!-- tekst about us -->
    <section class="about-us grid-item">
        <h2>Over Mij</h2>
        <p>
            TBD
        </p>
    </section>

    <!-- extra tekst -->
    <section class="view-profiles grid-item">
        <h2>Bekijk alle projecten</h2>
        <button class="my-button-class" onclick="window.location.href='/projects'">Klik hier!</button>
<!--Ik had meerdere button manieren geprobeert, toch lukte het me heel de tijd niet om de button smooth naar de projecten
        pagina te navigeren, toch is dit na veel dingen gelezen te hebben me gelukt met een stukje javascript.-->
    </section>
</main>
</body>


<?php require 'components/footer.view.php'  //footer opvragen ?>
</html>
