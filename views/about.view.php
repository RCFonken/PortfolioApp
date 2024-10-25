<!--html opening, header, nav and body opening tag in /components/nav.view.php-->
<?php
require __DIR__ . '../../Services/about_data.php';
require __DIR__ . '/components/nav.view.php' ?>
<main>
    <section class="about-me grid-item">
        <h1>Ontdek wie ik ben en wat ik doe</h1>
        <p><?php echo nl2br(htmlspecialchars($bio)); ?></p> <!-- Use nl2br() to handle line breaks -->
    </section>

    <section class="CV-download grid-item">
        <h2>Benieuwd naar mijn volledige ervaring en vaardigheden? Download mijn CV en ontdek meer!</h2>
        <?php if (!empty($cv_link)): ?>
            <button class="my-button-class" onclick="window.location.href='<?php echo htmlspecialchars($cv_link); ?>'">Download mijn CV</button>
        <?php else: ?>
            <button class="my-button-class" disabled>Geen CV beschikbaar</button>
        <?php endif; ?>
    </section>

    <section class="view-projects grid-item">
        <h2>Wil je zien waar ik aan gewerkt heb? Bekijk mijn projecten en ontdek mijn creaties</h2>
        <button class="my-button-class" onclick="window.location.href='/projects'">Bekijk hier mijn projecten</button>
    </section>
</main>

<!--body end-tag, footer and html closing tag in /components/footer.view.php-->
<?php require __DIR__ . '/components/footer.view.php'  //footer opvragen ?>
