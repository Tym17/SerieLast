<?php

class InstallModel extends sqliteHandle
{

    function __construct()
    {
        parent::__construct(DB_PATH);
    }

    function populate()
    {
        $stm = str_replace('\n', "", file_get_contents(ROOT . DS . 'db' . DS . 'populateDb.sql'));
        $result = $this->dbhandle->exec($stm);

        if (!$result)
          return false;

        return $result;
    }

}
