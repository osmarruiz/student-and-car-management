<link rel="stylesheet" href="css/bootstrap.min.css">
<?php
include_once("Calumno.php");
if(isset( $_GET['carnet']))
{
$carnet = $_GET['carnet'];
    //conecta a la base de datos
    $DB = new mysqli("localhost","root","","registro");
    if($DB->connect_errno){
    print "Error en la conexion";
    exit();
    }
      //consulta
      $query = "select foto from persona where carnet = '$carnet'";
      //inserta los datos
      $result = $DB->query($query);
      $col = $result->fetch_assoc();
      unlink($col['foto']);
    //consulta
    $query = "delete from persona where carnet = '$carnet'";
    //inserta los datos
    $result = $DB->query($query);

    if($result)
    {
        echo "<div class='bg-success'><h3 class='text-white text-center pt-4 pb-4'>borrado correctamente</h3></div>";
    }
    else
    {
        echo "<div class='bg-danger'><h3 class='text-white text-center pt-4 pb-4'>ocurrio un error</h3></div>";
    }
}
else{
    echo "primera visita";
}
?>
<a href="index.html">Regresar a la pagina principal</a>