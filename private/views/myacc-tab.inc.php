<div><h3 class="text-center mt-5" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">My Account</h3></div>
<div class="container-fluid border shadow" style="max-width: 900px; margin-top: 20px;">
    <div style="padding: 20px; font-size: 20px;">
    <?php if($acc_info) :?>
        <table class="table table-hover">
            <tr>
                <th>Email</th>
                <td>-</td>
                <td><?=$acc_info[0]->email?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td>-</td>
                <td><?=ucwords(Auth::getUsername())?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>-</td>
                <td><?=$acc_info[0]->phone?></td>
            </tr>
            <tr>
                <th>Balance</th>
                <td>-</td>
                <td><?=$acc_info[0]->balance?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td>-</td>
                <td><?=ucfirst($acc_info[0]->acc_status)?></td>
            </tr>
            <tr>
                <th>Date Created</th>
                <td>-</td>
                <td><?=get_date($acc_info[0]->date)?></td>
            </tr>
        </table>

    <?php else :?>
        <h1 class="text-center" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Your market account has not been created yet!</h1>
    <?php endif;?>
    </div>
</div>