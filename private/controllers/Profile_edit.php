<?php

class Profile_edit extends Controller
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
            $edit = new Edit();
            if($edit->validate($_POST))
            {
                $id = Auth::getUser_id();
                $phone = $_POST['phone'];
                $edit->update_user($id, $_POST);
                $edit->query("update accounts set phone = {$phone} where user_id = :user_id", ['user_id' => $id]);
                $this->redirect('profile');
            }
            else
            {
                $errors = $edit->errors;
            }
        }

        $id = Auth::getUser_id();
        //user table
        $user = new User();

        $user_info = $user->where('user_id', $id);

        $user_info = $user_info[0];

        //account table
        $acc = new Acc();

        $acc_info = $acc->where('user_id', $id);

        $acc_info = $acc_info[0];

        $data['user_info'] = $user_info;
        $data['acc_info'] = $acc_info;
        $data['errors'] = $errors;

        $this->view('profile_edit', $data);
    }
}