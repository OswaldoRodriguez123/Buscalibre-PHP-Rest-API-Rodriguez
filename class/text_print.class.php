<?php

include_once '../config/database.php';

class TextPrint
{

    // Connection
    private $conn;

    // Table
    private $db_table = "texto_imprimir";

    // Columns
    public $id;
    public $letra;
    public $texto;
    public $fecha;

    // Db connection
    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->conn = $db;
    }

    // GET DATA
    public function getTextPrint()
    {
        $sqlQuery = "SELECT id, letra, texto, fecha FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
}
