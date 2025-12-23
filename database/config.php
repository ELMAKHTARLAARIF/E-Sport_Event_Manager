<?php
class connect
{
    private $host;
    private $db_name;
    private $username;
    private $password;

    public function __construct($host, $database_name, $username, $password)
    {
        $this->host = $host;
        $this->db_name = $database_name;
        $this->username = $username;
        $this->password = $password;
    }

    public function getConnection()
    {
        return mysqli_connect($this->host, $this->username, $this->db_name, $this->password);
    }
}
