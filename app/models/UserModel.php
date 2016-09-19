<?php

class UserModel extends sqliteHandle
{
    function __construct()
    {
        parent::__construct(DB_PATH);
    }

    function getUserNames()
    {
        $query = str_replace('\n', "", file_get_contents(ROOT . DS . 'db' . DS . 'users' . DS . 'userList.sql'));
        $result = $this->query($query);
        if (!$result)
            return array();
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
        $stm = str_replace('\n', "", file_get_contents(ROOT . DS . 'db' . DS . 'users' . DS . 'addUser.sql'));
        $stm = str_replace(":name", $name, $stm);
        $stm = str_replace(":pass", $pass, $stm);
        return $this->query($stm);
    }

    function getPassFromId($id)
    {
        $query = str_replace('\n', "", file_get_contents(ROOT . DS . 'db' . DS . 'users' . DS . 'passFromId.sql'));
        $query = str_replace(":id", $id, $query);
        $result = $this->query($query);
        if (!$result)
            return "";
        $ret = $result->fetchArray(SQLITE3_ASSOC);
        return $ret['pass'];
    }
}
