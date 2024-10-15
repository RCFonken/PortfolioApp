<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home - PortfolioApp</title>
    <link href="./CSS/style.css" rel="stylesheet">
</head>
<?php require 'components/nav.view.php' ?>
<body>
<main class="grid-container">
    <section class="banner grid-item">
            <h2> Welkom in mijn digitale wereld</h2>
            <h4>Ik ben Renee Fonken, een softwareontwikkelaar in opleiding met een passie voor creativiteit en technologie. <br>
                Op deze website deel ik mijn projecten, vaardigheden en meer over wie ik ben. Ontdek mijn reis als developer
                en laat je inspireren door mijn werk</h4>
    </section>

    <!-- tekst about us -->
    <section class="about-me grid-item">
        <h2>Over Mij</h2>
        <p>
            Ik ben een creatieve softwareontwikkelaar in opleiding, met een passie voor kunst, technologie en
            alles daartussenin.
        </p>
        <h2>Benieuwd naar wie ik ben en wat mij drijft? Lees meer over mij!</h2>
        <button class="my-button-class" onclick="window.location.href='/about'">Klik hier!</button>
    </section>

    <!-- extra tekst -->
    <section class="view-projects grid-item">
        <h2>Duik in mijn werk en ontdek de projecten waar ik met trost aan gewerkt heb</h2>
        <p>
            Van creatieve webdesigns tot technische uitdagingen – hier vind je mijn beste werk. Laat je inspireren door
            wat ik tot nu toe heb gebouwd!
        </p>
        <button class="my-button-class" onclick="window.location.href='/projects'">Bekijk mijn projecten</button>
<!--Ik had meerdere button manieren geprobeert, toch lukte het me heel de tijd niet om de button smooth naar de projecten
        pagina te navigeren, toch is dit na veel dingen gelezen te hebben me gelukt met een stukje javascript.-->
    </section>
</main>
</body>

<?php require 'components/footer.view.php'  //footer opvragen ?>
</html>
