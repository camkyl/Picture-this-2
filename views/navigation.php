<nav>
    <img src="/assets/images/favicon.png" alt="The Picture This image">

    <ul class="menu">
        <li>
            <a href="/index.php">Home</a>
        </li>

        <li>
            <a href="/about.php">About</a>
        </li>

        <li>
            <!-- Sign up page needs to be made -->
            <a href="/about.php">Sign Up</a>
        </li>

        <?php if (isset($_SESSION["user"])) : ?>

            <li>
                <a class="login" href="app/users/logout.php">Logout</a>
            </li>

        <?php else : ?>
            <li>
                <a class="login" href="/login.php">Login</a>
            </li>
        <?php endif; ?>


    </ul>
</nav>