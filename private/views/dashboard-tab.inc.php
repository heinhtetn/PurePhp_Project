<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <span class="m-0 " style="font-style: italic;font-size: 30px;">Welcome!</span>
                <span style="font-weight: bolder; font-size: 35px; margin-left: 15px;">
                    <?= strtoupper(Auth::admin()) ?>
                </span>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">Site Profits</h5>
          </div>
          <div class="card-body">
            
            <?php $cur_profit = 0 ?>
            <?php if(!empty($profit_list) && is_array($profit_list)) :?>
              <?php foreach($profit_list as $list) :?>
                <?php $cur_profit += $list->tax_fee ?>
              <?php endforeach;?>
            <h6 class="card-title">current profits = <?=$cur_profit?> mmk</h6>
            <p class="card-text"></p>
              <?php else :?>
                <h6 class="card-title">current profits = 0 mmk</h6>
                <p class="card-text"></p>
            <?php endif;?>
            <a href="<?= ROOT ?>/admin?tab=tax-records" class="btn btn-primary">Check Records</a>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">Admin Signup</h5>
          </div>
          <div class="card-body">
            
            
            <h6 class="card-title">Add new employees</h6>
            <p class="card-text"></p>
            <a href="<?= ROOT ?>/admin_signup" class="btn btn-primary">Add</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-6 -->

      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->