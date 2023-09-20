<?php

class Accounts extends Model
{
    protected $table = 'request';

    protected $allowedColumns = [
        'reason',
        'payment',
        'email',
        'phone',
        'balance',
        'date',
        'user_id',
        'status'
    ];

    function validate($data)
    {
        $this->errors = [];

        $id = Auth::getUser_id();

        //account status
        $acc_status = $this->query("select acc_status from accounts where user_id = :user_id", ['user_id' => $id]);
        if($acc_status != null)
        {
            $acc_status = $acc_status[0]->status;
            if($acc_status == "suspended")
            {
                $this->errors['status'] = "Your account is suspended";
            }
        }
        else{

        }
        
        

        //check empty
        if(empty($data['email']) || empty($data['phone']) || empty($data['balance']) || empty($data['payment']))
        {
            $this->errors['empty'] = "Please fill empty fields";
        }

        //check email
        if(!filter_var($data['email'], FILTER_SANITIZE_EMAIL))
        {
            $this->errors['email'] = "Invalid email"; 
        }

        //check phone
        if(!is_numeric($data['phone']))
        {
            $this->errors['phone'] = "Phone number is not valid";
        }

        //check methods
        $ways = ['kpay', 'ayapay', 'cbpay', 'wave', 'debit_card', 'payPal'];
        if(!in_array($data['payment'], $ways))
        {
            $this->errors['payment'] = "Invalid payment method";
        }

        //check account
        $id = Auth::getUser_id();
        $row = $this->query("select * from accounts where user_id = :user_id", ['user_id' => $id]);
        if($row != null)
        {
            //check email for single user
            if($row[0]->email != $_POST['email'])
            {
                $this->errors['email_mismatch'] = "Your email is incorrect";
            }

            //check phone for single user
            if($row[0]->phone != $_POST['phone'])
            {
                $this->errors['phone_mismatch'] = "Your phone number is incorrect";
            }
        }
        else
        {
            
        }
        

        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;
    }
}