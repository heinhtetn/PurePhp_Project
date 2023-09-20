<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>

<h2 class="text-center mt-5" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Records</h2>
<div class="container-fluid shadow border" style="max-width: 1500px; margin-top: 50px;">
<?php if($rows_sell || $rows_buy) :?>
    <div class="p-5">
        <table class="table table-striped table-hover">
            
            <tr>
                <th>Item-Name</th>
                <th>Unit-Price</th>
                <th>Amount</th>
                <th>Total</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
            <?php if(!empty($rows_buy)) :?>
                <?php foreach ($rows_buy as $row) : ?>
                    <?php include(view_path('record-bought-item', $row))?>
                <?php endforeach;?>
                
            <?php endif;?>
            <?php if(!empty($rows_sell)) :?>
                <?php foreach ($rows_sell as $row) : ?>
                    <?php include(view_path('record-sold-item', $row))?>
                <?php endforeach;?>
            <?php endif;?>
            
        </table>
    </div>
<?php else :?>
    <h4 class="text-center" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Record is empty</h4>
<?php endif;?>

<?php $this->view("includes/footer") ?>