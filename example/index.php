<?php

include(__DIR__ . "/../vendor/autoload.php");

use Drips\MVC\Controller;

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
        $this->request->flashData();
        $result = 'false';
        if (checkCsrf()) {
            $this->request->session->flash('success', true);
            $result = 'true';
        }
        if (stripos($this->request->server["HTTP_ACCEPT"], "text/html") !== false) {
            // Formular ausgeben
            echo "HTML";
        } else {
            // JSON
            echo "{Result: $result}";
        }
        header("Location: ./");
        exit();
    }
}

new FormController;
