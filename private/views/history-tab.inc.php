<h2 class="text-center mt-5" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">History</h2>
<div class="container-fluid shadow border" style="max-width: 1000px; margin-top: 50px;">
<?php if($history) :?>
    <div class="p-5">
        <table class="table table-striped table-hover">
            <tr>
                <th>Amount</th>
                <th>Reason</th>
                <th>Payment</th>
                <th>Date</th>
            </tr>
            <?php foreach ($history as $row) : ?>
                <?php include(view_path('history-item', $row))?>
            <?php endforeach;?>

        </table>
    </div>
<?php else :?>
    <h4 class="text-center">history is empty</h4>
<?php endif;?>