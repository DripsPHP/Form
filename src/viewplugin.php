<?php

use Drips\HTTP\Request;
use Drips\MVC\View;

function formblockPlugin($params, $content, $template, &$repeat)
{
    if (!$repeat) {
        $request = Request::getInstance();
        $methods = array('get', 'post', 'delete', 'patch', 'put');
        $beforeContent = '';
        $afterContent = '';
        if (isset($params['method']) && in_array(strtolower($params['method']), $methods)) {
            $method = strtolower($params['method']);
            $beforeContent .= '<form';
            foreach ($params as $param => $val) {
                if ($param == 'method') {
                    $val = $val != 'get' ? 'post' : 'get';
                }
                $beforeContent .= ' ' . $param . '="' . $val . '"';
            }
            if (!isset($params['action'])) {
                $beforeContent .= ' action="./"';
            }
            $beforeContent .= '>';
            if (!in_array($method, ['get', 'post'])) {
                $beforeContent .= '<input type="hidden" name="_method" value="' . $method . '"/>';
            }
            if ($method != 'get') {
                // CSRF-Token
                $token = md5(mt_rand() . __DIR__);
                $beforeContent .= '<input type="hidden" name="_csrf_token" value="' . $token . '"/>';
                $request->session->flash('_csrf_token', $token);
            }
            $afterContent .= '</form>';
        } else {
            trigger_error('Syntax error: {form} benötigt ein gültiges method-Attribut');
        }
        return $beforeContent . $content . $afterContent;
    }
}

View::on('create', function ($view) {
    $view->registerPlugin('block', 'form', 'formblockPlugin');
});
