<link rel="stylesheet" href="css/bootstrap.min.css">
<?php
include_once("Calumno.php");
include_once("Cserializar.php");

$list = Cserializar::deserializar();
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
                        <td><img src='". $alumno->foto . "' style='width:250px; height:250px;'/></td>
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