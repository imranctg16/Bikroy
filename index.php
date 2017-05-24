<?php include "basic_structure/header.php"; ?>

<!-- Navigation -->
<?php include "basic_structure/navbar.php"; ?>

<!-- Page Content -->
<div class="container">

    <!-- Blog Sidebar Widgets Column -->
    <div class="row">
        <div style="border: dashed" class="col-lg-3">
            <?php include "Basic_structure/sidebar.php"; ?>
        </div>
        <div class="col-lg-8">
            <h1 class="page-header">
                বেচাকেনার সময় নিরাপদ থাকুন!
            </h1>
            <?php
            show_all_category()
            ?>
        </div>

    </div>
    <hr>
</div>
<!-- Footer -->
<?php include "basic_structure/footer.php"; ?>
