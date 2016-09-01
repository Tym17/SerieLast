<?php

class sqliteHandle
{

    function __construct($db_filename)
    {
        $this->dbhandle = sqlite_open($db_filename, 0666, $error);

        if (!$this->dbhandle)
            die ($error);
    }

    function __destruct()
    {
        sqlite_close($this->dbhandle);
    }

    /*
    ** escape potentially dangerous characters
    */
    function e($str)
    {
        return sqlite_escape_string($str);
    }

    function query($query)
    {
        $result = sqlite_query($this->dbhandle, $query);
        if (!$result)
            die('Could not execute query.');
        return $result;
    }

    function exec($statement)
    {
        return sqlite_exec($this->dbhandle, $statement);
    }
}
