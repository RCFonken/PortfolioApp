<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home - PortfolioApp</title>
    <link href="./CSS/404.css" rel="stylesheet"> <!--roept mijn 404 styling aan-->
</head>
<?php require './views/components/nav.view.php'; //menu opvragen ?>
<br><br><br><br>
<!-- 404 tekst-->
<div id="error-page">
    <div class="content">
        <h2 class="header" data-text="404">
            404
        </h2>
        <h4 data-text="Opps! Page not found">
            Oeps, die bestaat niet...
        </h4>
        <p>
            De pagina die je probeert te bezoeken bestaat niet, klik op de knop om terug te gaan!
        </p>
        <div class="btns">
            <a onclick="history.back()">Ga terug!</a>
        </div>
    </div>
</div>

<?php require './views/components/footer.view.php' // footer opvragen?>
