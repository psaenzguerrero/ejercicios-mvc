<?php
    class db{
        private $conn;

        public function __construct(){
            require_once('../../cred.php');
            $this->conn =  new mysqli("localhost",USU_CONN,PSW_CONN,"biblioteca");
        }

        public function seleccionarLibro(){
            $sentencia = "SELECT * FROM libro";
            $consulta = $this->conn->prepare($sentencia);
            $consulta->bind_result($id, $nom, $autor, $estado);
            $consulta->execute();
            
            $existe = [];

            while ($consulta->fetch()) {
                $existe["id"]=$id;
                $existe["nom"]=$nom;
                $existe["autor"]=$autor;
                $existe["estado"]=$estado;
            }
            $consulta->close();
            
            return $existe;
        }

    }
?>