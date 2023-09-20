<?php

class Appeal extends Model
{
    protected $table = 'appeals';

    protected $allowedColumns = [
        'user_id',
        'category',
        'description',
        'email',
        'date',
        'status'
    ];

    function validate($data)
    {
        $this->errors = [];

        //check empty
        if(empty($data['email']) || empty($data['description']) || empty($data['category']))
        {
            $this->errors['empty'] = "Please fill empty inputs";
        }

        //check description count
        if(strlen($data['description']) > 600)
        {
            $this->errors['description'] = "Description should be less than 600 characters";
        }

        //check email
        if(!filter_var($data['email'], FILTER_SANITIZE_EMAIL))
        {
            $this->errors['email'] = "Invalid email"; 
        }

        $id = Auth::getUser_id();
        $row = $this->query("select * from accounts where user_id = :user_id", ['user_id' => $id]);
        if($row == false)
        {
            $this->errors['not_found'] = "Account not found with this email";
        }

        //check email registered
        if($row[0]->email != $_POST['email'])
        {
            $this->errors['email_mismatch'] = "Your email is incorrect";
        }

        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }

    function getAppeals()
    {
        $query = "select * from appeals where status = 'pending'";
        $row = $this->query($query);
        if($row)
        {
            return $row;
        }
        
        return "no appeals";
    }
}