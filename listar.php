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
    <tr>
        <thead>
            <th scope="row">Foto</th>
            <th scope="row">Informacion</th>
        </thead>
    </tr>
<?php
    foreach($list as $alumno){
    
        $alumno->imprimir();
        echo "<tr><td><img src='". $alumno->foto . "'/></td><td>hola</td></tr>";
    }
?>
</table>
<br>
<br>
<a href="index.html">Regresar a la pagina principal</a>