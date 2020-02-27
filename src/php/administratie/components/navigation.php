<div class="navbar-fixed">
    <nav class="col s8 offset-s4">
        <div class="nav-wrapper teal">
            <a href="#" class="brand-logo center"></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Account<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </div>
        <ul id="slide-out" class="sidenav sidenav-fixed -4 ">
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
            <li class="<?php if ($_COOKIE['page'] == 'home') {
                            echo 'teal';
                        }; ?>"><a href="home.php" class="">Dashboard</a></li>
            <li class="<?php if ($_COOKIE['page'] == 'projecten') {
                            echo 'teal';
                        }; ?>"><a href="projecten.php">Projecten</a></li>
            <li class="<?php if ($_COOKIE['page'] == 'deelnemers') {
                            echo 'teal';
                        }; ?>"><a href="deelnemers.php" class="">Deelnemers</a></li>
        </ul>
    </nav>
</div>