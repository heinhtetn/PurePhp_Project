<div class="d-flex justify-content-center">
    
    <h2 class="text-center mt-5" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Need Money? Sell all out now!</h2>
    <div class="dropdown ms-3 mt-5">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            choose your way
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?=ROOT?>/trade?tab=sellnow">Sell New Items</a></li>
            <li><a class="dropdown-item" href="<?=ROOT?>/trade?tab=sellinventory">Sell From Your Inventory</a></li>
        </ul>
    </div>
</div>

<div class="container-fluid mt-5 border shadow" style="max-width: 1000px;">
    <form action="" method="post">
        <?php if (count($error) > 0) : ?>
            <div class="alert alert-warning alert-dismissible fade show p-4" role="alert">
                <strong>Errors!</strong>
                <?php foreach ($error as $alert) : ?>
                    <br><span style="color: red;">*</span><?= $alert ?>
                <?php endforeach; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="row p-5">

            <div class="col-12 col-md-4 col-lg-4">
                <div class="d-flex">
                    <i class="fa-solid fa-star-of-david mt-2 me-2" style="color: #000000; font-size: 25px;"></i>
                    <input type="text" class="form-control" name="item_name" placeholder="Item-Name">
                </div>

            </div>
            <div class="col-12 col-md-4 col-lg-4">
                <div class="d-flex">
                    <i class="fa-solid fa-star-of-david mt-2 me-2" style="color: #000000; font-size: 25px;"></i>
                    <select class="form-select" name="category">
                        <option <?= get_select('category', '') ?> value="">Category</option>
                        <option <?= get_select('category', 'construction') ?> value="construction">construction</option>
                        <option <?= get_select('category', 'jewelery') ?> value="jewelery">jewelery</option>
                        <option <?= get_select('category', 'poison') ?> value="poison">poison</option>
                        <option <?= get_select('category', 'medicine') ?> value="medicine">medicine</option>
                        <option <?= get_select('category', 'technology') ?> value="technology">technology</option>
                        <option <?= get_select('category', 'edible') ?> value="edible">edible</option>
                        <option <?= get_select('category', 'vehicles') ?> value="vehicles">vehicles</option>
                        <option <?= get_select('category', 'miscellaneous') ?> value="miscellaneous">miscellaneous</option>
                    </select>
                </div>
            </div>


            <div class="col-12 col-md-4 col-lg-4">
                <div class="d-flex">
                    <i class="fa-solid fa-star-of-david mt-2 me-2" style="color: #000000; font-size: 25px;"></i>
                    <input class="form-control" type="text" name="unit_price" placeholder="Price Per Unit">
                </div>

            </div>
        </div>
        <div class="row p-5">
            <div class="col-12 col-md-4 col-lg-4">
                <div class="d-flex">
                    <i class="fa-solid fa-star-of-david mt-2 me-2" style="color: #000000; font-size: 25px;"></i>
                    <input class="form-control" type="number" name="amount" placeholder="Amount">
                </div>

            </div>
            <div class="col-12 col-md-4 col-lg-4" style="margin-top: 3px;">
                <div class="d-flex">
                    <i class="fa-solid fa-star-of-david mt-2 me-2" style="color: #000000; font-size: 25px;"></i>
                    <select class="form-select" name="duration">
                        <option <?= get_select('duration', '') ?> value="">Duration(days)</option>
                        <option <?= get_select('duration', '7') ?> value="7">7</option>
                        <option <?= get_select('duration', '30') ?> value="30">30</option>
                        <option <?= get_select('duration', '180') ?> value="180">180</option>
                    </select>
                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-secondary float-end mt-4" style="font-size: 15px;">Sell <i class="fa-solid fa-up-right-from-square ms-1"></i></button>

    </form>

    

</div>

<p class="text-center mt-3" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">We take 1% tax for every buys and 2% tax for every sales</p>