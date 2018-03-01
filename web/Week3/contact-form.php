<?php include "../header-working.php"; ?>
        <div class="../main-content">
            <div>
            <h3>Hi, <?php echo $_POST["name"]; ?></h3><br>
            <p><strong>Contact Info:</strong><br>
                <a href="mailto:<?php echo $_POST["email"]; ?>"><?php echo $_POST["email"]; ?></a></p>
            <p>Major: <?php echo $_POST["major"]; ?></p>
            <p>Comments: <?php echo $_POST["major"]; ?></p>
            <p>Countries Visited: </p>
            <ul><?php
            $country = $_POST["country"];
            echo "country is being listed: ".$country;
            var_dump($country);
                foreach ($country as $listItem){
                    echo "<li>".$listItem."</li>";
                    echo "worked";
                 } ?></ul>
            </div>

        </div>
<?php include "../footer.php"; ?>