<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>

<div class="container-fluid">
    <form action="" method="post">
        <div class="rounded mx-auto border" style="width: 100%; max-width: 400px;margin-top: 150px;">
            <div class="p-5">
                <div class="d-flex mb-4">
                    <div class="row">
                        <div class="col-6 col-md-6 col-lg-6 text-dark">
                            <i class="fa fa-globe" style="font-size: 80px;"></i>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                            <h2>LET'S ROLL!!!</h2>
                        </div>
                    </div>
                </div>


                <?php if (count($errors) > 0) : ?>
                    <div class="alert alert-warning alert-dismissible fade show p-4" role="alert">
                        <strong>Errors!</strong>
                        <?php foreach ($errors as $error) : ?>
                            <br><?= $error ?>
                        <?php endforeach; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <input type="text" name="username" value="<?=get_var('username')?>" autofocus class="form-control mb-3" placeholder="Username">
                <input name="password" class="form-control mb-4" type="password" placeholder="Password">
                <div class="pb-3">
                    <button class="btn btn-dark float-end">LOGIN</button>
                </div>
                
                
            </div>
        </div>
    </form>
    <d</div>
    <div class="text-center" style="margin-top: 35px;">
        Doesn't have an account?
        Signup! <a href="<?= ROOT ?>/signup">here</a>
    </div>
</div>

<?php $this->view("includes/footer") ?>