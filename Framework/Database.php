<?php

class Database {

    private $database_user;
    private $database_pass;
    private $database_host;
    private $database_link;

    public function __construct() {
        $this->database_user = "danilo";
        $this->database_pass = "DdkDcare5";
        $this->database_host = "db1.fonticon.store";
    }

    function changeUser($user) {
        $this->database_user = $user;
    }

    function changePass($pass) {
        $this->database_pass = $pass;
    }

    function changeHost($host) {
        $this->database_host = $host;
    }

    function changeAll($user, $pass, $host) {
        $this->database_user = $user;
        $this->database_pass = $pass;
        $this->database_host = $host;
    }

    function connect($dbName) {
        // Connect to MySQL
        $link = new mysqli(
                $this->database_host, $this->database_user, $this->database_pass, $dbName
        );
        if ($link->connect_errno) {
            die('Could not connect: ' . mysql_error());
        } else {
            $link->set_charset('utf8');
            $this->database_link = $link;
        }
    }

    function disconnect() {
        if (isset($this->database_link))
            mysqli_close($this->database_link);
        else
            mysqli_close();
    }

    function isConnected() {
        return isset($this->database_link);
    }

    function query($qry) {
        if (!isConnected()) $this->connect();
        $temp = $this->database_link-> mysqli_query($qry) or die("Error: " . mysql_error());
    }

}
