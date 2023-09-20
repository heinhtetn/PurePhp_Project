<?php

class User_dashboard extends Controller
{
    function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }
        if(Auth::logged_in() && Auth::getRank() == 'user')
        {
            $this->view('user-dashboard');
        }

       
    }
}
   