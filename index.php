<!-- CONTROLADOR -->
<?php
require_once 'Biblioteca.php';

$biblioteca = new Biblioteca();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';

    if ($accion === 'agregarLibro' && isset($_POST['titulo'], $_POST['autor'])) {
        $biblioteca->agregarLibro($_POST['titulo'], $_POST['autor']);
    } elseif ($accion === 'borrar' && isset($_POST['id'])) {
        $biblioteca->borrarLibro($_POST['id']);
    } elseif ($accion === 'actualizarEstado' && isset($_POST['id'], $_POST['estado'])) {
        $biblioteca->actualizarEstado($_POST['id'], $_POST['estado']);
    } elseif ($accion === 'agregarAutor' && isset($_POST['nombre'])) {
        $biblioteca->agregarAutor($_POST['nombre']);
    }

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$libros = $biblioteca->obtenerLibros();
$autores = $biblioteca->obtenerAutores();

include 'libros.php';
