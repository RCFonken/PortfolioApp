<!--html opening, header, nav and body opening tag in /components/nav.view.php-->
<?php
require __DIR__ . '../../Services/about_data.php';
require __DIR__ . '/components/nav.view.php' ?>
<main>
    <section class="about-me grid-item">
        <h1>Ontdek wie ik ben en wat ik doe</h1>
        <form method="post" action="edit_project.php">
            <input type="hidden" name="project_id" value="<?= $project['project_id'] ?>">
            <label>Title: </label><input class="styled-text-imput" type="text" name="title" value="<?= htmlspecialchars($project['title']) ?>"><br>
            <label>Description: </label><textarea class="styled-text-imput" name="description"><?= htmlspecialchars($project['description']) ?></textarea><br>
            <label>Start Date: </label><input class="styled-text-imput" type="date" name="start_date" value="<?= $project['start_date'] ?>"><br>
            <label>End Date: </label><input class="styled-text-imput" type="date" name="end_date" value="<?= $project['end_date'] ?>"><br>
            <button class="my-button-class" type="submit">Update Project</button>
        </form>
    </section>
</main>

<!--body end-tag, footer and html closing tag in /components/footer.view.php-->
<?php require __DIR__ . '/components/footer.view.php'  //footer opvragen ?>
