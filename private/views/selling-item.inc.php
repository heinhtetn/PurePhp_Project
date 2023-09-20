<tr>
    <td><?=$row->item_name?></td>           
    <td><?=$row->category?></td>           
    <td><?=$row->unit_price?></td>           
    <td><?=$row->amount?></td>           
    <td><?=($row->amount * $row->unit_price)?></td>           
    <td><?=get_date($row->date)?></td>           
    <td><?=$row->duration . ' days'?></td>      
    <td>
        <button class="btn btn-sm btn-secondary cancelButton" data-confirm="true" data-id="<?=$row->item_id?>" type="button">Cancel</button>
    </td>     
</tr>