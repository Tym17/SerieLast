<?php
class Controller {

    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_template;

    function __construct($controller, $action) {

        $this->_controller = $controller;
        $this->_action = $action;

        $this->_template = new Template($controller,$action);
    }

    /*
    ** Pass variable to the Template
    */
    function set($name,$value) {
        $this->_template->set($name,$value);
    }

    function __destruct() {
        // render Template uppon destruction
        $this->_template->render();
    }

    /*
    ** Basic function call if no action is specified while calling for this controller
    */
    function index($params)
    {

    }

    /*
    ** Controller's own 404error page 
    */
    function noAction()
    {
        echo 'noAction';
    }
}
