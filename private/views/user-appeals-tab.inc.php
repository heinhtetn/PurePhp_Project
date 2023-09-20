<?php if(!empty($appeal_list) && is_array($appeal_list)) :?>
<form id="appealForm" method="post">
<table class="table table-hover table-striped">
    
    <tr>
        <th>User ID</th>
        <th>Category</th>
        <th>Description</th>
        <th>Email</th>
        <th>Date</th>
        <th></th>
    </tr>
            <input type="hidden" name="id" id="issue_id" value="">
            <input type="hidden" name="reason" id="reasonInput" value="">
            <input type="hidden" name="appeal_id" id="appeal" value="">
        <?php foreach($appeal_list as $list) :?>
            <tr>
            <td><?=$list->user_id?></td>
            <td><?=$list->category?></td>
            <td><?=$list->description?></td>
            <td><?=$list->email?></td>
            <td><?=get_date($list->date)?></td>
            
            <td>
                <?php if($list->category == "ban_appeal") : ?>
                    <button class="btn btn-sm btn-primary unbanButton" type="button" data-confirm="true" data-appeal="<?=$list->appeal_id?>" data-id="<?=$list->user_id?>">Unban</button>

                <?php else :?>
                    <button class="btn btn-sm btn-primary reviewButton" type="button" data-confirm="true" data-appeal="<?=$list->appeal_id?>">Reviewed</button>
                <?php endif;?>
            </td>
            </tr>

        <?php endforeach;?>
    
    
</table>
</form>
        <?php else: ?>
            <h1 class="text-center" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Appeal List is empty</h1>
<?php endif;?>

<script>
    const appealForm = document.getElementById('appealForm');
    const unbanButtons = document.querySelectorAll('.unbanButton');
    const reviewButtons = document.querySelectorAll('.reviewButton');
    const hiddenInputID = document.getElementById('issue_id');
    const hiddenReasonInput = document.getElementById('reasonInput');
    const hiddenAppealInput = document.getElementById('appeal');

    document.addEventListener('DOMContentLoaded', function() {
        unbanButtons.forEach(button => {
            button.addEventListener('click', () => {
                
                const confirmChange = button.getAttribute('data-confirm');
                const issueID = button.getAttribute('data-id');
                const appealID = button.getAttribute('data-appeal');
                if (confirmChange) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, Unban this user!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {   
                            hiddenInputID.value = issueID;
                            hiddenAppealInput.value = appealID;
                            hiddenReasonInput.value = "unban";                   
                            appealForm.submit();
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

    document.addEventListener('DOMContentLoaded', function() {
        reviewButtons.forEach(button => {
            button.addEventListener('click', () => {
                
                const confirmChange = button.getAttribute('data-confirm');
                const appealID = button.getAttribute('data-appeal');
                if (confirmChange) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Mark this appeal as reviewed?',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {   
                            hiddenAppealInput.value = appealID;
                            hiddenReasonInput.value = "review";                   
                            appealForm.submit();
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