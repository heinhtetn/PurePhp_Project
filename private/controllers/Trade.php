<?php

class Trade extends Controller
{
    function index($id = '')
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $errors = array();

        
        if(isset($_GET['tab']) && $_GET['tab'] == 'sellnow')
        {
            if(count($_POST) > 0)
            {
                $sale = new Trades();
                if($sale->validate($_POST))
                {
                    $_POST['date'] = date("Y-m-d H:i:s");
                    $_POST['user_id'] = Auth::getUser_id();

                    $sale->insert($_POST);
                    $this->tab_jump('selling');
                    
                }
                else{
                    $errors = $sale->errors;
                }
            }
        }
        elseif(isset($_GET['tab']) && $_GET['tab'] == 'sellinventory')
        {

            if(count($_POST) > 0)
            {
                $sale_inven = new Inventorysell();
                if($sale_inven->validate($_POST))
                {
                    $user_id = Auth::getUser_id();
                    $_POST['date'] = date("Y-m-d H:i:s");
                    $_POST['user_id'] = $user_id;
                    $item_name = $_POST['item_name'];

                    //insert into trade
                    $trade = new Trades();
                    $trade->insert($_POST);

                    //update inventory
                    
                    $inventory = new Inventories();
                    $amt = $inventory->getAmt($item_name);
                    $amt_upd = $amt[0]->amount - $_POST['amount'];
                    $inventory->update_inventory($item_name,$user_id, ['amount' => $amt_upd]);

                    $this->tab_jump('selling');
                    
                }
                else{
                    $errors = $sale_inven->errors;
                }
            }
        }
        elseif(isset($_GET['tab']) && $_GET['tab'] == 'selling')
        {
            if(count($_POST) > 0)
            {
                $cancel = new Trades();
                $id = $_POST['cancel_id'];
                $cancel->delete_trade($id);
                $this->tab_jump('selling');

            }
        }
        
        

        $trade_list = new Trades();
        $user_id = Auth::getUser_id();
        //user sale list query
        $row = $trade_list->query("select * from trade where user_id = :user_id", ['user_id' => $user_id]);


        //user sold list query
        $sold_rec = new Salerecords();
        $sold_list = $sold_rec->query("select * from trade_record_sell where user_id = :user_id", ['user_id' => $user_id]);

        //user bought list query
        $bought_rec = new Salerecords();
        $bought_list = $bought_rec->query("select * from trade_record_buy where user_id = :user_id", ['user_id' => $user_id]);

        //inventory sell
        $inventory = new Inventories();
        $inven_list = $inventory->getInventory($user_id);
        
        $data['page_tab'] = isset($_GET['tab']) ? $_GET['tab'] : 'sellnow';

        $data['error'] = $errors;

        $data['rows'] = $row;

        $data['sold_lists'] = $sold_list;

        $data['bought_lists'] = $bought_list;

        $data['inven_list'] = $inven_list;



        $this->view('trade', $data);
    }
}