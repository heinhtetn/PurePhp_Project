<?php

class Record extends Controller
{
    function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }
        $id = Auth::getUser_id();
        $record_buy = new Buyrecords();
        $record_sell = new Salerecords();
        $row_buy = $record_buy->where('user_id', $id);
        $row_sell = $record_sell->where('user_id', $id);

        $this->view('record', [
            'rows_buy' => $row_buy,
            'rows_sell' => $row_sell
        ]);
    }
}