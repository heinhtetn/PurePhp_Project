<?php

class Admin_signup extends Controller
{
    function index()
    {
        $errors = array();
        $admin = new Admins();
        if(count($_POST) > 0)
        {
            if($admin->validate($_POST))
            {
                $_POST['date'] = date("Y-m-d H:i:s");
                $admin->insert($_POST);

                $this->redirect('login');
            }
            else
            {
                $errors = $admin->errors;
            }
  
        }
        
        $data['errors'] = $errors;
        $this->view('admin-signup', $data);
    }
}