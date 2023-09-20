<div class="container-fluid border shadow mt-5" style="max-width: 550px;">
    <form action="" method="post" id="depositForm">
        <div class="rounded mx-auto my-5 border" style="width: 100%; max-width: 350px;">
            <div style="padding: 20px;">
                <h2 class="text-center mb-5" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Appeal</h2>
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
                <input type="hidden" name="appeal" value="appeal">
                <input type="text" id="email" name="email" class="form-control mb-4" placeholder="Email" autofocus>
                <select class="form-select mb-4" name="category">
                    <option value="">Select Category</option>
                    <option value="ban_appeal">Ban Appeal</option>
                    <option value="general_inquiry">General Inquiry</option>
                    <option value="report">Report</option>
                </select>
                <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Description"></textarea>
                <button class="btn btn-dark float-end mt-3" type="submit">Submit</button>
            </div>
        </div>
    </form>
</div>