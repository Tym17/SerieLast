<?php

require_once(ROOT . DS . 'config' . DS . 'config.php');

/** Autoload any classes that are required **/

function __autoload($className) {
    if (file_exists(ROOT . DS . 'library' . DS . strtolower($className) . '.php'))
    {
        require_once(ROOT . DS . 'library' . DS . strtolower($className) . '.php');
    }
    else if (file_exists(ROOT . DS . 'library' . DS . 'controllers' . DS . strtolower($className) . '.php'))
    {
        require_once(ROOT . DS . 'library' . DS . 'controllers' . DS . strtolower($className) . '.php');
    }
    else if (file_exists(ROOT . DS . 'library' . DS . 'models' . DS . strtolower($className) . '.php'))
    {
        require_once(ROOT . DS . 'library' . DS . 'models' . DS . strtolower($className) . '.php');
    }
    else if (file_exists(ROOT . DS . 'app' . DS . 'controllers' . DS . strtolower($className) . '.php'))
    {
        require_once(ROOT . DS . 'app' . DS . 'controllers' . DS . strtolower($className) . '.php');
    }
    else if (file_exists(ROOT . DS . 'app' . DS . 'models' . DS . strtolower($className) . '.php'))
    {
        require_once(ROOT . DS . 'app' . DS . 'models' . DS . strtolower($className) . '.php');
    }
    else
    {
        /* Error Generation Code Here */
    }
}

require_once(ROOT . DS . 'library' . DS . 'init.php');
