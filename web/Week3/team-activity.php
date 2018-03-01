<!--
     STRETCH CHALLENGES

     After finishing the core requirements, ensure that everyone is at that point and understands the material. When everyone has completed the core requirements, you can move on to these stretch challenges.

     Change your HTML form to also be PHP script. For the majors, instead of hardcoding each of the options, instead, create a PHP array (or something similar...) that contains each of the desired majors and its abbreviation. Then, loop over this array to generate radio buttons for the different majors.

     For the places you have been, set the value to be some kind of id or code (e.g., "na" instead of "North America"). Then, in your PHP form handler (i.e., the results page), create a map/dictionary that you can use to convert from the id to the text you want to display. When looping through the values to display them, look them up in your map to get the display text.

     Deploy your pages to one of your servers and ensure that it works correctly there.

/-->
<?php include "../header-working.php"; ?>
        <div class="main-content">
            <form action="contact-form.php" method="post">
                 <p>Name: </p><input type="text" name="name"><br>
                 <p>Email: </p><input type="text" name="email"><br>
                 <p>Major: </p><br>
                    <input type="radio" name="major" value="Computer Science">Computer Science<br><br>
                    <input type="radio" name="major" value="Web Design and Development">Web Design and Development<br><br>
                    <input type="radio" name="major" value="Computer Information Technology">Computer information Technology<br><br>
                    <input type="radio" name="major" value="Computer Engineering">Computer Engineering<br><br>
                 <p>Comments: </p><input type="text-area" name="comments"><br><br>
                 <p>Have you visited any of the following countries?</p>
                    <input type="checkbox" name="country" value="North America">North America<br>
                    <input type="checkbox" name="country" value="South America">South America<br>
                    <input type="checkbox" name="country" value="Europe">Europe<br>
                    <input type="checkbox" name="country" value="Asia">Asia<br>
                    <input type="checkbox" name="country" value="Australia">Australia<br>
                    <input type="checkbox" name="country" value="Africa">Africa<br>
                    <input type="checkbox" name="country" value="Antarctica">Antarctica<br>

                 <input type="submit">
            </form>
            <div></div>
        </div>
<?php include "../footer.php"; ?>