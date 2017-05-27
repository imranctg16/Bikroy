<?php include "basic_structure/header.php"; ?>

<!-- Navigation -->
<?php include "basic_structure/navbar.php"; ?>

<!-- Page Content -->
<div class="container">

    <!-- Blog Sidebar Widgets Column -->
    <div class="w3-row">
        <div class="w3-col m8 l8">
            <h1 class="page-header">
                বেচাকেনার সময় নিরাপদ থাকুন!
            </h1>
            <?php
            show_all_category()
            ?>
        </div>
        <div style="border: dashed" class="w3-col m4 l4" >
            <?php include "Basic_structure/sidebar.php"; ?>
        </div>

    </div>
    <hr>
</div>
<!-- Footer -->
<?php include "basic_structure/footer.php"; ?>
