<tr>
    <td><?=$acc->user_id?></td>
    <td><?=$acc->email?></td>
    <td><?=$acc->phone?></td>
    <td><?=$acc->balance?></td>
    <td><?=$acc->account_id?></td>
    <td><?=get_date($acc->date)?></td>
    <td><?=$acc->acc_status?></td>
    <td>
        <button class="btn btn-sm btn-primary sellButton" style="margin-right: 5px;" data-id="<?=$acc->user_id?>" type="button">Sale List</button>
        <button class="btn btn-sm btn-primary buyButton" style="margin-right: 5px;" data-id="<?=$acc->user_id?>" type="button">Buy List</button>
        <button class="btn btn-sm btn-danger banButton" data-confirm="true" data-id="<?=$acc->account_id?>" type="button">Ban</button>
    </td>
</tr>


