<link rel="stylesheet" href="css/bootstrap.min.css">
<?php
include_once("Cauto.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //conecta a la base de datos
    $DB = new mysqli("localhost", "root", "", "registro");
    if ($DB->connect_errno) {
        print "Error en la conexion";
        exit();
    }
    
    //consulta
    $query = "delete from autos where id = '$id'";
    //inserta los datos
    $result = $DB->query($query);

    if ($result) {
        echo "<div class='bg-success'><h3 class='text-white text-center pt-4 pb-4'>borrado correctamente</h3></div>";
    } else {
        echo "<div class='bg-danger'><h3 class='text-white text-center pt-4 pb-4'>ocurrio un error</h3></div>";
    }
} else {
    echo "primera visita";
}
?>
<a href="index.html" class="btn btn-secondary">Regresar a la pagina principal</a>