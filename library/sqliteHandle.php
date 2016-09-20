<?php

class sqliteHandle
{
    protected $dbhandle;

    function __construct($db_filename)
    {
        $this->dbhandle = new SQLite3($db_filename);

        if (!$this->dbhandle)
            die ('Could not connect to db');
    }

    function __destruct()
    {
        $this->dbhandle->close();
    }

    function query($query)
    {
        $result = $this->dbhandle->query($query);
        if (!$result)
        {
            // Issue #1
            die('Could not execute query.');
        }
        return $result;
    }

    function arrayify($result)
    {
      // Arrayification of results
      $retArray = array();
      $inserted = true;
      while ($inserted)
      {
          $inserted = $result->fetchArray(SQLITE3_ASSOC);
          if ($inserted)
          {
              $retArray[] = $inserted;
          }
      }
      return $retArray;
    }
}
