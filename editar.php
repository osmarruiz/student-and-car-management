
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
        $persona=$list[$i];
        break;
    }
}

?>
<div class="ml-4">
<br>
<br>
<form method="post" action="actualizar.php" enctype="multipart/form-data">
                    <p>Correo Electronico <br> <input name="correo" type="email" required value= '<?php echo $persona->correo; ?>'></p>
                    <p>Nombre Completo <br> <input name="nombre" type="text" maxlength="200" size="25px" required value= '<?php echo $persona->nombre; ?>'></p>
                    <p>Numero de Carnet <br> <input name="numero" type="text" maxlength="10" required value= '<?php echo $persona->carnet; ?>' <?php echo "readonly";?>></p>
                    <p>Edad <br> <input name="edad" type="number" min="15" max="50" required value= '<?php echo $persona->edad; ?>'></p>
                    <p>Curso Actual <br> <input name="curso" type="number" min="1" max="5" required value= '<?php echo $persona->curso; ?>'></p>
                    <p>Foto <br> <input name="imagen" type="file"></p>
                    <br>
                    <br>
                    <input class="btn btn-primary" type="submit" name="actualizar" value="Guardar">
</form>
<?php
}
?>
<br>
<a href="index.html">Regresar a la pagina principal</a>
</div>