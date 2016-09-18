<?php

class Seriecontroller extends Controller
{

    function index()
    {
      $this->_template->setRedirection(APP_URL . '/serie/add');
      return ;
    }

    function add()
    {
    }

    function edit($id)
    {
    }
}
