<?php
//cargando librerias 
require_once 'config/configurar.php';
require_once 'helpers/url_helper.php';
//require_once 'librerias/Base.php';
//require_once 'librerias/Controlador.php';
//require_once 'librerias/Core.php';

//autoload
spl_autoload_register(function($nombreclase){
    require_once 'librerias/'.$nombreclase.'.php';
});

