<!-- CONTROLADOR -->
<?php
require_once 'Biblioteca.php';

$biblioteca = new Biblioteca();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // Agregar libro
    if ($action === 'agregarLibro' && isset($_POST['titulo'], $_POST['autor'])) {
        $biblioteca->agregarLibro($_POST['titulo'], $_POST['autor']);
    }
    // Borrar libro
    elseif ($action === 'borrar' && isset($_POST['id'])) {
        $biblioteca->borrarLibro($_POST['id']);
    }
    // Actualizar estado de libro
    elseif ($action === 'actualizarEstado' && isset($_POST['id'], $_POST['estado'])) {
        $biblioteca->actualizarEstado($_POST['id'], $_POST['estado']);
    }
    // Agregar autor
    elseif ($action === 'agregarAutor' && isset($_POST['nombre'])) {
        $biblioteca->agregarAutor($_POST['nombre']);
    }

    // Redirigir para evitar resubmit de formularios
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Obtener libros y autores
$libros = $biblioteca->obtenerLibros();
$autores = $biblioteca->obtenerAutores();

// Incluir la vista de libros
include 'libros.php';
?>
