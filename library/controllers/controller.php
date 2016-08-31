<?php
class Controller {

    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_template;

    function __construct($model, $controller, $action) {

        $this->_controller = $controller;
        $this->_action = $action;

        if ($model != null)
        {
            $this->_model = $model;
            $this->$model = new $model;
        }

        $this->_template = new Template($controller,$action);
    }

    function set($name,$value) {
        $this->_template->set($name,$value);
    }

    function __destruct() {
        $this->_template->render();
    }

    function index($params)
    {

    }
    
    /*
    ** 404error page of the controller
    */
    function noAction()
    {
        echo 'noAction';
    }
}
