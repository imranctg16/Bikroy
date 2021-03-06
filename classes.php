<?php
include "functions.php";
?>


<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 5/4/2017
 * Time: 9:06 AM
 */

/**
 * Class Connection
 *return : Connection object
 */


class Connection
{
    public $mysqli;
    protected $host, $root, $pass, $db_name;

    function __construct()
    {
        $this->host = "localhost";
        $this->root = "root";
        $this->pass = "";
        $this->db_name = "bikroy";
        $this->mysqli = new mysqli($this->host, $this->root, $this->pass, $this->db_name);
        mysqli_query($this->mysqli,'SET CHARACTER SET utf8');
        mysqli_query($this->mysqli,"SET SESSION collation_connection ='utf8_general_ci'");
        if ($this->mysqli) {
            //echo "Connectected to " . $this->db_name . "<br>";
        } else {
            die("Connection Failed " . mysqli_error($this->mysqli));
        }

    }
}

class Users
{
    public $connection;

    function __construct()
    {
        $this->connection = new Connection;
    }

    public function create_user($user_name, $user_pass, $user_email)
    {
        $sql = "INSERT INTO users(user_name,user_pass,user_email,user_joined)";
        $sql .= "VALUES('$user_name','$user_pass','$user_email',now())";
        //$result=mysqli_query($this->connection,$sql);
        //confirm_query($result,$this->connection);
        $result = $this->connection->mysqli->query($sql);
        if (!$result) {
            mysqli_error($this->connection->mysqli);
        }
    }

    public function login_user($form_email, $form_passward)
    {
        $db_email = "";
        $db_passward = "";
        $db_user_name = "";
        $db_user_id = null;

        echo "debug:form==>" . $form_email . " Pass= " . $form_passward . "<br>";

        $sql = "SELECT * FROM Users WHERE user_email='{$form_email}'AND user_pass='{$form_passward}'";
        $result = $this->connection->mysqli->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $db_email = $row['user_email'];
            $db_passward = $row['user_pass'];
            $db_user_name = $row['user_name'];
            $db_user_id = $row['user_id'];
        }
        echo "debug:db== id= > " . $db_user_id . " mail= " . $db_email . " " . $db_passward . "<br>";

        if ($db_email == "" or $db_passward == "") {
            echo "<h3 class='text-danger'>Your Information Did not match </h3>";
            return;
        }
        if ($db_email == $form_email && $db_passward == $form_passward) {
            echo "<h3 class='text-success'>You Are Now Logged In</h3>";
            //setcookie('user_name',"{$db_user_name}",time()+(60*60*24*30));
            //setcookie('user_id',"{$db_user_id}",time()+(60*60*24*30));
            $_SESSION['user_name'] = $db_user_name;
            $_SESSION['user_id'] = $db_user_id;
            echo "<h3>Welcome " . $_SESSION['user_name'] . "</h3>";
            header('Location: login.php ');

        } else {
            echo "<h3 class='text-danger'>Your Information Did not match </h3>";
        }
    }

    public function get_user_name($user_id)
    {
       // echo "logged in id= " . $user_id;
        $sql = "SELECT * FROM users WHERE user_id=$user_id";
        $result = $this->connection->mysqli->query($sql);
        if (!$result) {
            die("Users query Failed " . mysqli_error($this->connection->mysqli));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $user_name = $row['user_name'];
                //echo  $user_name;
                return $user_name;
            }

        }
    }

    public  function  get_user_data($user_id)
    {
        $sql = "SELECT * FROM users WHERE user_id=$user_id";
        $result = $this->connection->mysqli->query($sql);
        if (!$result) {
            die("Users query Failed " . mysqli_error($this->connection->mysqli));
        } else {

                return $result;
        }
    }
    public function get_all_user()
    {
        $sql = "SELECT * FROM Users";
        $result = $this->connection->mysqli->query($sql);
        if (!$result) {
            die("Users query Failed " . mysqli_error($this->connection->mysqli));
        } else {

            return $result;
        }


    }
}

