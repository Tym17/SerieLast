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
      $serie = new SerieModel;

      // Check if the form has been filled
      if (!empty($_POST))
      {
        // Check name validity
        if (strlen($_POST['name']) == 0)
        {
          $this->set('error', 'Serie name need to be at least 1 character long');
          return ;
        }

        // add it
        $ret = $serie->addSerie($_SESSION['id'],
          htmlspecialchars($_POST['name']),
          htmlspecialchars($_POST['airdate']),
          htmlspecialchars($_POST['season']),
          htmlspecialchars($_POST['episode']),
          htmlspecialchars($_POST['color'])
        );

        // show message depending on success
        if ($ret)
          $this->set('success', 'Serie <strong>' . htmlspecialchars($_POST['name']) . '</strong> added');
        else
          $this->set('error', 'Something went wrong !');
      }
    }

    function edit($id)
    {
      $serie = new SerieModel;
      $this->set('id', $id);
      // Set infos for form
      $current = $serie->getSerieFromId($id);
      var_dump($current);

      // Check if $id is present, otherwise create new serie
      if (!isset($id) || strlen($id) == 0)
      {
        $this->_template->setRedirection(APP_URL . '/serie/add');
        return ;
      }

      // Check if the form has been filled
      if (!empty($_POST) && false)
      {
        // Delete button has been pressed
        if ($_POST['btn'] == 'Delete')
        {
          $_SESSION['notifs'][] = 'Deleted serie';
          $serie->removeSerie($id);
          $this->_template->setRedirection(APP_URL);
          return ;
        }

        // Check name validity
        if (strlen($_POST['name']) == 0)
        {
          $this->set('error', 'Serie name need to be at least 1 character long');
          return ;
        }

        //update it
        $ret = $serie->updateSerie($id,
          htmlspecialchars($_POST['name']),
          htmlspecialchars($_POST['airdate']),
          htmlspecialchars($_POST['season']),
          htmlspecialchars($_POST['episode']),
          htmlspecialchars($_POST['color'])
        );

        // show message depending on success
        if ($ret)
          $this->set('success', 'Serie <strong>' . htmlspecialchars($_POST['name']) . '</strong> updated');
        else
          $this->set('error', 'Something went wrong !');
      }
    }
}
