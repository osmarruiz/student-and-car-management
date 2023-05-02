<?php
echo"<link rel='stylesheet' href='css/bootstrap.min.css'>";
include_once("Calumno.php");

if(isset($_REQUEST['procesar']))
{

    
    $alum = new Alumno($_POST['correo'], $_POST['nombre'], $_POST['carnet'], (int)$_POST['edad'], (int)$_POST['curso'], $_FILES['imagen']);
    $alum->guardarImagen();
    //conecta a la base de datos
    $DB = new mysqli("localhost","root","","registro");
    if($DB->connect_errno){
    print "Error en la conexion";
    exit();
    }
    //consulta
    $query = "insert into persona value ('$alum->carnet', '$alum->nombre', '$alum->correo', $alum->edad, $alum->curso, '$alum->foto')";
    //inserta los datos
    $result = $DB->query($query);
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