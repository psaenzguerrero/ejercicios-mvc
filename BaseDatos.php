<!-- CONEXION A BASE DE DATOS -->
<?php
require_once('../../cred.php');

class BaseDatos {
    private $host = 'localhost';
    private $dbname = 'biblioteca';

    public function conectar() {
        try {
            // Crear una nueva conexión PDO
            $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", USU_CONN, PSW_CONN);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores
            return $pdo;
        } catch (PDOException $e) {
            die("Error al conectar con la base de datos: " . $e->getMessage());
        }
    }
}
