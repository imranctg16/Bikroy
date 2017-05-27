<div class="w3-sidebar w3-bar-block w3-card-2 w3-animate-left " style="display:none;border: solid 2px"
     id="mySidebar">
    <button class="w3-bar-item w3-button w3-large"
            onclick="w3_close()">Close &times;
    </button>
    <a href="./index.php" class="w3-bar-item w3-button  w3-hover-blue">Home </a>
    <a href="#" class="w3-bar-item w3-button  w3-hover-blue">Admin</a>
    <?php
    if (is_user_logged_in()) {
        echo '<a href="./adv_post.php" class="w3-bar-item w3-button w3-hover-blue">SELL</a>';
        echo '<a href="" class="w3-bar-item w3-button w3-hover-blue" >Profile</a>';
        echo '<a href="./logout.php" class="w3-bar-item w3-button w3-hover-blue" >Logout</a>';
    } else {
        echo '<a href="./registration.php" class="w3-bar-item w3-button w3-hover-blue">Sign Up</a>';
        echo '<a href="./login.php" class="w3-bar-item w3-button w3-hover-blue">Login</a>';
    }
    ?>
    <a href="./contact.php" class="w3-bar-item w3-button  w3-hover-blue">Contact Us</a>
</div>

<div zclass="w3-main" id="main">
    <div class="w3-white" style="margin-top: -10px">
        <button class="w3-button w3-red w3-xlarge" onclick="w3_open()">&#9776;</button>
        <div class="w3-container w3-blue">
            <h1 style="font-family:Georgia">Bikroy.Com</h1>
        </div>
    </div>

    <script>
        function w3_open() {
            document.getElementById("main").style.marginLeft = "25%";
            document.getElementById("mySidebar").style.width = "25%";
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("openNav").style.display = 'none';
        }
        function w3_close() {
            document.getElementById("main").style.marginLeft = "0%";
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("openNav").style.display = "inline-block";
        }
    </script>