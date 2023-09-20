<?php $this->view("includes/header") ?>
<?php $this->view("includes/nav") ?>
<div class="container-fluid border shadow" style="max-width: 450px; margin-top: 100px;">
    <h3 class="text-center mt-5">Change Password</h3>
    <?php if (count($errors) > 0) : ?>
        <div class="alert alert-warning alert-dismissible fade show p-4" role="alert">
            <strong>Errors!</strong>
            <?php foreach ($errors as $error) : ?>
                <br><span style="color: red;">*</span><?= $error ?>
            <?php endforeach; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <form action="" id="passwordChangeForm" method="post">

        <div class="row p-5">
            <label for="password">Current Password</label>
            <input class="form-control mb-4" type="text" name="old_password">

            <label for="new_password">New Password</label>
            <input class="form-control mb-4" type="text" name="password">

            <label for="new_password2">Confirm new password</label>
            <input class="form-control mb-4" type="text" name="password2">
        </div>
        <button class="btn btn-secondary float-end mt-3" data-confirm="true" type="submit">Change</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordChangeForm = document.getElementById('passwordChangeForm');

        passwordChangeForm.addEventListener('submit', function(event) {
            event.preventDefault(); 

            
            const confirmChange = passwordChangeForm.querySelector('[data-confirm]');
            if (confirmChange) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, change it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {                        
                        passwordChangeForm.submit();
                    } else {
                       Swal.fire({
                        title: 'Oops!',
                        text: "You haven't changed anything!",
                        icon: 'warning',
                        reverseButtons: true
                       })
                    }
                });
            }
        });
    });
</script>


<?php $this->view("includes/footer") ?>