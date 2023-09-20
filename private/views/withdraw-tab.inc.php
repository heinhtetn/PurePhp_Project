<div class="container-fluid border shadow mt-5" style="max-width: 550px;">
    <form action="" method="post" id="depositForm">
        <div class="rounded mx-auto my-5 border" style="width: 100%; max-width: 350px;">
            <div style="padding: 20px;">
                <h2 class="text-center mb-5" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Withdraw</h2>
                <?php if (count($errors) > 0) : ?>
                    <div class="alert alert-warning alert-dismissible fade show p-4" role="alert">
                        <strong>Errors!</strong>
                        <?php foreach ($errors as $error) : ?>
                            <br><span style="color: red;">*</span><?= $error ?>
                        <?php endforeach; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php elseif(count($success) > 0):?>
                    <div class="alert alert-success alert-dismissible fade show p-4" role="alert">
                        <strong>Success!</strong>
                        <br><?=$success['success']?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <input type="hidden" name="withdraw" value="withdraw">
                <input type="text" id="email" name="email" class="form-control mb-4" placeholder="Email" autofocus>
                <input type="text" id="phone" name="phone" class="form-control mb-4" placeholder="Phone: 09---------">
                <input type="number" id="amount" name="balance" class="form-control mb-4" placeholder="Amount">
                <select class="form-select mb-4" name="payment">
                    <option value="">Withdraw Method</option>
                    <option value="kpay">kpay</option>
                    <option value="ayapay">ayapay</option>
                    <option value="cbpay">cbpay</option>
                    <option value="wave">wave</option>
                    <option value="debit_card">debit_card</option>
                    <option value="payPal">payPal</option>
                </select>
                <button class="btn btn-dark float-end" id="depositButton" type="submit">Withdraw</button>
            </div>
        </div>
    </form>
</div>