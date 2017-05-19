<!--Header Part-->

<?php
include_once 'Basic_structure/header.php'
?>

<!--##############################################-->
<!-- Code Part -->

<body>
<?php
include 'Basic_structure/navbar.php';
?>

<body>
<!-- Page Content -->

<div class="container-fluid">

    <div class="well col-md-12 col-md-offset-0">

        <?php
        if (is_user_logged_in()) {

                 show_all_user();

        } else {
            echo "You Have to <a href='login.php'>Login</a> Or <a href='registration.php'>register</a> To use <strong>Bikroy.com </strong>";
        }
        ?>
    </div>

</div>
<!-- /.container -->
</body>


<!--##############################################-->
<!-- Footer Part -->
<?php
include_once 'Basic_structure/footer.php'
?>



