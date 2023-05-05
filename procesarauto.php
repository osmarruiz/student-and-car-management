<?php
echo "<link rel='stylesheet' href='css/bootstrap.min.css'>";
include_once("Cauto.php");

if (isset($_REQUEST['procesarauto'])) {


    $auto = new auto(0, $_POST['placa'], $_POST['modelo'], $_POST['marca'], $_POST['desc']);

    //conecta a la base de datos
    $DB = new mysqli("localhost", "root", "", "registro");
    if ($DB->connect_errno) {
        print "Error en la conexion";
        exit();
    }
    //consulta
    $query = "insert into autos value ($auto->id, '$auto->placa', '$auto->modelo', '$auto->marca', '$auto->descripcion')";
    //inserta los datos
    $result = $DB->query($query);
    if ($result) {
        echo "<div class='bg-success'><h3 class='text-white text-center pt-4 pb-4'>Datos insertado correctamente</h3></div>";
    } else {
        echo "<div class='bg-danger'><h3 class='text-white text-center pt-4 pb-4'>ocurrio un error</h3></div>";
    }
} else {
    echo "<div class='bg-info'><h3 class='text-white text-center pt-4 pb-4'>primera visita</h3></div>";
}
echo "<a href='index.html'  class='btn btn-secondary'>Regresar a la pagina principal</a>";
?>