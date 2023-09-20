<!-- /.content -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <form id="userAccounts" action="" method="post">
            <table class="table">
                <tr>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Balance</th>
                    <th>Account ID</th>
                    <th>Account created date</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            <input type="hidden" id="userID_sell" name="sell" value="">
            <input type="hidden" id="userID_buy" name="buy" value="">
            <input type="hidden" id="status_id" name="ban_id" value="">
            <?php if ($user_acc) : ?>
                <?php foreach ($user_acc as $acc) : ?>
                    <?php include(view_path('accounts-list', $acc)) ?>
                <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </form>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    const accountsForm = document.getElementById('userAccounts');
    const sellButtons = document.querySelectorAll('.sellButton');
    const buyButtons = document.querySelectorAll('.buyButton');
    const banButtons = document.querySelectorAll('.banButton');
    const userIdInputSell = document.getElementById('userID_sell');
    const userIdInputBuy = document.getElementById('userID_buy');
    const status = document.getElementById('status_id');
 
    sellButtons.forEach(button => {
        button.addEventListener('click', () => {
            const userID = button.getAttribute('data-id');
            userIdInputSell.value = userID;
            accountsForm.submit();
        })
    });

    buyButtons.forEach(button => {
        button.addEventListener('click', () => {
            const userID = button.getAttribute('data-id');
            userIdInputBuy.value = userID;
            accountsForm.submit();
        })
    });
    document.addEventListener('DOMContentLoaded', function() {
        banButtons.forEach(button => {
            button.addEventListener('click', () => {
                
                const confirmChange = button.getAttribute('data-confirm');
                const banID = button.getAttribute('data-id');
                if (confirmChange) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, ban this user!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {   
                            status_id.value = banID;                     
                            accountsForm.submit();
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
            })
        });
    });
</script>
