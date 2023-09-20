<?php

class Signup extends Controller {
    function index()
    {
        if(Auth::logged_in())
        {
            $this->redirect('user_dashboard');
        }

        $errors = array();
        if(count($_POST) > 0)
        {
            $user = new User();

            if($user->validate($_POST))
            {
                $_POST['reg_date'] = date("Y-m-d H:i:s");
                $_POST['rank'] = "user";

                $user->insert($_POST);
                $this->redirect('user_dashboard');
            }
            else
            {
                $errors = $user->errors;
            }
        }
        $this->view('signup', [
            'errors' => $errors
        ]);
    }
}