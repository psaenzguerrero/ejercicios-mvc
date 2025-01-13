<?php
    function inicio(){
        require_once('./clas.db.php');

        $db = new db();

        $db->seleccionarLibro();
        require_once('inicio.php');

    }
    inicio();
?>