<?php

class Installcontroller extends Controller
{

    function populateDb()
    {
        $install = new InstallModel;
        $this->set('ok', $install->populate());
    }

    function addUser()
    {
        echo "show user form";
    }

    function userForm()
    {
        // Check post values and populate db
    }

}
