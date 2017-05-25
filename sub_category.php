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
            $sub_cat_name = "";
            if (isset($_GET['sub_cat_id'])) {
                $sub_cat_obj = new Sub_category;
                $id = $_GET['sub_cat_id'];
                $result = $sub_cat_obj->get_sub_cat_name($id);
                $row = mysqli_fetch_assoc($result);
                $sub_cat_name = $row['sub_cat_name'];
            }
            if (isset($_GET['Category_id'])) {

                $cat_obj = new Category;
                $category_id = $_GET['Category_id'];
                $_SESSION['category_id']=$category_id;
                $result = $cat_obj->get_category_name($category_id);
                $result = mysqli_fetch_assoc($result);
                $category_name = $result['cat_name'];
                echo $category_id;
                $_SESSION['category_name']=$category_name;
                ?>
            <?php } ?>
            <div class="well">
                <h4>Side Widget Well</h4>
                <div class="row">
                    <?php
                    show_all_subcategory($_SESSION['category_id']);
                    ?>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <h1 class="page-header">
                বেচাকেনার সময় নিরাপদ থাকুন!
            </h1>
            <h2> Category - <?php echo $_SESSION['category_name'] ?> </h2>
            <h2> Sub-Category -
                <?php if (empty($sub_cat_name))
                {
                    echo "ALL";
                }
                else
                {
                echo $sub_cat_name;
                } ?> </h2>
            <?php
                if(!empty($sub_cat_name))
                {
                    show_data_of_sub_category($id);
                }
                else
                {
                    show_data_of_category($_SESSION['category_id']);
                }
            ?>
        </div>

    </div>
    <!-- Footer Part -->
    <?php
    include 'Basic_structure/footer.php';
    ?>
</div>
<!-- /.container -->

</body>

