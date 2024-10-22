<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home - PPortfolioApp</title>
    <link href="./CSS/nav.css" rel="stylesheet"> <!--roept mijn nav-bar styling aan-->
    <link href="./CSS/body.css" rel="stylesheet"> <!--roept mijn body styling aan-->
    <link href="./CSS/section.css" rel="stylesheet"> <!--roept mijn section styling aan-->
    <link href="./CSS/forms.css" rel="stylesheet"> <!--roept mijn form styling aan-->
    <link href="./CSS/buttons.css" rel="stylesheet"> <!--roept mijn button styling aan-->
    <link href="./CSS/footer.css" rel="stylesheet"> <!--roept mijn footer styling aan-->
</head>
<?php require 'components/nav.view.php' ?>
<body>
<main>
    <section class="about-me grid-item">
        <h2>Ontdek wie ik ben en wat ik doe</h2>
        <p>
            Mijn naam is Renee Chantal Fonken en ik ben 21 jaar oud. Momenteel volg ik een associate's degree in Software
            Development aan Hogeschool Windesheim. Tijdens mijn studie werk ik met verschillende programmeertalen,
            zoals HTML, JavaScript, PHP en CSS, waarbij ik graag technieken als grid en flexbox toepas. Daarnaast gebruik
            ik SQL voor het beheren van databases. <br> <br>

            Naast mijn studie houd ik van creativiteit en ben ik in mijn vrije tijd bezig met kunst, zoals tekenen,
            schrijven en zingen. Ook game en lees ik graag, maar ik besteed vaak tijd aan het coderen, met name aan CSS.
            Deze website is een weerspiegeling van mijn passie voor technologie en design. Ik ben van plan om de site
            regelmatig te updaten en mijn projecten netjes bij te houden. <br> <br>

            Onder deze tekst vind je ook mijn CV, die je kunt downloaden.
        </p>
    </section>

    <section class="CV-dowload grid-item">
        <h2>Benieuwd naar mijn volledige ervaring en vaardigheden? Download mijn CV en ontdek meer!</h2>
        <button class="my-button-class" onclick="window.location.href='/'">Download mijn CV</button>
    </section>

    <section class="view-projects grid-item">
        <h2>Wil je zien waar ik aan gewerkt heb? Bekijk mijn projecten en ontdek mijn creaties</h2>
        <button class="my-button-class" onclick="window.location.href='/projects'">Bekijk hier mijn projecten</button>
    </section>
</main>
</body>


<?php require 'components/footer.view.php'  //footer opvragen ?>
</html>