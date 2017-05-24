<!--Header Part-->
<?php
include 'Basic_structure/header.php';
?>

<!--##############################################-->
<!-- Code Part -->

<body>
<?php
include 'Basic_structure/navbar.php';
?>


<!-- Page Content -->
<div class="container">

    <div class="container-fluid">
        <div style="border: dashed" class="col-lg-3">
            <?php include "Basic_structure/sidebar.php"; ?>
            <?php
            if (isset($_GET['Category_id'])) {

                $category_id = $_GET['Category_id'];
                echo $category_id;
                ?>
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <div class="row">
                        <?php
                        show_all_subcategory($category_id);
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-lg-8">
            <h1 class="page-header">
                বেচাকেনার সময় নিরাপদ থাকুন!
            </h1>
            <h4>Ei category er latest post gula show korano hobe </h4>
        </div>

    </div>
    <!-- Footer Part -->
    <?php
    include 'Basic_structure/footer.php';
    ?>
</div>
<!-- /.container -->

</body>

