<?php

class Trades extends Model
{
    protected $table = 'trade';

    protected $allowedColumns = [
        'item_name',
        'category',
        'unit_price',
        'amount',
        'date',
        'user_id',
        'duration'
    ];

    public function validate($data)
    {
        $this->errors = array();
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
        else
        {
            $this->errors['create'] = "You need to first deposit 5000 to start selling";
        }
        

        //check name
        if(empty($data['item_name']) || !preg_match('/^[a-z A-Z]+$/', $data['item_name']))
        {
            $this->errors['item_name'] = "Item name should be only letters";
        }

        //check category
        $category = ['construction', 'jewelery','poison','medicine', 'technology', 'edible', 'vehicles','miscellaneous'];
        if(empty($data['category']) || !in_array($data['category'], $category))
        {
            $this->errors['category'] = "Invalid or empty category";
        }
        //unit price check
        if(!preg_match('/^[0-9]*(\.[0-9]+)?$/', $data['unit_price']))
        {
            $this->errors['unit_price'] = "Unit price must be digits or decimals stupid!";
        }

        //empty fields
        if(empty($data['unit_price']) || empty($data['amount']) || empty($data['duration']))
        {
            $this->errors['empty_fields'] = "Please fill empty fields";
        }

        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;
    }
}