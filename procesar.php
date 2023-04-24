<?php
include_once("Calumno.php");
include_once("serializar.php");

if(isset($_REQUEST['procesar']))
{
    $correo = $_REQUEST['correo'];
    $nombre = $_REQUEST['nombre'];
    $numero = $_REQUEST['numero'];
    $edad = $_REQUEST['edad'];
    $curso = $_REQUEST['curso'];
    $imagen = $_FILES['imagen'];
    
}
else
echo "primera visita";

?>