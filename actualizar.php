<?php
echo"<link rel='stylesheet' href='css/bootstrap.min.css'>";
include_once("Calumno.php");
include_once("Cserializar.php");

if(isset($_REQUEST['actualizar']))
{
    if(!isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
        $imagen = null;
    } else {
        
    }

    $list = Cserializar::deserializar();
    for($i=0; $i<count($list); $i++){
        if($list[$i]->carnet == $_POST['numero']){
            $list[$i]->correo = $_POST['correo'];
            $list[$i]->nombre = $_POST['nombre'];
            $list[$i]->edad = $_POST['edad'];
            $list[$i]->curso = $_POST['curso'];
            if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
                unlink($list[$i]->foto);
                $list[$i]->foto = $_FILES['imagen'];
                $list[$i]->guardarImagen();
            }
            break;
        }
    }
    $result = Cserializar::serializar($list);

    if($result)
    {
        echo "<div class='bg-success'><h3 class='text-white text-center pt-4 pb-4'>Datos guardado correctamente</h3></div>";
    }
    else
    {
        echo "<div class='bg-danger'><h3 class='text-white text-center pt-4 pb-4'>ocurrio un error</h3></div>";
    }
    echo "<a href='index.html'>Regresar a la pagina principal</a>";
}
else
echo "primera visita";

?>