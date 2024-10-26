<!--html opening, header, nav and body opening tag in /components/nav.view.php-->
<?php
// Include the navigation
require __DIR__ . '/components/nav.view.php'; // Make sure this path is correct

// Include the database connection and projects data
require_once __DIR__ . '/../Configuration/db_connect.php'; // This path is correct
require_once __DIR__ . '/../Services/projects_data.php'; // This path is correct

// Retrieve projects from the database
$projects = getProjects();
?>
<main>
    <section><h1>Projects</h1></section> <!-- Fixed the h1 tag -->
    <section class="project-display">
        <?php if (!empty($projects)): ?>
            <?php foreach ($projects as $project): ?>
                <section class="project">
                    <h2><?= htmlspecialchars($project['title']) ?></h2>
                    <img class="img" src="../../Services/<?= htmlspecialchars($project['image_path']) ?>"
                         alt="<?= htmlspecialchars($project['title']) ?>" style="max-width: 300px;"
                         onerror="this.onerror=null; this.src='views/components/default.img.jpg';">

                    <p class="description"><?= htmlspecialchars($project['description']) ?></p>
                    <p class="small-text">Start Date: <?= htmlspecialchars($project['start_date']) ?></p>
                    <p class="small-text">End Date: <?= htmlspecialchars($project['end_date']) ?: 'Ongoing' ?></p>
                </section>

            <?php endforeach; ?>
        <?php else: ?>
            <p>No projects found.</p>
        <?php endif; ?>
    </section>
</main>
<!--body end-tag, footer and html closing tag in /components/footer.view.php-->
<?php require __DIR__ . '/components/footer.view.php'; // Added semicolon at the end ?>
