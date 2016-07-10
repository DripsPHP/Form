<?php

use Drips\HTTP\Request;

function value($name, $default = null)
{
    $request = Request::getInstance();
    $data = $request->getData();
    if($data->has($name)){
        return $data->get($name);
    }
    return $default;
}
