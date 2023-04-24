<?php
if(isset($_REQUEST['procesar']))
{
    $correo = $_REQUEST['correo'];
    $nombre = $_REQUEST['nombre'];
    $numero = $_REQUEST['numero'];
    $edad = $_REQUEST['edad'];
    $curso = $_REQUEST['curso'];
    
}
else
echo "primera visita";

?>