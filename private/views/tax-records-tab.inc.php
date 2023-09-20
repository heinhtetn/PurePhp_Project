<table class="table table-hover table-striped">
    <tr>
        <th>Tax ID</th>
        <th>Reason</th>
        <th>Amount</th>
        <th>Date</th>
    </tr>
    <?php if($profit_list) :?>
        <?php foreach($profit_list as $list) :?>
            <tr>
                <td><?=$list->id?></td>
                <td><?=$list->reason?></td>
                <td><?=$list->tax_fee?></td>
                <td><?=get_date($list->date)?></td>
            </tr>
        <?php endforeach;?> 
    <?php endif;?>
</table>