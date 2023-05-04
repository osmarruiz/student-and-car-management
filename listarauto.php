<link rel="stylesheet" href="css/bootstrap.min.css">
<?php
include_once("Cauto.php");

//conecta a la base de datos
$DB = new mysqli("localhost","root","","registro");
if($DB->connect_errno){
    print "Error en la conexion";
    exit();
}
//consulta
$result = $DB->query("select * from autos");
//procesamiento de la consulta
$list = array();
for($i=0;$i < mysqli_num_rows($result); $i++){
    $aut = $result->fetch_assoc();
    $list[$i] = new auto($aut['id'],$aut['placa'],$aut['modelo'],$aut['marca'],$aut['descripcion']);
}

?>
<h1>Listados de Autos</h1>
<br>
<br>
<div class="container">
    <table class="table table-dark">
        <thead>
            <tr><th scope="row">id</th><th scope="row">placa</th><th scope="row">modelo</th><th scope="row">marca</th><th scope="row">descripcion</th><th scope="row">opciones</th></tr>
        </thead>
        <tbody>
            <?php
                foreach($list as $auto){
                    echo "<tr><td>$auto->id</td><td>$auto->placa</td><td>$auto->modelo</td><td>$auto->marca</td><td>$auto->descripcion</td>   <td><a href='editarauto.php?id=" .$auto->id .  "' class='btn btn-primary mr-3'>Editar</a><a href='borrar.php?id=".$auto->id ."' class='btn btn-danger'>Borrar</a></td></tr>";
                }
            ?>
        </tbody>
    </table>
</div>
<br>
<br>
<a href="index.html" class="ml-3">Regresar a la pagina principal</a>
<br>
<br>