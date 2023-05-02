<?php
echo"<link rel='stylesheet' href='css/bootstrap.min.css'>";
include_once("Calumno.php");

if(isset($_REQUEST['actualizar']))
{
    $carnet = $_POST['carnet'];

    $alum = new Alumno($_POST['correo'],$_POST['nombre'],$_POST['carnet'],$_POST['edad'],$_POST['curso'],$_FILES['foto']);

    
    //conecta a la base de datos
    $DB = new mysqli("localhost","root","","registro");
    if($DB->connect_errno){
    print "Error en la conexion";
    exit();
    }
    
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
         //consulta
        $query = "select foto from persona where carnet = '$carnet'";
        //inserta los datos
        $result = $DB->query($query);
        $col = $result->fetch_assoc();
        unlink($col['foto']);
        $alum->guardarImagen();
    //consulta
    $query = "update persona set  nombre = '$alum->nombre', correo = '$alum->correo', edad = $alum->edad, curso = $alum->curso, foto = '$alum->foto' where carnet = '$carnet'";
    }
    else{   
    //consulta
    $query = "update persona set  nombre = '$alum->nombre', correo = '$alum->correo', edad = $alum->edad, curso = $alum->curso where carnet = '$carnet'";
    }
    //inserta los datos
    $result = $DB->query($query);
    

    if($result)
    {
        echo "<div class='bg-success'><h3 class='text-white text-center pt-4 pb-4'>Datos guardado correctamente</h3></div>";
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