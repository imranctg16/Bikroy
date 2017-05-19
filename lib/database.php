<?php

class Database
{

    public $host = DB_HOST;
    public $user = DB_USER;
    public $password = DB_PASS;
    public $databaseName = DB_NAME;
    public $connection;
    public $error;

    public function __construct()
    {
        $this->connectDB();
    }

    private function connectDB()
    {
        $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->databaseName);
        if (!$this->connection) {
            die('Connection Fail' . mysqli_error($this->connection));
        }
    }

    //select or read

    public function select($query)
    {
        $result = mysqli_query($this->connection, $query);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            die('Query Problem' . mysqli_error($this->connection));
        }
    }

    //insert data

    public function insert($query)
    {
        $insertRow = mysqli_query($this->connection, $query);

        if ($insertRow) {
            session_start();
            $_SESSION['message'] = "Data inserted successfully";
            header('Location: index.php');
        } else {
            die('Query Problem' . mysqli_error($this->connection));
        }
    }

    //update data

    public function update($query)
    {
        $updateRow = mysqli_query($this->connection, $query);

        if ($updateRow) {
            session_start();
            $_SESSION['message'] = "Data updated successfully";
            header('Location: index.php');
        } else {
            die('Query Problem' . mysqli_error($this->connection));
        }
    }

    //delete data

    public function delete($query)
    {
        $deleteRow = mysqli_query($this->connection, $query);

        if ($deleteRow) {
            $message = "Data deleted successfully";
            return $message;
        }
    }

}
