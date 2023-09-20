<?php

 class Edit extends Model
{
    protected $table = 'users';

    protected $allowedColumns = [
        'firstname',
        'lastname',
        'email'
    ];

    function validate($data)
    {
        $this->errors = [];

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

        //phone check
        if(!is_numeric($data['phone']))
        {
            $this->errors['phone'] = "Phone number is not valid";
        }

        if(count($this->errors) == 0)
        {
            return true;
        }
        
        return false;
    }
}