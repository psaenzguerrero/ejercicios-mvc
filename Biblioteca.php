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
        $query = 'SELECT libros.id, libros.titulo, autores.nombre AS autor, libros.estado 
                  FROM libros 
                  INNER JOIN autores ON libros.autor = autores.id';
        $result = $this->db->query($query); // Ejecutamos la consulta directamente

        $libros = [];
        while ($row = $result->fetch_assoc()) { // Fetch asociativo
            $libros[] = $row;
        }
        
        return $libros;
    }

    // Agregar un nuevo libro
    public function agregarLibro($titulo, $autor, $estado = 1) {
        $query = 'INSERT INTO libros (titulo, autor, estado) VALUES (?, ?, ?)';

        $stmt = $this->db->prepare($query); // Preparar la consulta
        $stmt->bind_param('ssi', $titulo, $autor, $estado); // Vinculamos los parámetros
        $stmt->execute(); // Ejecutamos la consulta
    }

    // Borrar un libro por su ID
    public function borrarLibro($id) {
        $query = 'DELETE FROM libros WHERE id = ?';

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id); // Vinculamos el parámetro
        $stmt->execute();
    }

    // Actualizar el estado de un libro
    public function actualizarEstado($id, $estado) {
        $query = 'UPDATE libros SET estado = ? WHERE id = ?';

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $estado, $id); // Vinculamos los parámetros
        $stmt->execute();
    }

    // Obtener todos los autores
    public function obtenerAutores() {
        $query = 'SELECT * FROM autores';
        $result = $this->db->query($query);

        $autores = [];
        while ($row = $result->fetch_assoc()) {
            $autores[] = $row;
        }

        return $autores;
    }

    // Agregar un nuevo autor
    public function agregarAutor($nombre) {
        $query = 'INSERT INTO autores (nombre) VALUES (?)';

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $nombre); // Vinculamos el parámetro
        $stmt->execute();
    }
}
?>
