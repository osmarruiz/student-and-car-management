
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
$result = $DB->query("select * from persona WHERE carnet = '$carnet'");
//procesamiento de la consulta
$persona = new Alumno();
if(mysqli_num_rows($result) > 0){
    $per = $result->fetch_assoc();
    $persona = new Alumno($per['correo'],$per['nombre'],$per['carnet'],$per['edad'],$per['curso'],$per['foto']);
}



?>
<div class="ml-4">
<br>
<br>
<form method="post" action="actualizar.php" enctype="multipart/form-data">
                    <p>Correo Electronico <br> <input name="correo" type="email" required value= '<?php echo $persona->correo; ?>'></p>
                    <p>Nombre Completo <br> <input name="nombre" type="text" maxlength="200" size="25px" required value= '<?php echo $persona->nombre; ?>'></p>
                    <p>Numero de Carnet <br> <input name="carnet" type="text" maxlength="10" required value= '<?php echo $persona->carnet; ?>' <?php echo "readonly";?>></p>
                    <p>Edad <br> <input name="edad" type="number" min="15" max="50" required value= '<?php echo $persona->edad; ?>'></p>
                    <p>Curso Actual <br> <input name="curso" type="number" min="1" max="5" required value= '<?php echo $persona->curso; ?>'></p>
                    <p>Foto <br> <input name="foto" type="file"></p>
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