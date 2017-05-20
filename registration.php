<!--Header Part-->
<?php
include 'Basic_structure/header.php'
?>

<!--##############################################-->
<!-- Code Part -->

<body>
<?php
include 'Basic_structure/navbar.php';
?>


<!-- Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <title> Post What You Want to sell </title>
            <?php
                show_post_form();
            ?>

        </div>

    </div>
</div>
<!-- /.container -->
</body>

<!--##############################################-->

<!-- Footer Part -->
<?php
include 'Basic_structure/footer.php';
?>

