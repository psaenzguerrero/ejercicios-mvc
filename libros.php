<!-- VISTA -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Biblioteca</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-flow: column;
            background-color: whitesmoke;
            h1{
                background-color: beige;
                width: 100%;
                text-align:center;
                /* color: white; */
                font-size:40px;
            }
        }
    </style>
</head>
<body>
    <h1>Gestión de Biblioteca</h1>
    <h2>Lista de Libros</h2>
    <table border="1">
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <!-- Mostrar libros -->
        <?php foreach ($libros as $libro): ?>
            <tr>
                <!-- El htmlspecialchars es para proteccion contra ataques xss es buena praxis pero no es obligatorio -->
                <td><?= htmlspecialchars($libro['titulo']) ?></td>
                <td><?= htmlspecialchars($libro['autor']) ?></td>
                <td><?= $libro['estado'] == 1 ? 'Disponible' : 'No disponible' ?></td>
                <td>
                    <!-- Formulario para borrar un libro -->
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $libro['id'] ?>">

                        <button type="submit" name="action" value="borrar">Borrar</button>
                    </form>

                    <!-- Formulario para actualizar el estado de un libro -->
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $libro['id'] ?>">
                        <input type="hidden" name="estado" value="<?= $libro['estado'] == 1 ? 0 : 1 ?>">

                        <button type="submit" name="action" value="actualizarEstado">
                            <?= $libro['estado'] == 1 ? 'Marcar como no disponible' : 'Marcar como disponible' ?>
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Agregar Libro</h2>
    <form method="post">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required>
        
        <label for="autor">Autor:</label>

        <select name="autor" id="autor" required>
            <!-- Opciones de autores -->
            <?php foreach ($autores as $autor): ?>
                <option value="<?= $autor['id'] ?>"><?= htmlspecialchars($autor['nombre']) ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit" name="action" value="agregarLibro">Agregar</button>
    </form>

    <h2>Agregar Autor</h2>
    <form method="post">
        <label for="nombre">Nombre del Autor:</label>
        <input type="text" name="nombre" id="nombre" required>
        <button type="submit" name="action" value="agregarAutor">Agregar</button>
    </form>
    <h2>Lista de Autores</h2>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Accion</th>
        </tr>
        <?php foreach($autores as $autor):?>
            <tr>
                <td><?= htmlspecialchars($autor['nombre']) ?></td>
                <td>
                    <!-- Formulario para borrar un autor -->
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $autor['id'] ?>">

                        <button type="submit" name="action" value="borrarAutor">Borrar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    </body>
</html>
