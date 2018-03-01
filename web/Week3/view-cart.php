<?php
    // Start the session
    session_start();
    include "../header-working.php"; ?>
    <div class="../main-content">
     <a href="browse.php">Shop Some More</a><br><br>
     <h1>My Shopping Cart</h1>
            <p>This is a list of what you are going to purchase.</p>
            <p>
            <?php
            $_SESSION['cart'] = array();
            foreach($_POST as $item){
                array_push($_SESSION['cart'], $item);
            }

            echo "<h3><ul>";
            foreach($_SESSION['cart'] as $listItem) {
                foreach($listItem as $key=>$item) {
                echo "<li><a href='#'>[X]</a> - ";
                print_r($listItem[$key]);
                echo "</li><br>";

                }
            }
            echo "</ul></h3>";

            ?>
            </p>
            <form method="post" action="confirmation-page.php">
            Enter your Name:
            <input type="text" name="name" value="Name"><br>
            Enter your Billing Address:
            <input type="text" name="address" value="Address">
            <input type="submit" name="submit" value="submit">
            </form>
        </div>
<?php include "../footer.php"; ?>