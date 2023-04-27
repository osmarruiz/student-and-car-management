<?php
class Alumno {
    public $correo;
    public $nombre;
    public $carnet;
    public $edad;
    public $curso;
    public $foto;

    public function __construct($arg_correo="", $arg_nombre="", $arg_carnet="", $arg_edad="",$arg_curso="", $arg_foto="")
    {
        $this->correo=$arg_correo;
        $this->nombre=$arg_nombre;
        $this->carnet=$arg_carnet;
        $this->edad=$arg_edad;
        $this->curso=$arg_curso;
        $this->foto=$arg_foto;
    }

    public function guardarImagen() {
        $destino = "img/"; 
        $extension = pathinfo($this->foto['name'], PATHINFO_EXTENSION); 
        $nombre_imagen = uniqid() . "." . $extension; 
        $ruta_imagen = $destino . $nombre_imagen; 
        move_uploaded_file($this->foto['tmp_name'], $ruta_imagen); 
        $this->foto = $ruta_imagen; 
    }

    public function imprimir()
    {
        $output = "";
        $output .= "<br>";
        $output .= "<br>";
        $output .= "<b>Número de Carnet</b>: $this->carnet <br/>";
        $output .= "Correo Electrónico: $this->correo <br/>";
        $output .= "Nombre: $this->nombre <br/>";
        $output .= "Edad: $this->edad <br/>";
        $output .= "Curso Actual: $this->curso <br/>";
    
    return $output;
    }
    
    function __destruct() {
    
    }
}
?>