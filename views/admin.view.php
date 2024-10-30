<?php
// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to login page
    header('Location: /login'); // Adjust the path to your actual login page
    exit; // Stop script execution
}

require __DIR__ . '/components/nav.view.php'; // nav-bar opvragen
require_once __DIR__ . '/../Configuration/db_connect.php'; // Database connection

// Fetch all projects from the database
$stmt = $pdo->query("SELECT project_id, title FROM projects ORDER BY created_at DESC");
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<main>
    <section><h1>Admin dashboard</h1></section>
</main>
<under class="side-by-side">
    <section class="alt">
        <h1>Add project</h1>
        <form action="/Services/add_project_process.php" method="POST" enctype="multipart/form-data">
            <label>Title:</label><br>
            <input class="styled-text-imput" type="text" name="title" required><br>

            <label>Description:</label><br>
            <textarea class="styled-text-imput" name="description" required></textarea><br>

            <label>Start Date:</label><br>
            <input class="my-button-class" type="date" name="start_date" required><br>

            <label>End Date:</label><br>
            <input class="my-button-class" type="date" name="end_date"><br>

            <label>Project Image:</label><br>
            <input class="styled-text-imput" type="file" name="project_image" required><br>

            <button class="my-button-class" type="submit">Add Project</button>
        </form>
    </section>

    <section class="alt">
        <h1>Manage Projects</h1>
        <ul>
            <?php foreach ($projects as $project): ?>
                <li>
                    <?= htmlspecialchars($project['title']) ?>
                    <a class="my-button-class" href="/Services/edit_project.php?project_id=<?= $project['project_id'] ?>">Edit</a>
                    <form action="/Services/delete_project.php" method="post" style="display:inline;">
                        <input type="hidden" name="project_id" value="<?= $project['project_id'] ?>">
                        <button class="my-button-class-alt" type="submit" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section class="alt">
        <h1>Edit About Me</h1>
        <form action="/Services/edit_about.php" method="post">
            <label for="bio">Bio:</label>
            <br>
            <textarea class="styled-text-imput" id="bio" name="bio" rows="5" cols="50" placeholder="Add or update your bio"><?php echo htmlspecialchars($current_bio ?? ''); ?></textarea>
            <br>
            <label for="cv_link">CV Link:</label><br>
            <input class="styled-text-imput" type="url" id="cv_link" name="cv_link" placeholder="Add or update your CV" value="<?php echo htmlspecialchars($current_cv_link ?? ''); ?>">
            <br>
            <button type="submit" class="my-button-class">Save Changes</button>
        </form>
    </section>
</under>
<?php require __DIR__ . '/components/footer.view.php'; // footer opvragen ?>
