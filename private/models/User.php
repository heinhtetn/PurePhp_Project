<?php

class User extends Model{

    protected $allowedColumns = [
            'firstname',
            'lastname',
            'username',
            'email',
            'password',
            'reg_date',
            'rank'
    ];

    protected $beforeInsert = [
        'hash_password'
    ];

    public function validate($data)
    {
        $this->errors = array();

        
        //err check firstname
        if((empty($data['firstname']) || !preg_match('/^[a-zA-Z]+$/', $data['firstname'])))
        {
            $this->errors['firstname'] = "Only letters are allowed for firstname without spaces";
        }

        //err check lastname
        if((empty($data['lastname']) || !preg_match('/^[a-zA-Z]+$/', $data['lastname'])))
        {
            $this->errors['lastname'] = "Only letters are allowed for lastname without spaces";
        }

        //email check
        if((empty($data['email'])) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL))
        {
            $this->errors['email'] = "This email is not valid";
        }

        //pwd check
        if((empty($data['password'])) || $data['password'] != $data['password2'])
        {
            $this->errors['password'] = "Passwords do not match";
        }

        //pwd length
        if(strlen($data['password']) < 8)
        {
            $this->errors['password_length'] = "Password must be at least 8 characters";
        }

        //username check
        if($this->where('username', $data['username']))
        {
            $this->errors['username'] = "username is already taken";
        }

        //email registered check
        if($this->where('email', $data['email']))
        {
            $this->errors['email_taken'] = "This email is already registered";
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