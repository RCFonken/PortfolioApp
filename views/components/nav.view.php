<header>
<div class="navbar">
    <a class="logo" href="/"> <b>PortfolioApp</b> </a>
    <a href="/">Home</a>
    <a href="/about">About</a>
    <a href="/projects">Projects</a>

    <div class="right"> <!-- This div holds the admin links -->
        <?php
        // Check if the user is logged in
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            echo '<a href="#" class="disabled-link">Logged in as ' . $_SESSION['username'] . '</a>';
            echo '<a href="/admin">Admin dashboard</a>';
            echo '<a href="/logout.php">Logout</a>';
        } else {
            echo '<a href="/admin-login">Admin Login</a>';
        }
        ?>
    </div>
</div>
</header>