<link rel="stylesheet" href="css/bootstrap.min.css">
<?php
include_once("Calumno.php");
include_once("Cserializar.php");
if(isset( $_GET['carnet']))
{
$carnet = $_GET['carnet'];
$list = Cserializar::deserializar();
for($i=0; $i<count($list); $i++){
    if($list[$i]->carnet == $carnet){
        unset($list[$i]);
        $list = array_values($list);
        break;
    }
}
$result = Cserializar::serializar($list);

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