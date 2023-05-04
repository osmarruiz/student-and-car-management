
<link rel="stylesheet" href="css/bootstrap.min.css">
<?php
 include_once("Cauto.php");
 if(isset( $_GET['id']))
{
$id = $_GET['id'];
//conecta a la base de datos
$DB = new mysqli("localhost","root","","registro");
if($DB->connect_errno){
    print "Error en la conexion";
    exit();
}
//consulta
$result = $DB->query("select * from autos WHERE id = '$id'");
//procesamiento de la consulta
$aut = new auto();
if(mysqli_num_rows($result) > 0){
    $auto = $result->fetch_assoc();
    $aut = new auto($auto['id'],$auto['placa'],$auto['modelo'],$auto['marca'],$auto['descripcion']);
}



?>
<div class="ml-4">
<br>
<br>
<form method="post" action="actualizarauto.php" >
                    <input type="hidden" name="id" value='<?php echo $aut->id; ?>'>
                      <p>Placa <br> <input name="placa" type="text" maxlength="10" required value='<?php echo $aut->placa; ?>'></p>
                      <p>Modelo <br> <input name="modelo" type="text" maxlength="10" required value='<?php echo $aut->modelo; ?>'></p>
                      <p>Marca <br> <input name="marca" type="text" maxlength="10" required value='<?php echo $aut->marca; ?>'></p>
                      <p>Descripcion <br> <input name="desc" type="text" maxlenth="200" required value='<?php echo $aut->descripcion; ?>'></p>
                      <br>
                      <br>
                      <input class="btn btn-primary" type="submit" name="actualizarauto" value="Enviar"> 
</form>
<?php
}
?>
<br>
<a href="index.html">Regresar a la pagina principal</a>
</div>