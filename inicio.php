<?php
    require_once('clas.db.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <th>
            <td>id</td>
            <td>Libro</td>
            <td>Autor</td>
            <td>estado</td>
        </th>
        <?php
            require_once('libro.php');
            $libro = new libro();
            $libro->crearFila();
        ?>
    </table>
</body>
</html>