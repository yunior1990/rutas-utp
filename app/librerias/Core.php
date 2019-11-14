<?php
/*mapear la url ingreado en el navegador
1:controlador
2:metodo
3:parametro*/

class Core{
    protected $controladoractual='paginas';
    protected $metodoactual ='index';
    protected $parametro=[];

    public function __construct(){
       // print_r($this->obtenerurl());
        $url=$this->obtenerurl();
        //buscar en controladores sis el controlador existe
         if (file_exists('../app/controladores/'.ucwords($url[0]).'.php')) {
             # code...
             $this->controladoractual=ucwords($url[0]);

             unset($url[0]);
         }

         require_once '../app/controladores/'.$this->controladoractual.'.php';
         $this->controladoractual=new $this->controladoractual;

         //para verificar el metodo de la url
         if (isset($url[1])) {
             if (method_exists($this->controladoractual,$url[1])) {
                 $this->metodoactual = $url[1];

                 unset($url[1]);
             }
         }
        // echo $this->metodoactual;

         //optener los paremtros
         $this->parametros=$url ? array_values($url):[];

         //llamar al callback con parametros array
         call_user_func_array([$this->controladoractual,$this->metodoactual],$this->parametros);
    }
    //crear un metodo para obenter la url    
    public function obtenerurl(){
        //echo $_GET['url'];
        if (isset($_GET['url'])) {
           $url=rtrim($_GET['url'],'/');//para quitar los espacios en blancos u otros caracteres
           $url=filter_var($url,FILTER_SANITIZE_URL);
           $url=explode('/',$url);

           return $url;        
        
        }
    }
}
