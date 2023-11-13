<?php
class Cserializar {

    /** Almacenamos los datos en el disco */
    public static function serializar($listaPersonas) {
        
        try {
            /** Salvamos el arreglo en disco */
            $arreglo_serializado = serialize($listaPersonas);
            file_put_contents('persona.store', $arreglo_serializado);
            return true;
            
        } catch(Exception $e) { 
            return false;
        }
    }

    /** Recuperamos los datos almacenados en el archivo */
    public static function deserializar() {
        try {
            $listaPersonas = null;
            if(file_exists('persona.store')){
                $arreglo_serializado = file_get_contents('persona.store');
                $listaPersonas = unserialize($arreglo_serializado);
                
            }
            if(!is_array($listaPersonas))
            $listaPersonas = array();
        }
        catch(Exception $e) { 
            $listaPersonas = array();
        }

        return $listaPersonas;
    }
    
}
?>