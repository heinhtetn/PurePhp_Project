<?php

class Transactions extends Model
{
    protected $table = 'transaction_records';

    protected $allowedColumns = [
        'user_id',
        'balance',
        'payment',
        'reason',
        'date'
    ];
}