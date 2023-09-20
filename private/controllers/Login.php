<?php
class Login extends Controller{
    function index()
    {

        $errors = array();

        if(count($_POST) > 0)
        {
            $user = new User();
            $admin = new Admins();
            if($row = $user->where('username', $_POST['username']))
            {
                $row = $row[0];
                if(password_verify($_POST['password'], $row->password))
                {
                    Auth::authenticate($row);
                    $this->redirect('user_dashboard');
                }
                else
                {
                    $errors['password'] = "Invalid password";
                }
            }

            elseif($row = $admin->where('username', $_POST['username']))
            {
                $row = $row[0];
                if(password_verify($_POST['password'], $row->password))
                {
                    Auth::authenticate($row);
                    $this->redirect('admin');
                }
                else
                {
                    $errors['password'] = "Invalid password";
                }
            }
            else
            {
                $errors['user'] = "User not found";
            }
            
        }

        $this->view('login', [
            'errors' => $errors
        ]);
    }
}