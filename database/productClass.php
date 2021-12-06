<?php 
Class Database
{
    private $user ;
    private $host;
    private $pass ;
    private $db;

    public function __construct()
    {
        $this->user = "root";
        $this->host = "localhost";
        $this->pass = "";
        $this->db = "dangotypesdb";
    }
    public function connect()
    {
        $link = mysqli_connect($this->user, $this->host, $this->pass, $this->db);
        return $link;
    }
}


