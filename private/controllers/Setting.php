<?php

class Setting extends Controller
{
    function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $errors = [];

        if(count($_POST) > 0)
        {
            $set = new Settings();
            if($set->validate($_POST))
            {
                $id = Auth::getUser_id();
                $set->update_user($id, $_POST);
                Auth::logout();
                $this->redirect('login');
            }
            else
            {
                $errors = $set->errors;
            }
        }

        $data['errors'] = $errors;

        $this->view('setting', $data);
    }
}