<!-- CONTROLADOR -->
<?php
require_once 'Biblioteca.php';

$biblioteca = new Biblioteca();
    
$action = $_REQUEST['action'] ?? '';

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
// Borrar autor
elseif ($action === 'borrarAutor' && isset($_POST['id'])) {
    $biblioteca->borrarAutor($_POST['id']);
}
// Obtener libros y autores
$libros = $biblioteca->obtenerLibros();
$autores = $biblioteca->obtenerAutores();

// Incluir la vista de libros
include 'libros.php';
?>
