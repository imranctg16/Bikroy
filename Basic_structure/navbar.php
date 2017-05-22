<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./index.php">Home</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div>
            <ul class="nav navbar-nav">
                <li><a href="#">Admin</a></li>
                <li><a href="./registration.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
            </ul>
            <?php
            if (is_user_logged_in()) {
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href=""><span class="glyphicon glyphicon-user"></span>Profile</a></li>

                    <li><a href="./logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
                </ul>
            <?php } else { ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="./login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
                </ul>
            <?php } ?>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>