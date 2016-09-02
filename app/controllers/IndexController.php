<?php

class IndexController extends Controller
{

    function index()
    {
        if (!isset($_SESSION['user_id']))
        {
            // fall back on login controller
            return ;
        }
    }
}