class Division
{
    public $connection;
    function __construct()
    {
        $this->connection = new Connection;
    }
    public function get_all_div()
    {
        $sql = "SELECT * FROM Division";
        $result = $this->connection->mysqli->query($sql);
        if (!$result) {
            die("Division query Failed " . mysqli_error($this->connection->mysqli));
        } else {
            return $result;
        }
    }
    public function get_division_name($division_id)
    {
        $sql = "SELECT * FROM division WHERE division_id='{$division_id}'";
        $result = $this->connection->mysqli->query($sql);
        if (!$result) {
            die("Division query Failed " . mysqli_error($this->connection->mysqli));
        } else {
            $row = mysqli_fetch_array($result);
            $division_name = $row['division_name'];
            return $division_name;
        }
    }
}
class Category
{
    public $connection;
    function __construct()
    {
        $this->connection = new Connection;
    }

    public function get_all_category()
    {
        $sql = "SELECT * FROM category";
        $result = $this->connection->mysqli->query($sql);
        if (!$result) {
            die("Category  query Failed " . mysqli_error($this->connection->mysqli));
        } else {
            return $result;
        }
    }
    public function get_category_name($category_id)
    {
        $sql = "SELECT * FROM category WHERE cat_id=$category_id";
        $result = $this->connection->mysqli->query($sql);
        if (!$result) {
            die("Category  query Failed " . mysqli_error($this->connection->mysqli));
        } else {
            return $result;
        }
    }
}
class Sub_category
{
    public $connection;
    function __construct()
    {
        $this->connection = new Connection;
    }
    public function  get_all_subcategory($category_id)
    {
        $sql = "SELECT * FROM sub_category WHERE cat_id=$category_id";

        $result = $this->connection->mysqli->query($sql);
        if (!$result) {
            die("Division query Failed " . mysqli_error($this->connection->mysqli));
        } else {
            return $result;
        }
    }
    public function get_sub_cat_name($id)
    {
        $sql = "SELECT * FROM sub_category WHERE sub_cat_id=$id";
        $result = $this->connection->mysqli->query($sql);
        if (!$result) {
            die("Division query Failed " . mysqli_error($this->connection->mysqli));
        } else {
            return $result;
        }
    }


}
class Data_condition
{
    public $connection;
    function __construct()
    {
        $this->connection = new Connection;
    }


}

class Data
{
    public $connection;
    function __construct()
    {
        $this->connection = new Connection;
    }

    function save_data($user_id,$division_id,$cat_id,$sub_cat_id,$data_tag,$data_image,$data_price,$data_title,$data_desc)
    {
        $query = "INSERT INTO data(user_id,division_id,cat_id,sub_cat_id,data_tag,data_picture,data_price,data_date,data_title,data_desc)";
        $query .= " VALUES($user_id,$division_id,$cat_id,$sub_cat_id,'{$data_tag}','{$data_image}','{$data_price}', now(),'{$data_title}','{$data_desc}')";
        $result = $this->connection->mysqli->query($query);
        if (!$result) {
            die("Division query Failed " . mysqli_error($this->connection->mysqli));
        } else {
            return $result;
        }
    }
    function get_data_of($cat_id)
    {
        $sql = "SELECT * FROM data WHERE cat_id=$cat_id";
        $result = $this->connection->mysqli->query($sql);
        if (!$result) {
            die("Division query Failed " . mysqli_error($this->connection->mysqli));
        } else {
            return $result;
        }
    }
    function get_data_of_sub($sub_cat_id)
    {
        $sql = "SELECT * FROM data WHERE sub_cat_id=$sub_cat_id";
        $result = $this->connection->mysqli->query($sql);
        if (!$result) {
            die("Division query Failed " . mysqli_error($this->connection->mysqli));
        } else {
            return $result;
        }


    }
}




?>
