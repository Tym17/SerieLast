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
            return false;
        }
        return $result;
    }

    function arrayify($result)
    {
      // Arrayification of results
      $retArray = array();
      $inserted = true;
      // While there is items to be inserted
      while ($inserted)
      {
          $inserted = $result->fetchArray(SQLITE3_ASSOC);
          if ($inserted)
          {
              // An item has been fetched

              $retArray[] = $inserted;
          }
      }
      return $retArray;
    }

    // Escape malicious characters
    function es($str)
    {
      $str = htmlspecialchars($str);
      $str = str_replace("'", "''", $str);
      return $str;
    }
}
