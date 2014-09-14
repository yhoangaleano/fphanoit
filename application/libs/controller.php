<?php

class Controller
{

    public $layout = "header";

    function __construct()
    {
        session_start();
    }

    public function loadModel($model_name)
    {
        require 'application/models/' . strtolower($model_name) . '.php';
        return new $model_name();
    }

    public function render($view, $datos=null, $estado=true){
        if(is_array($datos))
            extract($datos,EXTR_PREFIX_SAME,'data');
        else
            $data=$datos;

        define('content','application/views/'.strtolower(get_class($this)).'/'.$view.'.php');
        
        if($estado){
            require 'application/views/_templates/'.$this->layout.'.php';
        }else{
            require content;
        }
    }

    public function setSession($clave, $valor){
        $_SESSION[$clave] = $valor;
    }

    public function getSession($clave){
        if(isset($_SESSION[$clave])){
            return $_SESSION[$clave];
        }else{
            return false;
        }
    }

    public function destroySession($clave){
        if(isset($_SESSION[$clave])){
            unset($_SESSION[$clave]);
        }else{
            return false;
        }
        
    }
}
