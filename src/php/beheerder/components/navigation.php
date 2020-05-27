<div class="navbar-fixed">
    <nav class="col s8 offset-s4">
        <div class="nav-wrapper primary">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <a href="#" class="brand-logo center"><?php echo $_COOKIE['page'] ?></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Account<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </div>
        <ul id="dropdown1" class="dropdown-content">
            <li>
                <a href="#">Profiel</a>
            </li>
            <li>
                <a href="../scripts/logout.php">Uitloggen</a>
            </li>
        </ul>
        <ul id="slide-out" class="sidenav dark-2 sidenav-fixed -4 ">
            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="../../lib/images/office.jpg">
                    </div>
                    <a href="#user"><img class="white-text circle" src="../../lib/images/yuna.jpg"></a>
                    <a href="#name"><span class="white-text name"><?php echo $_SESSION['user']; ?></span></a>
                    <a href="#email"><span class="white-text email">test@gmail.com</span></a>
                </div>
            </li>
            <li class="<?php if ($_COOKIE['page'] == 'Grafieken Overzicht') {
                            echo 'primary';
                        }; ?>"><a href="home.php" class="white-text">Grafieken </a></li>
            <li class="<?php if ($_COOKIE['page'] == 'Grafieken Overzicht') {
                            echo 'primary';
                        }; ?>"><a href="projecten.php" class="white-text">Projecten</a></li>
            <li class="<?php if ($_COOKIE['page'] == 'Projecten Overzicht') {
                            echo 'primary';
                        }; ?>"><a href="deelnemers.php" class="white-text">Deelnemers </a></li>
            <li class="<?php if ($_COOKIE['page'] == 'Deelnemers Overzicht') {
                            echo 'primary';
                        }; ?>"><a href="gebruikers.php" class="white-text">Gebruikers</a></li>
            <li class="<?php if ($_COOKIE['page'] == 'Gebruikers Overzicht') {
                            echo 'primary';
                        }; ?>">
        </ul>
    </nav>
</div>