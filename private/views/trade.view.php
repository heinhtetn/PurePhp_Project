<?php $this->view("includes/header") ?>
<?php $this->view("includes/nav") ?>

    <ul class="nav nav-tabs" style="background-color: gray; font-weight: bold;">
        <li class="nav-item">
            <a class="nav-link px-5 <?=$page_tab == 'sellnow'  || $page_tab == 'sellinventory' ? 'active' : ''?> text-dark" href="<?=ROOT?>/trade?tab=sellnow">Sell Items</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=$page_tab == 'sold' ? 'active' : ''?> px-5 text-dark" href="<?=ROOT?>/trade?tab=sold">Items you have sold</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=$page_tab == 'bought' ? 'active' : ''?> px-5 text-dark" href="<?=ROOT?>/trade?tab=bought">Items you have bought</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=$page_tab == 'selling' ? 'active' : ''?> px-5 text-dark" href="<?=ROOT?>/trade?tab=selling">Items you are selling</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=$page_tab == 'expsell' ? 'active' : ''?> px-5 text-dark" href="<?=ROOT?>/trade?tab=expsell">Expired sales</a>
        </li>
    </ul>

    <?php
        switch($page_tab)
        {
            case 'sellnow':
                include(view_path('sellnow-tab', $error));
                break;
            case 'sellinventory':
                include(view_path('sellinventory-tab', ['error' => $error, 'inven_list' => $inven_list]));
                break;
            case 'sold':                
                include(view_path('sold-tab'));                                   
                break;                           
            case 'bought':
                include(view_path('bought-tab'));
                break;
            case 'selling':
                include(view_path('selling-tab', $rows));
                break;
            case 'expsell':
                include(view_path('expsell-tab'));
                break;
            default :
                echo "Invalid tab";
                break;
        }
    ?>


<?php $this->view("includes/footer") ?>