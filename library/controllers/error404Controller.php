<?php

class error404Controller extends Controller
{
    function error($params)
    {
        $this->set('params', $params);
    }
}
