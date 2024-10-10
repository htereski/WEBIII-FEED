<?php
class Database
{
    private $host = 'localhost';
    private $dbname = 'posts';
    private $username = 'root';
    private $password = '';
    private $connection;

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
