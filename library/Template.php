<?php

class Template {

    protected $variables = array();
    protected $_controller;
    protected $_action;
    protected $_isRedirection;
    protected $_RedirectionUrl;

    function __construct($controller,$action) {
        $this->_controller = $controller;
        $this->_action = $action;
        $this->_isRedirection = false;
    }

    /** Set Variables **/

    function set($name,$value) {
        $this->variables[$name] = $value;
    }

    function setController($nc)
    {
        $this->_controller = $nc;
    }

    function setAction($na)
    {
        $this->_action = $na;
    }

    function setRedirection($url)
    {
        $this->_isRedirection = true;
        $this->_RedirectionUrl = $url;
    }

    /** Display Template **/
    function render() {
        if ($this->_isRedirection)
        {
            header("HTTP/1.1 303 See Other");
            header("Location: " . $this->_RedirectionUrl);
            exit;
        }

        extract($this->variables);

        /*
        ** Load controller's specific components or general app components
        */
        if (file_exists(ROOT . DS . 'app' . DS . 'views' . DS . ucfirst($this->_controller) . DS . 'header.phtml')) {
            include (ROOT . DS . 'app' . DS . 'views' . DS . ucfirst($this->_controller) . DS . 'header.phtml');
        } else {
            if (file_exists(ROOT . DS . 'app' . DS . 'views' . DS . 'header.phtml'))
                include (ROOT . DS . 'app' . DS . 'views' . DS . 'header.phtml');
        }

        if (file_exists(ROOT . DS . 'app' . DS . 'views' . DS . ucfirst($this->_controller) . DS . $this->_action . '.phtml'))
            include (ROOT . DS . 'app' . DS . 'views' . DS . ucfirst($this->_controller) . DS . $this->_action . '.phtml');
        else if (file_exists(ROOT . DS . 'app' . DS . 'views' . DS . ucfirst($this->_controller) . '.phtml'))
            include (ROOT . DS . 'app' . DS . 'views' . DS . ucfirst($this->_controller) . '.phtml');
        /*
        ** Load framework's component if no equivalent in app and if it exists
        */
        else if (file_exists(ROOT . DS . 'library' . DS . 'views' . DS . ucfirst($this->_controller) . DS . $this->_action . '.phtml'))
            include (ROOT . DS . 'library' . DS . 'views' . DS . ucfirst($this->_controller) . DS . $this->_action . '.phtml');

        if (file_exists(ROOT . DS . 'app' . DS . 'views' . DS . ucfirst($this->_controller) . DS . 'footer.phtml')) {
            include (ROOT . DS . 'app' . DS . 'views' . DS . ucfirst($this->_controller) . DS . 'footer.phtml');
        } else {
            if (file_exists(ROOT . DS . 'app' . DS . 'views' . DS . 'footer.phtml'))
                include (ROOT . DS . 'app' . DS . 'views' . DS . 'footer.phtml');
        }
    }

}
