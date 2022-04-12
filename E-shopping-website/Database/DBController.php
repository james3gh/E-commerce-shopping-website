<?php

class DBController
{
    //databases connection Properties
    protected $host = "localhost";
    protected $user = "root";
    protected $password = "";
    protected $database = "shopping";

    //connection Property
    public $con = null;

    //call constructor
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($this->con->connect_error) {
            echo "Failed to connect to DB".$this->con->connect_error;
        }
    }

    public function __destruct()
    {
        $this->closeConnection();
    }
    
    //mysql closing connection
    protected function closeConnection()
    {
        if ($this->con!=null) {
            $this->con->close();
            $this->con=null;
        }
    }
}
