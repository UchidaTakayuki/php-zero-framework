<?php

class Request
{
    public function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    public function getGet($name, $default = null)
    {
        return isset($_GET[$name]) ? $_GET[$name] : $default;
    }

    public function getPost($name, $default = null)
    {
        return isset($_POST[$name]) ? $_POST[$name] : $default;
    }

    public function getHost()
    {
        return !empty($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
    }

    public function isSsl()
    {
        return ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'));
    }

    public function getRequestUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getBaseUri()
    {
        $script_name = $_SERVER['SCRIPT_NAME'];
        $request_uri = $this->getRequestUri();

        if (0 === strpos($request_uri, $script_name)) {
            return $script_name;
        } else if (0 === strpos($request_uri, dirname($script_name))) {
            return rtrim(dirname($script_name), '/');
        }
        return '';
    }

    public function getPathInfo()
    {
        $base_uri = $this->getBaseUri();
        $request_uri = $this->getRequestUri();

        if (false !== ($pos = strpos($request_uri, '?'))) {
            $request_uri = substr($request_uri, 0, $pos);
        }
        return (string)substr($request_uri, strlen($base_uri));
    }
}
