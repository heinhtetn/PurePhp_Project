<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>
<p class="text-center mt-3" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">We take 1% tax for every buys and 2% tax for every sales</p>
<h2 class="text-center mt-5" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Market</h2>

<div class="container-fluid shadow border" style="max-width: 1500px; margin-top: 50px;">
<form class="d-flex float-end mt-3 p-4" role="search" method="post">
    <input class="form-control me-2 " name="item_name" style="max-width: 200px;" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-secondary" name="search" type="submit">Search</button>
</form>
<?php if(empty($results)) :?>
    <?php if($rows) :?>
    <div class="p-5">
    <?php if (count($errors) > 0) : ?>
        <div class="alert alert-warning alert-dismissible fade show p-4" role="alert" style="max-width: 500px;">
            <strong>Errors!</strong>
            <?php foreach ($errors as $error) : ?>
                <br><span style="color: red;">*</span><?= $error ?>
            <?php endforeach; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
        <table class="table table-striped table-hover">
            
            <tr>
                <th>Item-Name</th>
                <th>Category</th>
                <th>Unit-Price</th>
                <th>Amount</th>
                <th>Total</th>
                <th>Date</th>
                <th>Duration</th>
                <th></th>
            </tr>
            <?php foreach ($rows as $row) : ?>
                <?php include(view_path('market-item', $row))?>
            <?php endforeach;?>
            
            <form id="purchaseForm" action="" method="post">

                <div class="d-flex mb-4">
                    <input type="hidden" id="item_id" name="id" value="">
                    <input type="hidden" id="action" name="buy" value="">
                    <input type="text" id="name" class="form-control" style="max-width: 200px;" name="item_name" value="" disabled>
                    <input type="number" name="amount" placeholder="Amount" id="amount" class="purchase form-control" style="max-width: 200px;">
                    <button id="purchaseButton" type="submit" class="btn btn-sm btn-dark text-white">Confirm</button>
                    <button type="button" id="closeButton" class="btn btn-sm btn-close mt-2 ms-3"></button>
                </div>
                
            </form>
        </table>
    </div>
    <?php else :?>
        <h4 class="text-center p-5" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Nothing to buy</h4>
    <?php endif;?>
<?php else :?>
    <div class="p-5">
        <table class="table table-striped table-hover">
            
            <tr>
                <th>Item-Name</th>
                <th>Category</th>
                <th>Unit-Price</th>
                <th>Amount</th>
                <th>Total</th>
                <th>Date</th>
                <th>Duration</th>
                <th></th>
            </tr>
            <?php foreach ($results as $row) : ?>
                <?php include(view_path('market-item', $row))?>
            <?php endforeach;?>
            
            <form id="purchaseForm" action="" method="post">

                <div class="d-flex mb-4">
                    <input type="hidden" id="item_id" name="id" value="">
                    <input type="hidden" id="action" name="buy" value="">
                    <input type="text" id="name" class="form-control" style="max-width: 200px;" name="item_name" value="" disabled>
                    <input type="number" name="amount" placeholder="Amount" id="amount" class="purchase form-control" style="max-width: 200px;">
                    <button id="purchaseButton" type="button" class="btn btn-sm btn-dark text-white">Buy</button>
                    <button type="button" id="closeButton" class="btn btn-sm btn-close mt-2 ms-3"></button>
                </div>
                
            </form>
        </table>
    </div>
<?php endif;?>
    
</div>

<script>

    const itemNameMap = <?=json_encode($itemMap)?>;

    const buyButtons = document.querySelectorAll('#buyButton');
    const actionInput = document.getElementById('action');
    const amountInput = document.getElementById('amount');
    const purchaseForm = document.getElementById('purchaseForm');
    const purchaseButton = document.getElementById('purchaseButton');
    const nameInput = document.getElementById('name');
    const inputID = document.getElementById('item_id');
    const closeButton = document.getElementById('closeButton');

    buyButtons.forEach((buyButton) => {
        
   
        buyButton.addEventListener('click', (event) => {
        
            const itemID = buyButton.getAttribute('data-id');

            const itemName = itemNameMap[itemID];

            nameInput.value = itemName;
            inputID.value = itemID;

            amountInput.style.display = 'block';
            purchaseForm.style.display = 'block';
            purchaseButton.style.display = 'block';
            nameInput.style.display = 'block';
            closeButton.style.display = 'block';

        });
    });

    purchaseButton.addEventListener('click', (event) => {
        nameInput.disabled = false;
        actionInput.value = "buy";
        purchaseForm.submit();
    });

    closeButton.addEventListener('click', (event) => {
        amountInput.style.display = 'none';
        purchaseForm.style.display = 'none';
        purchaseButton.style.display = 'none';
        nameInput.style.display = 'none';
        closeButton.style.display = 'none';
    });
</script>

<?php $this->view("includes/footer") ?>