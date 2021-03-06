<?php

class Session
{
    protected static $sessionStarted = false;
    protected static $sessionIdRegenerated = false;

    public function __construct()
    {
        if (!self::$sessionStarted) {
            self::$sessionStarted = session_start();
        }
    }

    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function get($name, $defualt = null)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }

        return $defualt;
    }

    public function clear()
    {
        $_SESSION = array();
    }

    public function regenerate($destroy = true)
    {
        if (!self::$sessionIdRegenerated) {
            self::$sessionIdRegenerated = session_regenerate_id($destroy);
        }
    }

    public function setAuthenticated($bool)
    {
        $this->set('_authenticated', (bool)$bool);
    }

    public function isAuthenticated()
    {
        return $this->get('_authenticated', false);
    }
}
