<tr>
    <td><?=$row->item_name?></td>         
    <td><?=$row->category?></td>           
    <td><?=$row->unit_price?></td>           
    <td><?=$row->amount?></td>           
    <td><?=($row->amount * $row->unit_price)?></td>           
    <td><?=get_date($row->date)?></td>           
    <td><?=$row->duration . ' days'?></td>
    <td>
        
    <button class="btn btn-dark" data-id="<?=$row->item_id?>" id="buyButton">Buy<i class="fa-solid fa-cart-shopping" style="color: white;"></i></button>
    </td>
</tr>
