<div class="container-fluid shadow border" style="max-width: 1000px; margin-top: 100px;">
<div class="p-4">
<?php if(!empty($sold_lists) && is_array($sold_lists)) :?>
    <table class="table table-striped table-hover">
        <tr>
            <th>Item Name</th>
            <th>Price Per Unit</th>
            <th>Amount</th>
            <th>Total</th>
            <th>Date</th>
        </tr>
        <?php foreach($sold_lists as $list) :?>
            <?php include(view_path('sold-list', $list))?>
        <?php endforeach;?>
        
    </table>
<?php else :?>
    <h4 class="text-center">You haven't sold anything</h4>
</div>
<?php endif;?>
    
</div>

