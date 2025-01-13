<?php
     require_once('./clas.db.php');

     class libro{
        private $id;
        private $nombre;
        private $autor;
        private $estado;
        private $conn;

        public function __construct($conn,$id,$nombre,$autor,$estado){
            $this->conn = $conn;
            $this->id =$id;
            $this->nombre =$nombre;
            $this->autor = $autor;
            $this->estado = $estado;
        }

        public function crearFila($id,$nombre,$autor,$estado){
            echo 
            "<tr>
                <td>$id</td>
                <td>$nombre</td>
                <td>$autor</td>
                <td>$estado</td>
            </tr>";
        }
     }

?>