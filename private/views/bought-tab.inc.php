<div class="container-fluid shadow border" style="max-width: 1000px; margin-top: 100px;">
<div class="p-4">
<?php if(!empty($bought_lists) && is_array($bought_lists)) :?>
    <table class="table table-striped table-hover">
        <tr>
            <th>Item Name</th>
            <th>Price Per Unit</th>
            <th>Amount</th>
            <th>Total</th>
            <th>Date</th>
        </tr>
        <?php foreach($bought_lists as $list) :?>
            <?php include(view_path('bought-list', $list))?>
        <?php endforeach;?>
        
    </table>
<?php else :?>
    <h4 class="text-center">You haven't bought anything</h4>
</div>
<?php endif;?>
    
</div>