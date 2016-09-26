<?php

class SerieModel extends SqliteHandle
{

    function __construct()
    {
        parent::__construct(DB_PATH);
    }

    function emptySerie()
    {
      return array (
          array('Name', ''),
          array('AirDate', ''),
          array('LastSeason', 0),
          array('LastEpisode', 0),
          array('Color', 'danger')
      );
    }

    function getSeriesFromOwnerId($id)
    {
      // Escaping
      $id = $this->es($id);

      // Prepairing and executing query
      $query = str_replace('\n', "", file_get_contents(ROOT . DS . 'db' . DS . 'serie' . DS . 'getMySeries.sql'));
      $query = str_replace(":my_id", $id, $query);

      $result = $this->query($query);
      if (!$result)
        return $this->emptySerie();

      $retArray = $this->arrayify($result);
      $result->finalize();
      return $retArray;
    }

    function getSerieFromId($id)
    {
      // Escaping
      $id = $this->es($id);

      // Prepairing and executing query
      $query = str_replace('\n', "", file_get_contents(ROOT . DS . 'db' . DS . 'serie' . DS . 'getSerie.sql'));
      $query = str_replace(":id", $id, $query);

      $result = $this->query($query);
      if (!$result)
        return $this->emptySerie();

      $ret = $result->fetchArray(SQLITE3_ASSOC);

      $result->finalize();
      return $ret;
    }

    function addSerie($ownerId, $name, $airdate, $season, $episode, $color)
    {
      // Escaping
      $ownerId = $this->es($ownerId);
      $name = $this->es($name);
      $airdate = $this->es($airdate);
      $season = $this->es($season);
      $episode = $this->es($episode);
      $color = $this->es($color);

      // Prepairing and executing query
      $query = str_replace('\n', "", file_get_contents(ROOT . DS . 'db' . DS . 'serie' . DS . 'addSerie.sql'));
      $query = str_replace(":owner_id", $ownerId, $query);
      $query = str_replace(":name", $name, $query);
      $query = str_replace(":airdate", $airdate, $query);
      $query = str_replace(":season", $season, $query);
      $query = str_replace(":episode", $episode, $query);
      $query = str_replace(":color", $color, $query);

      $ret = $this->query($query);
      if (!$ret)
        return false;

      $ret->finalize();
      return $ret;
    }

    function removeSerie($id)
    {
      // Escaping
      $id = $this->es($id);

      // Prepairing and executing query
      $query = str_replace('\n', "", file_get_contents(ROOT . DS . 'db' . DS . 'serie' . DS . 'removeSerie.sql'));
      $query = str_replace(":id", $id, $query);

      $ret = $this->query($query);
      if (!$ret)
        return false;
      return true;
    }

    function updateSerie($id, $name, $airdate, $season, $episode, $color)
    {
      // Escaping
      $id = $this->es($id);
      $name = $this->es($name);
      $airdate = $this->es($airdate);
      $season = $this->es($season);
      $episode = $this->es($episode);
      $color = $this->es($color);

      // Prepairing and executing query
      $query = str_replace('\n', "", file_get_contents(ROOT . DS . 'db' . DS . 'serie' . DS . 'updateSerie.sql'));
      $query = str_replace(":id", $id, $query);
      $query = str_replace(":name", $name, $query);
      $query = str_replace(":airdate", $airdate, $query);
      $query = str_replace(":season", $season, $query);
      $query = str_replace(":episode", $episode, $query);
      $query = str_replace(":color", $color, $query);

      $ret = $this->query($query);

      if (!$ret)
        return false;

      $ret->finalize();
      return $ret;
    }

    function getSerieOwner($id)
    {
      // Escaping
      $id = $this->es($id);

      // Prepairing and executing query
      $query = str_replace('\n', "", file_get_contents(ROOT . DS . 'db' . DS . 'serie' . DS . 'getSerieOwner.sql'));
      $query = str_replace(":id", $id, $query);

      $result = $this->query($query);

      $ret = $result->fetchArray(SQLITE3_ASSOC);
      if (!$result)
        return false;

      return $ret['OwnerId'];
    }
}
