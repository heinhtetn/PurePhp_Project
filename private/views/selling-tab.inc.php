<h2 class="text-center mt-5" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Your currently selling items</h2>
<div class="container-fluid shadow border" style="max-width: 1500px; margin-top: 50px;">
<?php if($rows) :?>
    <form action="" id="cancelForm" method="post">
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
            <input type="hidden" name="cancel_id" value="" id="item_id">
            <?php foreach ($rows as $row) : ?>
                <?php include(view_path('selling-item', $row))?>
            <?php endforeach;?>

        </table>
    </div>
    </form>
<?php else :?>
    <h4 class="text-center">You are not selling anything currently</h4>
<?php endif;?>
    
</div>

<script>
    const cancelForm = document.getElementById('cancelForm');
    const cancelButtons = document.querySelectorAll('.cancelButton');
    const hiddenInputItemID = document.getElementById('item_id');

    document.addEventListener('DOMContentLoaded', function() {
        cancelButtons.forEach(button => {
            button.addEventListener('click', () => {
                
                const confirmChange = button.getAttribute('data-confirm');
                const itemID = button.getAttribute('data-id');
                if (confirmChange) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, Cancel this trade!',
                        cancelButtonText: 'No, I dont!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {   
                            hiddenInputItemID.value = itemID;                  
                            cancelForm.submit();
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