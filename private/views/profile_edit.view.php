<?php $this->view("includes/header") ?>
<?php $this->view("includes/nav") ?>
<div class="container-fluid border shadow" style="max-width: 450px; margin-top: 100px;">
    <h3 class="text-center mt-5">Edit</h3>
    <?php if(count($errors) > 0) :?>
        <div class="alert alert-warning alert-dismissible fade show p-4" role="alert">
            <strong>Errors!</strong>
            <?php foreach ($errors as $error) : ?>
                <br><span style="color: red;">*</span><?= $error ?>
            <?php endforeach; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif;?>
    <form action="" id="profileEditForm" method="post">
        <?php if($user_info && $acc_info) :?>
            <div class="row p-5">
                <label for="firstname">Firstname</label>
                <input class="form-control mb-4" type="text" name="firstname" value="<?=$user_info->firstname?>">                
                
                <label for="lastname">Lastname</label>
                <input class="form-control mb-4" type="text" name="lastname" value="<?=$user_info->lastname?>">
                
                <label for="firstname">Email</label>
                <input class="form-control mb-4" type="text" name="email" value="<?=$user_info->email?>">                
                
                <label for="lastname">Phone</label>
                <input class="form-control mb-2" type="text" name="phone" value="<?=$acc_info->phone?>" placeholder="+959-------">
            </div>
            <button class="btn btn-secondary float-end mt-3" data-confirm="true" type="submit">Save</button>
        <?php endif ?>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const profileEditForm = document.getElementById('profileEditForm');

        profileEditForm.addEventListener('submit', function(event) {
            event.preventDefault(); 

            
            const confirmChange = profileEditForm.querySelector('[data-confirm]');
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
                        profileEditForm.submit();
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