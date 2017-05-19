<nav class="navbar navbar-inverse ">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <div class="navbar-brand" href="#"> Bikroy.Com </div>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <

            <ul class="nav navbar-nav">
                <li><a href="./index.php">Home</a></li>
                <li><a href="#">Admin</a></li>
                <li><a href="./registration.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
            </ul>
                <?php
                if (is_user_logged_in()){
                    ?>
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href=""><span class="glyphicon glyphicon-user"></span>Profile</a></li>

                    <li><a href="./logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
                <?php } else { ?>
                    <li><a href="./login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
                    </ul>
                <?php } ?>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
