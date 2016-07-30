<?php

use Drips\HTTP\Request;

function value($name, $default = null)
{
    $request = Request::getInstance();
    $data = $request->getData();
    if ($data->has($name)) {
        return $data->get($name);
    }
    return $default;
}

function checkCsrf()
{
    $request = Request::getInstance();
    if ($request->session->has('_csrf_token') && $request->getData()->has('_csrf_token')) {
        return $request->session->get('_csrf_token') == $request->getData()->get('_csrf_token');
    }
    return false;
}