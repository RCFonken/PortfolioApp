<!--html opening, header, nav and body opening tag in /components/nav.view.php-->
<?php require __DIR__ . '/components/nav.view.php' ?>
<main>
    <section>
        <h2>Admin Login</h2>
        <form action="/Services/login.php" method="post" onsubmit="return validateForm()">
            <label for="username">Username:</label>
            <input class="styled-text-imput" type="text" id="username" placeholder="Username" name="username" required><br><br>

            <label for="password">Password:</label>
            <input  class="styled-text-imput" type="password" id="password" placeholder="Password" name="password" required>
            <br><br>

            <input type="submit" value="Login" class="my-button-class">
        </form>
    </section>

    <script>
        function validateForm() {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (username === "" || password === "") {
                alert("Both fields are required.");
                return false;
            }
            return true;
        }
    </script>
</main>
<!--body end-tag, footer and html closing tag in /components/footer.view.php-->
<?php require __DIR__ . '/components/footer.view.php'  //footer opvragen ?>
