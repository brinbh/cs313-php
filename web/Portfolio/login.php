<?php
    session_start();
    require "db/user_model.php";

    if (isset($_POST['username'])) {
        $userName = $_POST['username'];
        $userPass = $_POST['password'];
        $result = addUser($userName, $userPass);
    }

?>
<html>
    <head>
        <meta title="Brittany's Portfolio">
        <link rel="stylesheet" type="text/css" href="css/main-style.css">
        <link rel="stylesheet" type="text/css" href="css/sub-style.css">
    </head>
    <body style="background-color: #F2F1EF;">
        <header>
            <!--Logo /-->
            <!--Navigation? /-->
            <div class="menu">
            <h1>Account</h1>
            <a href="index.php" class="button">Home</a>
            </div>
        </header>
        <!--Body /-->
        <div class="content">
            <div class="row">
               <h3>Login</h3>
            </div>
            <div class="row">
                <h3>Don't have an account? Sign Up</h3>
                <?php echo $result; ?>
                <form action="login.php" method="post">
                    <p>Username: </p><input type="text" name="username" required>
                    <p>Password: </p><input type="password" name="password" required>
                    <input type="submit" class="button" value="Sign Up">
                </form>
            </div>
        </div>
        <footer>
        </footer>
    </body>

</html>