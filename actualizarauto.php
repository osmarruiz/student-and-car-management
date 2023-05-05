<?php
echo"<link rel='stylesheet' href='css/bootstrap.min.css'>";
include_once("Cauto.php");

if(isset($_REQUEST['actualizarauto']))
{
    $id = $_POST['id'];

    $aut = new auto($_POST['id'],$_POST['placa'],$_POST['modelo'],$_POST['marca'],$_POST['desc']);

    
    //conecta a la base de datos
    $DB = new mysqli("localhost","root","","registro");
    if($DB->connect_errno){
    print "Error en la conexion";
    exit();
    }
    
    //consulta
    $query = "update autos set placa = '$aut->placa', modelo = '$aut->modelo', marca = '$aut->marca', descripcion = '$aut->descripcion' where id = '$id'";
    
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
    echo "<a href='index.html'  class='btn btn-secondary'>Regresar a la pagina principal</a>";
}
else
echo "<div class='bg-info'><h3 class='text-white text-center pt-4 pb-4'>Primera visita</h3></div>";
?>