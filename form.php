<?php
require "header.php"

    ?>


<main>
    <div class="wrapper-main">
        <section class="section-default">
            <h1>Signup</h1>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="user">
                <input type="password" name="pass">
                <input type="rpassword" name="rpass">
                <button type="submit" name="signup-submit">Signup</button>
            </form>
            <a href="login.php"> Signup</a>
            <form action="includes/logout.inc.php" method="post">
                <button type="submit" name="logout-submit">Logout</button>
            </form>
        </section>
    </div>

</main>

<?php
require "footer.php"

    ?>