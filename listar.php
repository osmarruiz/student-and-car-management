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
                <th scope='row'><img src='". $alumno->foto . "'/></th>
                <td>" . $alumno->imprimir() . "</td>
                </tr>";
            }
        ?>
    </tbody>
</table>
<br>
<br>
<a href="index.html">Regresar a la pagina principal</a>