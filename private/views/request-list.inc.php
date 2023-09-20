
<tr>
    <td><?= $row->request_id ?></td>
    <td><?= $row->reason ?></td>
    <td><?= $row->balance ?></td>
    <td><?= $row->email ?></td>
    <td><?= $row->phone ?></td>
    <td><?= ucwords($row->payment) ?></td>
    <td><?= get_date($row->date) ?></td>
    <td><?= $row->status ?></td>
    <td>
        <input type="button" class="btn btn-sm btn-secondary approveButton" onclick="confirmAction('approve' ,<?=$row->request_id?>)" value="Approve">
        <input type="button" class="btn btn-sm btn-danger rejectButton" onclick="confirmAction('reject', <?=$row->request_id?>)" value="Reject">
    </td>
</tr>

<script>
function confirmAction(action, request_id) {
    const confirmationMessage = `Are you sure you want to ${action} this request?`;
    const isConfirmed = window.confirm(confirmationMessage);
    const isPermitted = document.getElementById('adminPermission');

    if (isConfirmed) {
        if (action === 'approve') {
            //email
            const hiddenInputEmail = document.createElement('input');
            hiddenInputEmail.type = "hidden";
            hiddenInputEmail.name = "email";
            hiddenInputEmail.value = '<?=$row->email?>';

            //payment
            const hiddenInputPayment = document.createElement('input');
            hiddenInputPayment.type = "hidden";
            hiddenInputPayment.name = "payment";
            hiddenInputPayment.value = '<?=$row->payment?>';

            //request id
            const hiddenInputReqID = document.createElement('input');
            hiddenInputReqID.type = "hidden";
            hiddenInputReqID.name = "req_id";
            hiddenInputReqID.value = request_id;

            //reason
            const hiddenInputReason = document.createElement('input');
            hiddenInputReason.type = "hidden";
            hiddenInputReason.name = "reason";
            hiddenInputReason.value = '<?=$row->reason?>';

            //user_id
            const hiddenInputUserid = document.createElement('input');
            hiddenInputUserid.type = "hidden";
            hiddenInputUserid.name = "user_id";
            hiddenInputUserid.value = '<?=$row->user_id?>';

            //balance
            const hiddenInputBalance = document.createElement('input');
            hiddenInputBalance.type = "hidden";
            hiddenInputBalance.name = "balance";
            hiddenInputBalance.value = '<?=$row->balance?>';

            //phone
            const hiddenInputPhone = document.createElement('input');
            hiddenInputPhone.type = "hidden";
            hiddenInputPhone.name = "phone";
            hiddenInputPhone.value = '<?=$row->phone?>';

            //date
            const hiddenInputDate = document.createElement('input');
            hiddenInputDate.type = "hidden";
            hiddenInputDate.name = "date";
            hiddenInputDate.value = '<?=date("Y-m-d H:i:s")?>';

            //status
            const hiddenInputStatus = document.createElement('input');
            hiddenInputStatus.type = "hidden";
            hiddenInputStatus.name = "status";
            hiddenInputStatus.value = "approved";

            isPermitted.appendChild(hiddenInputEmail);
            isPermitted.appendChild(hiddenInputUserid);
            isPermitted.appendChild(hiddenInputBalance);
            isPermitted.appendChild(hiddenInputPhone);
            isPermitted.appendChild(hiddenInputDate);
            isPermitted.appendChild(hiddenInputStatus);
            isPermitted.appendChild(hiddenInputReason);
            isPermitted.appendChild(hiddenInputReqID);
            isPermitted.appendChild(hiddenInputPayment);

            isPermitted.submit();
        }
        else
        {
            //status
            const hiddenInputStatus = document.createElement('input');
            hiddenInputStatus.type = "hidden";
            hiddenInputStatus.name = "status";
            hiddenInputStatus.value = "rejected";

            //request id
            const hiddenInputReqID = document.createElement('input');
            hiddenInputReqID.type = "hidden";
            hiddenInputReqID.name = "req_id";
            hiddenInputReqID.value = request_id;

            isPermitted.appendChild(hiddenInputStatus);
            isPermitted.appendChild(hiddenInputReqID);

            isPermitted.submit();
            
        }
    }
}
</script>
