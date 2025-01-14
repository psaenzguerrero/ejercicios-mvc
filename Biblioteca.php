<!-- MODELO -->
<?php
require_once 'BaseDatos.php';

class Biblioteca {
    private $db;

    public function __construct() {
        $baseDatos = new BaseDatos();
        $this->db = $baseDatos->conectar();
    }

    // Obtener todos los libros junto con el nombre del autor
    public function obtenerLibros() {
        $stmt = $this->db->prepare(
            'SELECT libros.id, libros.titulo, autores.nombre AS autor, libros.estado 
             FROM libros 
             INNER JOIN autores ON libros.autor = autores.id'
        );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Agregar un nuevo libro
    public function agregarLibro($titulo, $autor, $estado = 1) {
        $stmt = $this->db->prepare('INSERT INTO libros (titulo, autor, estado) VALUES (?, ?, ?)');
        $stmt->execute([$titulo, $autor, $estado]);
    }

    // Borrar un libro por su ID
    public function borrarLibro($id) {
        $stmt = $this->db->prepare('DELETE FROM libros WHERE id = ?');
        $stmt->execute([$id]);
    }

    // Actualizar el estado de un libro
    public function actualizarEstado($id, $estado) {
        $stmt = $this->db->prepare('UPDATE libros SET estado = ? WHERE id = ?');
        $stmt->execute([$estado, $id]);
    }

    // Obtener todos los autores
    public function obtenerAutores() {
        $stmt = $this->db->prepare('SELECT * FROM autores');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Agregar un nuevo autor
    public function agregarAutor($nombre) {
        $stmt = $this->db->prepare('INSERT INTO autores (nombre) VALUES (?)');
        $stmt->execute([$nombre]);
    }
}