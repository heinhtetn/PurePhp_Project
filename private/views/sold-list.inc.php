<tr>
    <td><?=$list->item_name?></td>                    
    <td><?=$list->unit_price?></td>           
    <td><?=$list->amount?></td>           
    <td><?=($list->amount * $list->unit_price)?></td>           
    <td><?=get_date($list->date)?></td>                 
</tr>