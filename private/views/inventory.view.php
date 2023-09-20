<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>

<h2 class="text-center mt-5" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Inventory</h2>
<div class="container-fluid shadow border" style="max-width: 1200px; margin-top: 50px;">
<?php if($rows) :?>
    <div class="p-5">
        <table class="table table-striped table-hover">
            
            <tr>
                <th>Item-Name</th>
                <th>Amount</th>
            </tr>
            <?php foreach ($rows as $row) : ?>
                <?php include(view_path('inventory-item', $row))?>
            <?php endforeach;?>
            
        </table>
    </div>
<?php else :?>
    <h4 class="text-center" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Inventory is empty</h4>
<?php endif;?>



<?php $this->view("includes/footer") ?>