<link rel="stylesheet" href="css/bootstrap.min.css">
<?php
include_once("Calumno.php");

//conecta a la base de datos
$DB = new mysqli("localhost","root","","registro");
if($DB->connect_errno){
    print "Error en la conexion";
    exit();
}
//consulta
$result = $DB->query("select * from persona");
//procesamiento de la consulta
$list = array();
for($i=0;$i < mysqli_num_rows($result); $i++){
    $per = $result->fetch_assoc();
    $list[$i] = new Alumno($per['correo'],$per['nombre'],$per['carnet'],$per['edad'],$per['curso'],$per['foto']);
}

?>
<h3>Resultados</h3>
<h1>Listados de Alumnos</h1>
<br>
<br>
<table class="table">
    <thead>
        <tr>
            <th scope="row">Foto</th>
            <th scope="row">Informacion</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($list as $alumno){
                echo "<tr>
                        <td><img src='". $alumno->foto . "' style='width: 100px; height: 100px'/></td>
                        <td>" . $alumno->imprimir() . "<a href='editar.php?carnet=" .$alumno->carnet .  "' class='mr-3'>Editar</a><a href='borrar.php?carnet=".$alumno->carnet ."'>Borrar</a></td>
                      </tr>";
            }
        ?>
    </tbody>
</table>
<br>
<br>
<a href="index.html" class="ml-3">Regresar a la pagina principal</a>
<br>
<br>