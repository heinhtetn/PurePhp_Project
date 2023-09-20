<?php

class Tax extends Model
{
    protected $table = 'tax';

    protected $allowedColumns = [
        'reason',
        'tax_fee',
        'user_id',
        'date'
    ];

    function getList()
    {
        $query = "select * from tax";
        $row = $this->query($query);
        if($row)
        {
            return $row;
        }
        return "nothing from tax";
    }
}