<?php

class Acc extends Model
{
    protected $table = "accounts";

    protected $allowedColumns = [
        'email',
        'phone',
        'balance',
        'date',
        'user_id',
        'acc_status'
    ];

    function getBalance($id)
    {
        $query = "select balance from accounts where user_id = :user_id";
        $row = $this->query($query, ['user_id' => $id]);
        if($row != null)
        {
            $row = $row[0];
            return $row;
        }
        return null;
    }

    function getAccount($id)
    {
        $query = "select account_id from accounts where user_id = :user_id";
        $row = $this->query($query, ['user_id' => $id]);
        $row = $row[0]->account_id;
        if($row)
        {
            return $row;
        }

        return "account didnt return";
    }

    function getAllAccounts()
    {
        $query = "select * from accounts where acc_status = 'active'";
        $row = $this->query($query);
        if($row)
        {
            return $row;
        }

        return "no accounts";
    }
}