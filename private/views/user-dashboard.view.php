<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>
<style>
    h1 {
        font-size: 80px;
        color: black;
    }
    a{
        text-decoration: none;
    }
    .card-header{
        font-weight: bold;
    }
    .card-size{
        min-width: 250px;
    }
</style>
<div class="mt-5"><h2 class="text-center" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"><i>Welcome</i> <?=ucwords(Auth::getFirstname()) . ucwords(Auth::getLastname())?></h2></div>
<div class="container-fluid p-4 shadow mx-auto mt-5" style="max-width: 1000px;">
    <div class="row justify-content-center">
        <div class="card-size col-3 shadow rounded-lg m-4 p-0">
            <a href="<?=ROOT?>/record">
                <div class="card text-dark">
                    <div class="card-header">HISTORY</div>
                    <h1 class="text-center">
                        <i class="fa-solid fa-list"></i>
                    </h1>
                    <div class="card-footer">View trading history</div>
                </div>
            </a>
        </div>

        <div class="card-size col-3 shadow rounded-lg m-4 p-0">
            <a href="<?=ROOT?>/account?acc_tab=deposit">
                <div class="card text-dark">
                    <div class="card-header">DEPOSIT</div>
                    <h1 class="text-center">
                        <i class="fa-solid fa-wallet"></i>
                    </h1>
                    <div class="card-footer">Cash in</div>
                </div>
            </a>
        </div>
        <div class="card-size col-3 shadow rounded-lg m-4 p-0">
            <a href="<?=ROOT?>/account?acc_tab=withdraw">
                <div class="card text-dark">
                    <div class="card-header">WITHDRAW</div>
                    <h1 class="text-center">
                        <i class="fa-solid fa-money-bill-transfer"></i>
                    </h1>
                    <div class="card-footer">Cash out</div>
                </div>
            </a>
        </div>


        <div class="card-size col-3 shadow rounded-lg m-4 p-0">
            <a href="<?=ROOT?>/setting">
                <div class="card text-dark">
                    <div class="card-header">SETTINGS</div>
                    <h1 class="text-center">
                        <i class="fa fa-cogs"></i>
                    </h1>
                    <div class="card-footer">View settings</div>
                </div>
            </a>
        </div>


        <div class="card-size col-3 shadow rounded-lg m-4 p-0">
            <a href="<?=ROOT?>/profile">
                <div class="card text-dark">
                    <div class="card-header">PROFILE</div>
                    <h1 class="text-center">
                        <i class="fa fa-id-card"></i>
                    </h1>
                    <div class="card-footer">View your profile</div>
                </div>
            </a>
        </div>


        <div class="card-size col-3 shadow rounded-lg m-4 p-0">
            <a href="<?=ROOT?>/logout">
                <div class="card text-dark">
                    <div class="card-header">LOGOUT</div>
                    <h1 class="text-center">
                        <i class="fa fa-sign-out-alt"></i>
                    </h1>
                    <div class="card-footer">Logout</div>
                </div>
            </a>
        </div>

    </div>
</div>

<?php $this->view('includes/footer') ?>