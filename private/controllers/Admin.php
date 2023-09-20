<?php

class Admin extends Controller
{


    function index()
    {
        if (!Auth::admin_logged_in()) {
            $this->redirect('login');
        }
        $errors = array();

        $sell_details = array();

        $buy_details = array();

        //account table
        $acc = new Acc();

        //request table
        $req = new Accounts();

        //transaction_records table
        $trans = new Transactions();

        $row = $req->query("select * from request where status = 'pending'");
        if ($row == null) {
            $errors['request'] = "No new requests!!!";
        }


        if (count($_POST) > 0) {
            if (isset($_POST)) {
                if (!empty($_POST['sell']) && empty($_POST['buy'])) {
                    $sell_user_id = $_POST['sell'];
                    $sell = new Salerecords();
                    $sell_details = $sell->where('user_id', $sell_user_id);
                    $data['sell_details'] = $sell_details;

                    $this->view('user-sell-list', $data);
                    die;
                } elseif (!empty($_POST['buy']) && empty($_POST['sell'])) {
                    $buy_user_id = $_POST['buy'];
                    $buy = new Buyrecords();
                    $buy_details = $buy->where('user_id', $buy_user_id);
                    $data['buy_details'] = $buy_details;

                    $this->view('user-buy-list', $data);
                    die;
                } elseif (!empty($_POST['ban_id']) && empty($_POST['buy']) && empty($_POST['sell'])) {
                    $ban_id = $_POST['ban_id'];
                    $status = "suspended";
                    $acc->update_acc($ban_id, ['status' => $status]);
                    $this->navigate('accounts');
                    die;
                } elseif ($_POST['reason'] == "unban" && isset($_POST['id'])) {
                    $appeal_id = $_POST['appeal_id'];
                    $user_id = $_POST['id'];
                    $acc_status = "active";
                    $acc_id = $acc->getAccount($user_id);
                    $acc->update_acc($acc_id, ['status' => $acc_status]);
                    $appeal_upd = new Appeal();
                    $appeal_status = "Checked";
                    $appeal_upd->update_appeal($appeal_id, ['status' => $appeal_status]);
                    $this->navigate('user-appeals');
                } elseif ($_POST['reason'] == "review" && isset($_POST['appeal_id'])) {
                    $appeal_id = $_POST['appeal_id'];
                    $appeal_upd = new Appeal();
                    $appeal_status = "Reviewed";
                    $appeal_upd->update_appeal($appeal_id, ['status' => $appeal_status]);
                    $this->navigate('user-appeals');

                } elseif (isset($_POST['status']) && $_POST['status'] == 'approved') {


                    if (strtolower($_POST['reason']) == 'deposit') {
                        $check_user = $acc->where('user_id', $_POST['user_id']);

                        $account_id = $check_user[0]->account_id;

                        if ($check_user == false) {
                            $_POST['acc_status'] = "active";
                            $acc->insert($_POST);
                            $trans->insert($_POST);
                        } else {
                            $bal_upd = $check_user[0]->balance + $_POST['balance'];
                            $acc->update_acc($account_id, ['balance' => $bal_upd]);
                            $trans->insert($_POST);
                        }
                    } elseif (strtolower($_POST['reason']) == 'withdraw') {
                        $check_user = $acc->where('user_id', $_POST['user_id']);

                        $account_id = $check_user[0]->account_id;

                        if ($check_user) {

                            $bal_upd = $check_user[0]->balance - $_POST['balance'];
                            $acc->update_acc($account_id, ['balance' => $bal_upd]);
                            $trans->insert($_POST);
                        }
                    }
                    $request_id = $_POST['req_id'];
                    $req->update_req($request_id, ['status' => $_POST['status']]);
                    $this->navigate('request');
                } elseif (isset($_POST['status']) && $_POST['status'] == 'rejected') {
                    $request_id = $_POST['req_id'];
                    $req->update_req($request_id, ['status' => $_POST['status']]);
                    $this->navigate('request');
                }
            }
        }

        //admin dashboard
        $profit = new Tax();
        $profit_list = $profit->getList();

        //admin profile
        $admin = new Admins();

        $info = $admin->where('id', Auth::getId());

        //user accounts
        $user_acc = $acc->getAllAccounts();

        //appeals
        $appeal = new Appeal();
        $appeal_list = $appeal->getAppeals();

        $data['profit_list'] = $profit_list;

        $data['appeal_list'] = $appeal_list;

        $data['user_acc'] = $user_acc;

        $data['info'] = $info;

        $data['errors'] = $errors;

        $data['rows'] = $row;

        $data['tab'] = isset($_GET['tab']) ? $_GET['tab'] : 'dashboard';

        $this->view('admin', $data);
    }
}
