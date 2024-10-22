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
    <section>
        <h2>Admin Login</h2>
        <form action="login.php" method="post" onsubmit="return validateForm()">
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
</body>


<?php require 'components/footer.view.php'  //footer opvragen ?>
</html>