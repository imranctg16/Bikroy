<?php
function show_all_user()
{
    $user_obj = new Users;
    $result = $user_obj->get_all_user();
    echo "<h3>Registered User For Testing </h3>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "User Name : = ".$row['user_name'] . "<br>";
        echo "User_Passward := ".$row['user_name'] . "<br>";

    }
}

?>


<?php
function show_reg_form()
{
    $name_error = "";
    $email_error = "";
    $passward_error = "";
    $user_name = "";
    $user_email = "";
    $user_passward = "";
    if (isset($_POST['reg_submit'])) {

        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_passward = $_POST['user_password'];
        /**
         * Validation for register_forn
         */
        if ($user_name == "" || $user_email == "" || $user_passward == "") {

            if ($user_name == '') {
                $name_error = "You Forgot to fill out Username field";
            }
            if ($user_email == '') {
                $email_error = "You Forgot to fill out Email field";
            }
            if ($user_passward == '') {
                $passward_error = "You Forgot to fill out passward field";
            }
        } else {
            $user_obj = new Users;
            $user_obj->create_user($user_name, $user_passward, $user_email);
            echo "USER successfully Created";
        }
    }
    ?>
    <div class="col-xs-12 col-xs-offset-3">
        <div class="form-wrap">
            <h1>Register</h1>
            <form role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="login-form" autocomplete="off">
                <div class="text-center text-danger"></div>
                <div class="form-group">
                    <?php if ($name_error != "") {
                        echo "<label for='user_name' class='text-center text-danger'>$name_error</label>";
                    }
                    ?>
                    <label for="user_name" class="sr-only">username</label>
                    <input type="text" name="user_name" value="<?php if ($user_name != '') echo $user_name; ?>"
                           id="username" class="form-control"
                           placeholder="Enter Desired Username">
                </div>
                <div class="form-group">
                    <?php if ($email_error != "") {
                        echo "<label for='user_name' class='text-center text-danger'>$email_error</label>";
                    }
                    ?>
                    <label for="user_email" class="sr-only">Email</label>
                    <input value="<?php if ($user_email != '') {
                        echo $user_email;
                    } ?>" type="email" name="user_email" id="email" class="form-control"
                           placeholder="somebody@example.com">
                </div>
                <div class="form-group">
                    <?php if ($passward_error != "") {
                        echo "<label for='user_name' class='text-center text-danger'>$passward_error</label>";
                    }
                    ?>
                    <label for="user_password" class="sr-only">Password</label>
                    <input value="<?php if ($user_passward != '') echo $user_passward; ?>" type="password"
                           name="user_password" id="key" class="form-control"
                           placeholder="Password">
                </div>
                <input type="submit" name="reg_submit" id="btn-login" class="btn btn-custom btn-lg btn-block"
                       value="Register">
            </form>
        </div>
    </div>
    <?php
}

?>



<?php
function user_login()
{

    echo "<div class='well '>";
    if (!isset($_SESSION['user_name'])) {

        if (isset($_POST['login_submit'])) {
            $user_email = $_POST['user_email'];
            $user_passward = $_POST['user_passward'];
            $user_obj = new Users;
            $user_obj->login_user($user_email, $user_passward);
        }
        ?>


        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
            <div class="form-group">
                <label for="user_email">Your Email</label>
                <input type="email" class="form-control" name="user_email" placeholder="Enter User Email">
            </div>
            <div class="form-group">
                <label for="user_passward">Your Passward</label>
                <input type="password" class="form-control" name="user_passward" placeholder="Enter Passward">
                <span class="input-group-btn">
                    <button name="login_submit" type="submit" class="btn btn-primary">Submit</button>
                </span>
            </div>
        </form>
        <!-- /Login -->

    <?php } else {
        echo "Expecting Some error Here ";
    }
}


?>


<?php
function user_logout()
{
    $_SESSION = array();
    setcookie(session_name(), '', time() - 3600);
    session_destroy();
    header('Location: login.php');
}
?>



<?php
function is_user_logged_in()
{
    if (isset($_SESSION['user_name'])) {
        return true;
    } else {
        return false;
    }
}
?>







<?php
function show_user_info($user_id)
{

    $user_obj = new Users;
    $division_obj = new Division;
    $blood_group_obj = new Blood_group;
    $data_obj = new Data;

    //from user table
    $user_table_data = $user_obj->get_user_data($user_id);

    //show_user_table_data

    echo "<div class='panel-group'>";

    echo "<div class='panel panel-primary'>";
    echo "<div class='panel-heading'>ACCOUNT INFO</div>";
    echo "<div class='panel-body'>";
    while ($row = mysqli_fetch_assoc($user_table_data)) {
        echo "<div class=well>";
        echo "<h3> <strong>User Name </strong> = " . $row['user_name'] . "</h3>";
        echo "<h3> <strong>ser Email : </strong> = " . $row['user_email'] . "</h3>";
        echo "<h3> <strong>Joined :</strong> = " . $row['user_joined'] . "</h3>";
        echo "</div>";
    }
    echo "</div>";

    echo "<div class='panel panel-primary'>";
    echo "<div class='panel-heading'>DONOR INFO</div>";
    if (is_a_donor($user_id)) {
        $rest_data = $data_obj->get_data_on_user($user_id);
        while ($row = mysqli_fetch_assoc($rest_data)) {
            $user_number = $row['user_number'];
            $user_blood_group_id = $row['blood_group_id'];
            $user_picture = $row['user_picture'];
            $last_donated = $row['last_donate'];
        }
        echo "<div class=well>";
        echo "<h3> <strong>Number</strong> = " . $user_number . "</h3>";
        echo "<h3> <strong>Blood Group</strong> = " . $blood_group_obj->get_blood_group_name($user_blood_group_id) . "</h3>";
        echo "<h3> <strong>Donor Image </strong> <img class='img-responsive' width='100' src='images/{$user_picture}'> </h3>";
        echo "<h3> <strong>last_donated</strong> = " . $last_donated . "</h3>";
        echo "</div>";
    }

    echo "</div>";
    echo "</div>";
}

?>

