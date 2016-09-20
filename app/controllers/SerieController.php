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

    function setInfos($serie, $id)
    {
      // Set infos for pre-filled form
      $this->set('id', $id);
      $current = $serie->getSerieFromId($id);
      $this->set('Name', $current['Name']);
      $this->set('airdate', $current['AirDate']);
      $this->set('season', $current['LastSeason']);
      $this->set('episode', $current['LastEpisode']);
      $this->set('color', $current['Color']);
    }

    function edit($id)
    {
      $serie = new SerieModel;

      // Check if $id is present, otherwise create new serie
      if (!isset($id) || strlen($id) == 0)
      {
        $this->_template->setRedirection(APP_URL . '/serie/add');
        return ;
      }

      // Check if the form has been filled
      if (!empty($_POST))
      {
        // Delete button has been pressed
        if ($_POST['btn'] == 'Delete')
        {
          $delRet = $serie->removeSerie($id);
          // Check if serie has been deleted
          if (!$delRet)
          {
            $this->set('error', 'Could not delete serie');
            $this->setInfos($serie, $id);
            return ;
          }
          $_SESSION['notifs'][] = 'Deleted serie';
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

      $this->setInfos($serie, $id);
    }
}
