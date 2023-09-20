<?php $this->view("includes/header") ?>
<?php $this->view("includes/nav") ?>

<div class="container-fluid mx-auto" style="max-width: 1000px; margin-top: 100px; border: 1px solid black;">
<h2 class="text-center pt-2"><?=ucwords(Auth::user())?>'s Profile</h2>
<div class="row p-5">
    <div class="col-12 col-md-12 col-lg-4">
        <img src="<?=ASSETS?>/user_profile.png" class="rounded rounded-circle shadow " style="max-width: 230px;" alt="">
    </div>
    <?php if($row) :?>
        <div class="col-12 col-md-12 col-lg-8">
            <div class="">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>First Name:</th>
                        <td><?=ucfirst($row[0]->firstname)?></td>
                    </tr>
                    <tr>
                        <th>Last Name:</th>
                        <td><?=ucfirst($row[0]->lastname)?></td>
                    </tr>
                    <tr>
                        <th>Username:</th>
                        <td><?=$row[0]->username?></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><?=$row[0]->email?></td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td><?=$phone[0]->phone?></td>
                    </tr>
                    <tr>
                        <th>Registered Date:</th>
                        <td><?=get_date($row[0]->reg_date)?></td>
                    </tr>
                </table>
            </div>
            
        </div>
    <?php endif;?>
    <a href="<?=ROOT?>/profile_edit">
        <button class="btn btn-primary float-end">Edit</button>
    </a>
</div>
    
</div>



<?php $this->view("includes/footer") ?>