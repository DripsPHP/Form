<?php

include(__DIR__."/../vendor/autoload.php");

use Drips\MVC\Controller;
use Drips\HTTP\Request;

class FormController extends Controller
{
    public function getAction()
    {

        return $this->view->display("view.tpl");
    }

    public function postAction()
    {
        //$entity = new Entity;
        //$entity->fromArray($request->post);


        if(stripos($this->request->server["HTTP_ACCEPT"], "text/html") !== false){
            // Formular ausgeben
            echo "HTML";
        } else {
            // JSON
            echo "{}";
        }
    }
}

new FormController;