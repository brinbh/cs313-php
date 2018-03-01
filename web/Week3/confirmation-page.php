<?php
    // Start the session
    session_start();
    include "../header-working.php";
    $name = htmlspecialchars($_POST["name"])?>
        <div class="../main-content">
        <h1>Thank you <?php echo $name; ?> for your purchase!</h1>
        <?php echo "<h3><ul>";
            foreach($_SESSION['cart'] as $listItem) {
                foreach($listItem as $key=>$item) {
                    echo "<li>";
                    print_r($listItem[$key]);
                    echo "</li><br>";
                }
            }
            echo "</ul></h3>";
            $address = htmlspecialchars($_POST["address"]);
        ?>
        <p><em>Your purchase has been shipped to <?php echo $address; ?> </em> </p>
        </div>
<?php include "../footer.php"; ?>
/Applications/mappstack-7.1.13-0