<?php

use Drips\HTTP\Request;

/**
 * Liefert den alten Wert eines Eingabefeldes oder den übergebenen Standardwert.
 *
 * @param $name
 * @param null $default
 *
 * @return string|null
 */
function value($name, $default = null)
{
    $request = Request::getInstance();
    $data = $request->getData();
    if ($data->has($name)) {
        return $data->get($name);
    }
    return $default;
}

/**
 * Dient zur Vorbeugung von CSRF. Überprüft automatisch das CSRF-Token und ob dieses gültig ist.
 *
 * @return bool
 */
function checkCsrf()
{
    $request = Request::getInstance();
    if ($request->session->has('_csrf_token') && $request->getData()->has('_csrf_token')) {
        return $request->session->get('_csrf_token') == $request->getData()->get('_csrf_token');
    }
    return false;
}