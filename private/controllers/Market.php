<?php

class Market extends Controller
{
    function index()
    {

        $errors = array();

        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $user_id = Auth::getUser_id();
        $market_list = new Trades();
        $rows = $market_list->query("select * from trade where user_id != :user_id and amount != 0", ['user_id' => $user_id]);
        $itemMap = [];
        if($rows == null)
        {
            
        }
        else
        {
            foreach($rows as $row)
            {
                $itemMap[$row->item_id] = $row->item_name;
            }
        }

        $results = [];
    
        $buy = new Buy();

        $buy_errors = array();

        if(isset($_POST['buy']))
        { 
            if(count($_POST) > 0)
            {

                $item_id = $_POST['id'];
                $item_name = $_POST['item_name'];
                $amount = $_POST['amount'];
                
                $unit_price = $buy->getUnitPrice($item_id);

                print_r($unit_price);

                $_POST['unit_price'] = $unit_price;
                
                $acc = new Acc();

                print_r($buy->validate($_POST));

                if($buy->validate($_POST))
                {     
                    
                    // amount update       
                    $amt = $buy->query("select amount from trade where item_id = :item_id",['item_id' => $item_id]);

                    $amt_upd = doubleval($amt[0]->amount) - doubleval($amount);

                    $buy->update_market($item_id, ['amount' => $amt_upd]);

                    //insert into records
                    $buyer_id = Auth::getUser_id();
                    $seller_id = $buy->getSellerID($item_id);
                    $date = date("Y-m-d H:i:s");
                    $records = new Records();
                    $records->insert([
                        'item_id' => $item_id,
                        'buyer_id' => $buyer_id,
                        'seller_id' => $seller_id,
                        'item_name' => $item_name,
                        'amount' =>$amount,
                        'unit_price' => $unit_price,
                        'date' => $date
                    ]);

                    //insert into inventory
                    $inventory = new Inventories();
                    $check_item = $inventory->getItem($item_name, $buyer_id);
                    
                    
                    if($check_item == null){
                        $inventory->insert([
                            'item_name' => $item_name,
                            'user_id' => $buyer_id,
                            'amount' => $amount
                        ]);
                        
                    }
                    else
                    {
                        $inventory_amt_upd = $amount + $check_item[0]->amount;
                        $inventory->update_inventory($item_name, $buyer_id, ['amount' => $inventory_amt_upd]);
                    }
                    

                    //insert into buy
                    $rec_buy = new Buyrecords();
                    $rec_buy->insert([
                        'item_name' => $item_name,
                        'amount' => $amount,
                        'unit_price' => $unit_price,
                        'user_id' => $buyer_id,
                        'date' => $date
                    ]);

                    //insert into sell
                    $rec_sell = new Salerecords();
                    $rec_sell->insert([
                        'item_name' => $item_name,
                        'amount' => $amount,
                        'unit_price' => $unit_price,
                        'user_id' => $seller_id,
                        'date' => $date
                    ]);

                    //buyer tax
                    $buy_tax = (doubleval($_POST['amount']) * doubleval($_POST['unit_price'])) * 0.01;
                    $tax = new Tax();
                    $buy_reason = "buy";
                    $tax->insert([
                        'reason' => $buy_reason,
                        'tax_fee' => $buy_tax,
                        'user_id' => $buyer_id,
                        'date' => $date
                    ]);

                    //buyer balance update
                    $buyer_bal = $acc->getBalance($buyer_id);
                    $buyer_bal_upd = doubleval($buyer_bal->balance) - ((doubleval($_POST['amount']) * doubleval($_POST['unit_price'])) + $buy_tax);
                    $buyer_acc_id = $acc->getAccount($buyer_id);
                    $acc->update_acc($buyer_acc_id, ['balance' => $buyer_bal_upd]);

                    
                    //seller tax
                    $sell_tax = (doubleval($_POST['amount']) * doubleval($_POST['unit_price'])) * 0.02;
                    $sell_reason = "sell";
                    $tax->insert([
                        'reason' => $sell_reason,
                        'tax_fee' => $sell_tax,
                        'user_id' => $seller_id,
                        'date' => $date
                    ]);

                    //seller balance update
                    $seller_bal = $acc->getBalance($seller_id);
                    $seller_bal_upd = (doubleval($seller_bal->balance) + (doubleval($_POST['amount']) * doubleval($_POST['unit_price']))) - $sell_tax;
                    $seller_acc_id = $acc->getAccount($seller_id);
                    $acc->update_acc($seller_acc_id, ['balance' => $seller_bal_upd]);

                    

                    $this->redirect('inventory');
                }
                else
                {
                    $buy_errors = $buy->errors;
                }
            
            }
            
            
        }
        elseif(isset($_POST['search']))
        {
            if(count($_POST) > 0)
            {
                if(trim($_POST['item_name']) != "")
                {
                    $trade = new Trades();
                    $item_name = "%" . trim($_POST['item_name']) . "%";
                    $query = "select * from trade where item_name like :item_name and user_id != :user_id";
                    $results = $trade->query($query, ['item_name' => $item_name, 'user_id' => $user_id]);
                }
            }
        }
        
        $this->view('market',[
            'rows' => $rows,
            'itemMap' => $itemMap,
            'results' => $results,
            'errors' => $buy_errors
        ]);
    
    }
}