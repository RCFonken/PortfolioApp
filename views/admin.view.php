<!-- html opening, header, nav and body opening tag in /components/nav.view.php -->
<?php require __DIR__ . '/components/nav.view.php'; // nav-bar opvragen?>

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
            <input class="styled-text-imput" type="file" name="project_image" required><br> <!-- Ensure this matches the name in PHP -->

            <button class="my-button-class" type="submit">Add Project</button>
        </form>


    </section>

    <section class="alt">
        <h1>Manage Projects</h1>
    </section>

    <section class="alt">
        <h1>Edit About Me</h1>
        <form action="/Services/edit_about.php" method="post">
            <!-- Bio Textarea -->
            <label for="bio">Bio:</label>
            <textarea class="styled-text-imput" id="bio" name="bio" rows="5" cols="50" placeholder="Add or update your bio"><?php echo htmlspecialchars($current_bio ?? ''); ?></textarea>

            <!-- CV Link -->
            <label for="cv_link">CV Link:</label><br>
            <input class="styled-text-imput" type="url" id="cv_link" name="cv_link" placeholder="Add or update your CV" value="<?php echo htmlspecialchars($current_cv_link ?? ''); ?>">
            <br>
            <!-- Submit button -->
            <button type="submit" class="my-button-class">Save Changes</button>
        </form>
    </section>
<!--    <section class="alt">-->
<!--        <h1>Edit Skills</h1>-->
<!--    </section>-->
<!--    <section class="alt-1">-->
<!--        <h1>Edit Qualifications</h1>-->
<!--    </section>-->
</under>
<!-- body end-tag, footer and html closing tag in /components/footer.view.php -->
<?php require __DIR__ . '/components/footer.view.php'; // footer opvragen ?>
