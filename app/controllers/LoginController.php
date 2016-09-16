<?php

class LoginController extends Controller
{

    function index()
    {
        if (isset($_SESSION['user_id']))
        {
            // return to index;
            return ;
        }
        // form submitted

        if (isset($_POST['user_name']) && isset($_POST['user_pass']))
        {
            $users = new UserModel;

            // check that user exists in database
            $userList = $users->getUserNames();
            $userId = -1;
            foreach ($userList as $key => $user) {
                if ($user['name'] == htmlspecialchars($_POST['user_name']))
                    $userId = $user['id'];
            }
            if ($userId == -1)
            {
                $this->set('error', 'Password or UserName is incorrect');
                return ;
            }
            // check user's password hash
            if (!(hash("sha256", $_POST['user_pass'] . BACK_HASH_SALT) == $users->getPassFromId($userId)))
            {
                $this->set('error', 'Password or username is incorrect');
                return ;
            }
            // success
            $_SESSION['id'] = $userId;
            $_SESSION['name'] = htmlspecialchars($_POST['user_name']);
            $_SESSION['notifs'] = array('Welcome back ' . htmlspecialchars($_POST['user_name']));
            $this->_template->setRedirection(APP_URL);
        }
    }

    function out()
    {
        session_destroy();
        $this->_template->setRedirection(APP_URL . '/login');
    }
}
