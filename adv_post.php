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
                console.log("ajax called ");
                document.getElementById("second-choice").innerHTML=response;

            }
        });
    }

</script>


<!-- Page Content -->
<div class="row">
    <div class="col-lg-8 col-md-offset-3">
        <title> Post What You Want to sell </title>
        <?php
             show_post_form();
        ?>
    </div>
</div>
<!-- /.container -->
</body>

<!--##############################################-->

<!-- Footer Part -->
<?php
include 'Basic_structure/footer.php';
?>

