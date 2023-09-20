<tr>
    <td><?=$row->item_name?></td>                   
    <td><?=$row->unit_price?></td>           
    <td><?=$row->amount?></td>           
    <td><?=($row->amount * $row->unit_price)?></td>           
    <td><?=get_date($row->date)?></td>
    <td><?=strtoupper('bought')?></td>          
</tr>