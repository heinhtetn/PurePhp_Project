<?php $this->view("includes/header") ?>
<?php $this->view("includes/nav") ?>

<ul class="nav nav-tabs" style="background-color: gray; font-weight: bold;">
    <li class="nav-item">
        <a class="nav-link px-5 <?=$acc_tab == 'myacc' ? 'active' : ''?> text-dark" href="<?=ROOT?>/account?acc_tab=myacc">My account</a>
    </li>
    <li class="nav-item">
        <a class="nav-link px-5 <?=$acc_tab == 'deposit' ? 'active' : ''?> text-dark" href="<?=ROOT?>/account?acc_tab=deposit">Deposit</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?=$acc_tab == 'withdraw' ? 'active' : ''?> px-5 text-dark" href="<?=ROOT?>/account?acc_tab=withdraw">Withdraw</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?=$acc_tab == 'history' ? 'active' : ''?> px-5 text-dark" href="<?=ROOT?>/account?acc_tab=history">History</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?=$acc_tab == 'appeal' ? 'active' : ''?> px-5 text-dark" href="<?=ROOT?>/account?acc_tab=appeal">Appeal</a>
    </li>
</ul>
<?php
    switch($acc_tab)
    {
        case 'myacc':
            include(view_path('myacc-tab', $acc_info));
            break;
        case 'deposit':
            include(view_path('deposit-tab', ['errors' => $errors, 'success' => $success]));
            break;
        case 'withdraw':
            include(view_path('withdraw-tab'));
            break;
        case 'history':                
            include(view_path('history-tab', $history));                                   
            break;                           
        case 'appeal':                
            include(view_path('appeal-tab'));                                   
            break;                           
        default :
            echo "Invalid tab";
            break;
    }
?>



<?php $this->view("includes/footer") ?>