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
      // Check if $id is present, otherwise create new serie
      if (!isset($id) || strlen($id) == 0)
      {
        $this->_template->setRedirection(APP_URL . '/serie/add');
        return ;
      }

      //
    }
}
