<?php

class Account extends Controller
{
    
    function index()
    {   
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }
        $errors = array();
        $success = array();

        //withdraw & deposit

        if(count($_POST) > 0)
        {
            $depo = new Accounts();

            if(isset($_POST['deposit']) && $_POST['deposit'] == "deposit")
            {
                
                if($depo->validate($_POST))
                {   
                    $_POST['user_id'] = Auth::getUser_id();
                    $_POST['date'] = date('Y-m-d H:i:s');
                    $_POST['reason'] = "Deposit";
                    $_POST['status'] = "Pending";
                    $success['success'] = "Request for deposit success!Please wait for admin approval";
                    $depo->insert($_POST);

                }
                else
                {
                    $errors = $depo->errors;
                }
            }
            elseif(isset($_POST['withdraw']) && $_POST['withdraw'] == "withdraw")
            {
                if($depo->validate($_POST))
                {   
                    $_POST['user_id'] = Auth::getUser_id();
                    $_POST['date'] = date('Y-m-d H:i:s');
                    $_POST['reason'] = "Withdraw";
                    $_POST['status'] = "Pending";
                    $success['success'] = "Request for withdraw success!Please wait for admin approval";
                    $depo->insert($_POST);

                }
                else
                {
                    $errors = $depo->errors;
                }
            }
            elseif(isset($_POST['appeal']) && $_POST['appeal'] == 'appeal')
            {
                $appeal = new Appeal();
                if($appeal->validate($_POST))
                {
                    $_POST['user_id'] = Auth::getUser_id();
                    $_POST['date'] = date('Y-m-d H:i:s');
                    $_POST['status'] = "pending";
                    $success['success'] = "Appeal submitted successfully!";
                    $appeal->insert($_POST);
                    
                }
                else
                {
                    $errors = $appeal->errors;
                }
            }
            
        }

        //history

        $hist = new Transactions();

        $id = Auth::getUser_id();

        $hist_list = $hist->where('user_id', $id);

        // acc profile

        $acc = new Acc();

        $acc_info = $acc->where('user_id', $id);


        $data['acc_info'] = $acc_info;

        $data['history'] = $hist_list;

        $data['acc_tab'] = isset($_GET['acc_tab']) ? $_GET['acc_tab'] : 'myacc';

        $data['errors'] = $errors;
        
        $data['success'] = $success;

        $this->view('account', $data);
    }
}