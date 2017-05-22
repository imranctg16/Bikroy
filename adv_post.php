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

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>


<script type="text/javascript">

    function fetch_select(val)
    {
        $.ajax({
            type: 'post',
            url: 'adv_post.php',
            data: {
                get_option:val
            },
            success: function (response) {
                document.getElementById("second-choice").innerHTML=response;
            }
        });
    }

</script>


<!-- Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <title>Welcome To Bikroy.Com</title>

            <?php
            show_post_form()
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
