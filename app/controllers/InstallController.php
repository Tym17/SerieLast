<?php

class Installcontroller extends Controller
{

    function index()
    {
      // Prevent anybody to access Install menu if app is installed
        if (APP_INSTALLED)
        {
          $this->_template->setRedirection(APP_URL);
          return ;
        }
    }

    function populateDb()
    {
        // Prevent anybody to access Install menu if app is installed
        if (APP_INSTALLED)
        {
          $this->_template->setRedirection(APP_URL);
          return ;
        }

        // Proceed
        $install = new InstallModel;
        if ($install->populate())
        {
          $this->set('success', 'Database is cleared/Populated');
        }
        else
        {
          $this->set('error', 'Something went wrong !');
        }
    }

    function addUser()
    {
        // Prevent anybody to access Install menu if app is installed
        if (APP_INSTALLED)
        {
          $this->_template->setRedirection(APP_URL);
          return ;
        }
        
        // Check post values and populate db
        if (isset($_POST['name']) && isset($_POST['pass']))
        {
            $newName = htmlspecialchars($_POST['name']);

            // Username lenght check
            if (strlen($newName) == 0)
            {
                $this->set('error', 'User Name needs to be at least 1 character long');
                return ;
            }

            // Username uniqueness check
            $user = new UserModel;
            $uNames = $user->getUserNames();

            $alreadyPresent = false;
            foreach ($uNames as $key => $value) {
                if ($value['name'] == $newName)
                    $alreadyPresent = true;
            }

            if (!$alreadyPresent)
            {
                // success, lets add it to the database and inform the user
                $user->addUser($newName, hash("sha256", $_POST['pass'] . BACK_HASH_SALT));
                $this->set('success', 'Added user <strong>' . $newName . '</strong> to SerieLast.');
            }
            else {
                $this->set('error', 'This name is already used');
            }
        }
    }

}
