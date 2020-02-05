<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>

    <!-- local resources -->

    <link type="text/css" rel="stylesheet" href="src/lib/css/main.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="src/lib/materialize/css/materialize.min.css" media="screen,projection" />

    <!-- external libraries -->
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->

</head>

<body>
    <div class="row" id="wrapper">
        <div class="col s8 teal" id="col-left">
        </div>
        <div class="col s4">
            <form class="col s10 offset-s1" action="src/php/login/login.php" method=" post">
                <div class="input-field col s12">
                    <input placeholder="Enter Username" id="user_name" name="user_name" type="text" class="validate" required>
                    <label for="user_name">username</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Enter Password" id="password" name="password" type="password" class="validate" required>
                    <label for="password">Last Name</label>
                </div>
                <div class="switch">
                    <label>
                        <input type="checkbox">
                        <span class="lever"></span>
                        Remember me
                    </label>
                </div>
                <button class="btn waves-effect waves-light col s12" id="submit" type="submit" name="action">Log In
                    <i class="material-icons right">send</i>
                </button>
        </div>
        </form>
    </div>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="src/lib/js/main.js"></script>
    <script type="text/javascript" src="src/lib/materialize/js/materialize.min.js"></script>
</body>

</html>