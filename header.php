<header>
    <img src="img/e3tLogo.png" alt="E3T_logo">
    <nav>
        <ul>
            <li><a href="browseTalents.php">BROWSE TALENTS</a></li>
            <li><a href="browseCategories.php">EVENTS</a></li>
            <?php
                if(isset($_SESSION['login']) AND $_SESSION['login'] == 'loged'){
                    echo"<li><a href = 'li-profile.php'>PROFILE</a></li>";
                }
                else{
                    echo"<li><a href = 'login2.php'>LOGIN</a></li>";
                }
            ?>
        </ul>
    </nav>
</header>