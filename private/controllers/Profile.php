<?php

class Profile extends Controller
{
    function index($id = '')
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }
        $user = new User();

        $row = $user->where('user_id', Auth::getUser_id());

        $acc = new Acc();

        $phone = $acc->where('user_id', Auth::getUser_id());

        $data['row'] = $row;

        $data['phone'] = $phone;

        $this->view('profile', $data);
    }

    
}