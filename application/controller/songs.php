<?php


class Songs extends Controller
{

    public function index()
    {
        $this->setSession("prueba","Funcionan Las sesiones");

        $songs = $this->loadModel("SongsModel")->find("all");

        $datos = "";
        foreach ($songs as $value) {
            $datos .= "<tr><th>".$value->id."</th>";
            $datos .= "<th>".$value->artist."</th>";
            $datos .= "<th>".$value->track."</th>";
            $datos .= "<th>".$value->link."</th></tr>";
        }

        $this->render("index", 
            array('d'=>$datos
        ));
    }

    public function obtenerParametros($da){
        var_dump($da);
    }
}
