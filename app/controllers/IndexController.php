<?php

class IndexController extends Controller
{

    function index()
    {
        if (!isset($_SESSION['id']))
        {
            $this->_template->setRedirection(APP_URL . '/login');
            return ;
        }
    }
}
