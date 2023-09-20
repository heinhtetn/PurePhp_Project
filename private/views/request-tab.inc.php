<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <form id="adminPermission" action="" method="post">
      <table class="table">
        <tr>
          <th>Request ID</th>
          <th>Reason</th>
          <th>Amount</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Payment Method</th>
          <th>Date</th>
          <th>Status</th>
          <th></th>
        </tr>
        <?php if ($rows) : ?>
          <?php foreach ($rows as $row) : ?>
            <?php include(view_path('request-list', $row)) ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </table>
      <?php if($errors) :?>
        <h1 class="text-center" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; margin-top: 100px;"><?=$errors['request']?></h1>
      <?php endif;?>

    </form>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->