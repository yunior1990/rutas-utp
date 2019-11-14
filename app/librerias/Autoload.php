<?php
//se encarga de cargar el modelo y las vistas
class Autoload{

    //cargar modelo
    public function modelo($modelo){
        require_once '../app/modelos/'.$modelo.'.php';
        return new $modelo();
    }
    
    
     //cargar vista
     public function vista($vista,$datos=[]){
         if (file_exists('../app/vistas/'.$vista.'.php')) {
            require_once '../app/vistas/'.$vista.'.php';   
         }else{
            die('la vista no existe');
         }
        
     }
     
 
}