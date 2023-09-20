<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>

<div class="container-fluid">
    <form action="" method="post">
        <div class="rounded mx-auto my-5 border" style="width: 100%; max-width: 450px;">
            <div style="padding: 60px;">
                <h2 class="text-center mb-5">Registration</h2>
                <?php if (count($errors) > 0) : ?>
                    <div class="alert alert-warning alert-dismissible fade show p-4" role="alert">
                        <strong>Errors!</strong>
                        <?php foreach ($errors as $error) : ?>
                            <br><span style="color: red;">*</span><?= $error ?>
                        <?php endforeach; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <input type="text" value="<?= get_var('firstname') ?>" id="firstname" name="firstname" class="form-control mb-4" placeholder="Firstname">
                <input type="text" value="<?= get_var('lastname') ?>" id="lastname" name="lastname" class="form-control mb-4" placeholder="Lastname">
                <input type="text" value="<?= get_var('username') ?>" id="username" name="username" class="form-control mb-4" placeholder="Username">
                <input type="text" value="<?= get_var('email') ?>" id="email" name="email" class="form-control mb-4" placeholder="Email">
                <input type="text" name="password" id="password" class="form-control mb-4" placeholder="Password">
                <input type="text" name="password2" id="password2" class="form-control mb-5" placeholder="Confirm Password">
                <button class="btn btn-dark float-end" type="submit">Register</button>
                <button class="btn btn-dark" type="button" id="cancelButton">Cancel</button>
            </div>

        </div>
    </form>
</div>

<script>
document.getElementById("cancelButton").addEventListener("click", function() {
    document.getElementById("firstname").value = "";
    document.getElementById("lastname").value = "";
    document.getElementById("username").value = "";
    document.getElementById("email").value = "";
    document.getElementById("password").value = "";
    document.getElementById("password2").value = "";
});
</script>

<?php $this->view("includes/footer") ?>
