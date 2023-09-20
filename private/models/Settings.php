<?php

class Settings extends Model
{
    protected $table = 'users';

    protected $allowedColumns = [
        'password'
    ];

    protected $beforeUpdate = [
        'hash_password'
    ];
    
    function validate($data)
    {
        $this->errors = [];

        //password check
        $user = new User();
        $id = Auth::getUser_id();
        $password = $user->where('user_id', $id);
        $password = $password[0];
        if(!password_verify($data['old_password'], $password->password))
        {
            $this->errors['password'] = "Current password is incorrect";
        }
        //new password check
        if($data['password'] != $data['password2'])
        {
            $this->errors['pwd_mismatch'] = "New password and confirm password do not match";
        }

        //password length
        if(strlen($data['password']) < 8)
        {
            $this->errors['pwd_length'] = "Password must be at least 8 characters";
        }

        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }
    public function hash_password($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        return $data;
    }
}