<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <h2>
                <a href="#">Blog Post Title</a>
            </h2>
            <p class="lead">
                by <a href="index.php">Start Bootstrap</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus
                inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum
                officiis rerum.</p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <!-- Second Blog Post -->

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "sidebar.php"; ?>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    বেচাকেনার সময় নিরাপদ থাকুন!
                </h1>
            </div>

            <?php
            $select_category_class = new Category();
            $select_category = $select_category_class->get_all_category();

            while ($row = mysqli_fetch_assoc($select_category)) { ?>
                <div class="col-md-4">
                    <h2 class="text-center"><?php echo $row['cat_name']; ?></h2>
                    <p><?php echo $row['cat_description']; ?></p>
                </div>
            <?php }
            ?>
        </div>

    </div>
    <!-- /.row -->

    <hr>