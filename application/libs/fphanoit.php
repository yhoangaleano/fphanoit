<?php

class FPHANOIT
{
    /** @var null Controlador */
    private $url_controller = null;

    /** @var accion a ejecutar */
    private $url_action = null;

    /**
     * "Inicia" la aplicacion:
     * Analiza los elementos de la URL y pide el controlador/metodo
     */
    public function __construct()
    {   
        $this->openDatabaseConnection();
        $url = $this->splitUrl();
        
        $cont = 0;
        if($url[0] == 'gnhanoit'){
            require './application/libs/gnhanoit/gnhanoit.php';
            
            $gnhanoit = new gnhanoit;
            if (isset($url[0])==true && isset($url[2]) == false){

                $Table = $gnhanoit->index();

            }else if (isset($url[0]) == true && isset($url[2]) == true && $url[2] == "crear"){

                $gnhanoit->crear();
            }
            require './application/libs/gnhanoit/vwgnhanoit.php';
            $cont = 1;
        }

        if($cont==0){
            $this->url_controller = (isset($url[0]) ? $url[0] : null);
            $this->url_action = (isset($url[1]) ? $url[1] : null);

            if (file_exists('./application/controller/' . $this->url_controller . 'Controller.php')) {

                require './application/controller/' . $this->url_controller . 'Controller.php';
                $this->url_controller = new $this->url_controller();

                if (method_exists($this->url_controller, $this->url_action)) {
                    $parameter = array();
                    if(isset($url) == true && count($url)>=3){
                        for ($i=2; $i < count($url); $i++) { 
                            $parameter[] = $url[$i];
                        }
                        $this->url_controller->{$this->url_action}($parameter);
                    }else {
                        $this->url_controller->{$this->url_action}();
                    }
                } else {
                    $this->url_controller->index();
                }
            } else {
                require './application/controller/error.php';
                $home = new Error();
                $home->index();
            }
        }
    }

    /**
     * Abre la conexion teniendo en cuenta los parametros de application/config/config.php
     */
    private function openDatabaseConnection()
    {
        ActiveRecord\Config::initialize(function($cfg)
        {
            $cfg->set_model_directory('application/models');
            $cfg->set_connections(array('development' =>
                    DB_TYPE.'://'.DB_USER.':'.DB_PASS.'@'.DB_HOST.'/'.DB_NAME));
        });
    }

    private function splitUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
