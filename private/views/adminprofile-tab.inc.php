
<div><h3 class="text-center mt-5" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Profile</h3></div>
<div class="container-fluid border shadow" style="max-width: 900px; margin-top: 20px;">
    <div style="padding: 20px; font-size: 20px;">
    <?php if($info) :?>
        <table class="table">
            <tr>
                <th>Name</th>
                <td>-</td>
                <td><?=$info[0]->firstname . ' ' . $info[0]->lastname?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td>-</td>
                <td><?=ucwords($info[0]->username)?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td>-</td>
                <td><?=$info[0]->email?></td>
            </tr>
            <tr>
                <th>Rank</th>
                <td>-</td>
                <td><?=ucwords(str_replace('_', ' ', $info[0]->rank))?></td>
            </tr>
            <tr>
                <th>Date</th>
                <td>-</td>
                <td><?=get_date($info[0]->date)?></td>
            </tr>
        </table>
    <?php endif;?>
    </div>
</div>