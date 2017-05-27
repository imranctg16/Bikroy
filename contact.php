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
        <div class="row">
            <div class="col-lg-8">
                <!-- /.container -->
                <form action="/action_page.php" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
                    <h2 class="w3-center">Contact Us</h2>

                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border" name="first" type="text" placeholder="First Name">
                        </div>
                    </div>

                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border" name="last" type="text" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border" name="email" type="text" placeholder="Email">
                        </div>
                    </div>

                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone"></i></div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border" name="phone" type="text" placeholder="Phone">
                        </div>
                    </div>

                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border" name="message" type="text" placeholder="Message">
                        </div>
                    </div>

                    <button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Send</button>

                </form>


            </div>

        </div>
    </div>
    <!-- Footer Part -->
    <?php
    include 'Basic_structure/footer.php';
    ?>
</div>
<!-- /.container -->

</body>


