<?php
class auto {
    public $id;
    public $placa;
    public $modelo;
    public $marca;
    public $descripcion;
    

    public function __construct($id=0, $placa="", $modelo="", $marca="",$descripcion="")
    {
        $this->id=$id;
        $this->placa=$placa;
        $this->modelo=$modelo;
        $this->marca=$marca;
        $this->descripcion=$descripcion;
    }

    function __destruct() {
    
    }
}
?>