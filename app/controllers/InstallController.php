<?php

class Installcontroller extends Controller
{

    function populateDb()
    {
        $install = new InstallModel;
        $install->populate();
    }

    function addUser()
    {
        $users = new UserModel;
        $this->set('users', $users->getUserNames());
        //show user form
    }

    function userForm()
    {
        // Check post values and populate db
        $users = new UserModel;
        $users->addUser(htmlspecialchars($_POST['name']), hash("sha256", $_POST['pass'] . BACK_HASH_SALT));
    }

}
