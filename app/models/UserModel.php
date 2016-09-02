<?php

class UserModel extends sqliteHandle
{
    function __construct()
    {
        parent::__construct(DB_PATH);
    }

    function getUserNames()
    {
        $query = str_replace('\n', "", file_get_contents(ROOT . DS . 'db' . DS . 'userList.sql'));
        $result = $this->query($query);
        $retArrey = array();
        $inserted = true;
        // Arrayification of results
        while ($inserted)
        {
            $inserted = $result->fetchArray(SQLITE3_ASSOC);
            if ($inserted)
            {
                $retArrey[] = $inserted;
            }
        }
        $result->finalize();
        return $retArrey;
    }

    function addUser($name, $pass)
    {
        $stm = str_replace('\n', "", file_get_contents(ROOT . DS . 'db' . DS . 'addUser.sql'));
        $stm = str_replace(":name", $name, $stm);
        $stm = str_replace(":pass", $pass, $stm);
        $result = $this->query($stm);
    }
}
