<?php
class Conexion
{
    private $host = 'localhost';
    private $database = 'neoranking';
    private $username = 'root';
    private $password = '';
    function ejecutar($stmn)
    {
        $mysqli = new mysqli($this->host, $this->username, $this->password, $this->database);
        return $mysqli->query($stmn);
    }
}
?>