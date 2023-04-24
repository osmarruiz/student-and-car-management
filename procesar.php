<?php
echo"<link rel='stylesheet' href='css/bootstrap.min.css'>";
include_once("Calumno.php");
include_once("Cserializar.php");

if(isset($_REQUEST['procesar']))
{

    $listalumno = Cserializar::deserializar();
    $newalumno = new Alumno($_POST['correo'], $_POST['nombre'], $_POST['numero'], $_POST['edad'], $_POST['curso'], $_FILES['imagen']);
    $newalumno->guardarImagen();
    array_push($listalumno, $newalumno);
    $result = Cserializar::serializar($listalumno);

    if($result)
    {
        echo "<div class='bg-success'><h3 class='text-white text-center pt-4 pb-4'>Datos insertado correctamente</h3></div>";
    }
    else
    {
        echo "<div class='bg-danger'><h3 class='text-white text-center pt-4 pb-4'>ocurrio un error</h3></div>";
    }
    echo "<a href='index.html'>Regresar a la pagina principal</a>";
}
else
echo "primera visita";

?>