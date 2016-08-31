<?php

class error404Controller extends Controller
{
    function index($params)
    {
        $this->set('params', $params);
    }
}
