<?php
require_once 'Router.php';

class Paginas extends Autoload{
    public function __construct(){
        //$this->usuariomodelo=$this->modelo('usuario');;
        $route = isset($_GET['url']) ? $_GET['url'] : 'paginas/inicio';
        $mexflix = new Router($route);  
        
        
    }
    public function index(){
       // $this->EmpleadoModelo->obtenerempleado();
       // $usuario = $this->usuariomodelo->obtenerusuario();
       // $route = isset($_GET['url']) ? $_GET['url'] : 'paginas/inicio';
       // $mexflix = new Router($route);
        //$this->vista('paginas/inicio');
        //echo 'holi';
    }    
    public function login(){
        // $this->EmpleadoModelo->obtenerempleado();
        // $usuario = $this->usuariomodelo->obtenerusuario();
         
         //echo 'holi';
     }  
}
