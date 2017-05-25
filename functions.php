<?php
function show_all_user()
{
    $user_obj = new Users;
    $result = $user_obj->get_all_user();
    echo "<h3>Registered User For Testing </h3>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "User Name : = " . $row['user_name'] . "<br>";
        echo "User_Passward := " . $row['user_name'] . "<br>";

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

        <div class="col-lg-4 col-md-offset-3" style="border: dotted">
            <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                <div class="form-group">
                    <label for="user_email">Your Email</label>
                    <input type="email" class="form-control" name="user_email" placeholder="Enter User Email">
                </div>
                <div class="form-group">
                    <label for="user_passward">Your Passward</label>
                    <input type="password" class="form-control" name="user_passward" placeholder="Enter Passward">
                </div>
                <span class="input-group-btn">
                    <button name="login_submit" type="submit" class="btn btn-primary">Submit</button>
            </span>
            </form>
            <!-- /Login -->
        </div>

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






<?php
function show_post_form()
{
    ///class_variable
    $user_obj = new Users;
    $division_obj = new Division;
    $data_obj = new Data;
    $data_condition_obj = new Data_condition;
    $category_obj = new Category;
    $sub_category_obj = new Sub_category;

    ///error_variable
    $image_error = "";
    $data_tag_error = "";
    $data_price_error = "";
    $data_title_error="";
    $data_desc_error="";

    ///useful_variable
    $data_tag = "";
    $data_image = "";
    $data_price = "";
    $data_title = "";
    $data_desc = "";


    if (isset($_POST['get_option'])) {
        echo "at least the Ajax Call came ";

        $category_id = $_POST['get_option'];

        $result = $sub_category_obj->get_all_subcategory($category_id);

        while ($row = mysqli_fetch_assoc($result)) {
            // echo "<option>".$row['sub_cat_name'] ."</option>";
            echo "<option value='{$row['sub_cat_id']}'>{$row['sub_cat_name']}</option>";
        }
        exit();
    }

    if (isset($_POST['submit_adv'])) {
        $user_id = $_SESSION['user_id'];
        $user_name = $user_obj->get_user_name($user_id);
        $division_id = $_POST['division'];
        $category_id = $_POST['category'];
        $sub_category_id = $_POST['sub_category'];
        $data_tag = $_POST['data_tag'];
        $data_price = $_POST['data_price'];
        $data_title = $_POST['data_title'];
        $data_desc = $_POST['data_desc'];

        echo $user_id . " " . $division_id . " " . $category_id . " " . $sub_category_id;


        //ImageValidation ,source= w3school.com
        $target_dir = "images/";
        $data_image = $_FILES['data_image']['name'];
        $target_file = $target_dir . basename($data_image);
        $data_image_temp = "";
        if ($data_image) {
            $data_image_temp = $_FILES['data_image']['tmp_name'];
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        }

        if ($data_image_temp) {
            $check = getimagesize($data_image_temp);
            if ($check !== false) {
                //  echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                //echo "File is not an image.";
                $image_error .= "File is not an image.";
                $uploadOk = 0;
            }
            /*
                        if (file_exists($target_file)) {
                            //echo "Sorry, file already exists.";
                            $image_error .= "Sorry, file already exists.";
                            $uploadOk = 0;
                        }*/

            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $image_error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                //echo "Sorry, your file was not uploaded.";
                $image_error .= "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($data_image_temp, $target_file)) {
                    //echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";

                } else {
                    //echo "Sorry, there was an error uploading your file.";
                    $image_error = "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            $image_error = "No Image was Selected";
        }

        if ($data_tag_error == "" && $image_error == "" && $data_price_error == ""&& $data_desc_error == ""&& $data_title_error == "") {

            $success = $data_obj->save_data($user_id, $division_id, $category_id, $sub_category_id, $data_tag, $data_image, $data_price,$data_title,$data_desc);
            if ($success) {
                echo "Successfully Saved Data";
            } else {
                echo "Something Went Wrong in Saving data";
            }
        }
    }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <div class="form-group">
                <label for="division">Select A Division</label>
                <select name="division" id="">
                    <?php
                    $all_division = $division_obj->get_all_div();
                    echo "<option selected disabled>Choose here</option>";
                    while ($row = mysqli_fetch_assoc($all_division)) {
                        $division_name = $row['division_name'];
                        $division_id = $row['division_id'];
                        echo "<option value='{$division_id}'>$division_name</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="category">Select a Category </label>

                <select name="category" id="first-choice" onchange="fetch_select(this.value);">
                    <?php
                    $all_category = $category_obj->get_all_category();
                    echo "<option selected disabled>Choose From Above first </option>";
                    while ($row = mysqli_fetch_assoc($all_category)) {
                        $category_name = $row['cat_name'];
                        $category_id = $row['cat_id'];

                        echo "<option value='{$category_id}'>$category_name</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="sub_category">Select a Sub_category </label>
                <select name="sub_category" id="second-choice">
                    <option>Please choose from above</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <?php if ($image_error != "") {
                echo "<label  for='data_image' class='text-center text-danger'>$image_error</label>";
            } else {
                echo '<label for="data_image">Your image:</label>';
            }
            ?>
            <input class="form-control" name="data_image" type="file">
        </div>

        <!-- data_tag field -->
        <div class="form-group">
            <?php if ($data_tag_error != "") {
                echo "<label  for='data_tag' class='text-center text-danger'>$data_tag_error</label>";
            } else {
                echo '<label for="data_tag">Place Tag </label>';
            }
            ?>
            <input value="<?php if ($data_tag_error != '') echo $data_tag; ?>" class="form-control" name="data_tag"
                   type="text">
        </div>
        <!--data_title-->
        <div class="form-group">
            <?php if ($data_title_error != "") {
                echo "<label  for='data_title' class='text-center text-danger'>$data_title_error</label>";
            } else {
                echo '<label for="data_title">Title </label>';
            }
            ?>
            <input value="<?php if ($data_title_error != '') echo $data_title; ?>" class="form-control" name="data_title"
                   type="text">
        </div>

        <!--data_desc-->
        <div class="form-group">
            <?php if ($data_desc_error != "") {
                echo "<label  for='data_desc' class='text-center text-danger'>$data_desc_error</label>";
            } else {
                echo '<label for="data_desc">Description </label>';
            }
            ?>
            <input value="<?php if ($data_desc_error != '') echo $data_desc; ?>" class="form-control" name="data_desc"
                   type="text">
        </div>

        <!-- data_price field -->
        <div class="form-group">
            <?php if ($data_price_error != "") {
                echo "<label  for='data_price' class='text-center text-danger'>$data_price_error</label>";
            } else {
                echo '<label for="data_price">Asking Price </label>';
            }
            ?>
            <input value="<?php if ($data_tag_error != '') echo $data_price; ?>" class="form-control" name="data_price"
                   type="text">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="submit_adv" value="Done">
        </div>
    </form>

    <?php
}

?>


<?php

function show_all_category()
{
    $select_category_class = new Category();
    $select_category = $select_category_class->get_all_category();
    while ($row = mysqli_fetch_assoc($select_category)) { ?>
        <div style="border: dashed" class="col-md-3">
            <h2 class="text-center"><a
                        href="sub_category.php?Category_id=<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name']; ?></a>
            </h2>
            <p class="text-center"><?php echo $row['cat_description']; ?></p>
        </div>
    <?php }
} ?>


<?php

function show_all_subcategory($category_id)
{
    $sub_category_obj = new Sub_category();
    $result = $sub_category_obj->get_all_subcategory($category_id);

    echo "Total " . mysqli_num_rows($result) . "Sub-Category-found";
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <h3><a href=""><?php echo $row['sub_cat_name'] ?></a></h3>
    <?php }

}

?>

<?php
function show_data_of_category($cat_id)
{

    $data_obj = new Data;
    $result = $data_obj->get_data_of($cat_id);
    echo "Total " . mysqli_num_rows($result) . " Results found ";
    if(mysqli_num_rows($result)==0)
    {
        echo "No data Found";
        exit();
    }
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="card" style="width: 20rem;">
            <img class="card-img-top" width="300" src="images/<?php echo $row['data_picture'] ?> " alt=" ছবি যুক্ত করা হইনি ">
            <div class="card-block">
                <h4 class="card-title"> <?php echo $row['data_title'] ?></h4>
                <p class="card-text"><?php echo $row['data_desc'] ?></div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Price : <?php echo $row['data_price'] ?></li>
                <li class="list-group-item">Post By : <?php echo $row['user_id'] ?></li>
                <li class="list-group-item">Post Date :<?php echo  $row['data_date'] ?></li>
                <li class="list-group-item">tag: <?php echo $row['data_tag'] ?>  </li>
            </ul>
            <div class="card-block">
                <a href="#" class="card-link">View Details</a>
            </div>
        </div>
    <?php }
}

?>
