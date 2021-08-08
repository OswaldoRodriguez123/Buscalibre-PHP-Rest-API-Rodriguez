<?php
class Database
{
    private $host;
    private $dbname;
    private $username;
    private $password;

    public $conn;

    function __construct()
    {
        $ini = parse_ini_file('config.ini');

        $this->host = $ini['db_host'];
        $this->dbname = $ini['db_name'];
        $this->username = $ini['db_user'];
        $this->password = $ini['db_password'];
    }

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
