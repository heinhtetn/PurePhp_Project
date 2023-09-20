<?php $this->view("includes/header") ?>
<?php $this->view("includes/nav") ?>

<style>
    .trade-text{
        padding-top: 220px;
        font-size: 30px;
    }
    .img{
       margin-top: 30px;
       border-radius: 50%;
    }
    section{
        background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(http://localhost/myphpproject/public/assets/banner.jpg);
        background-size: contain;
        background-position: center;
        height: 80vh;
        background-attachment: fixed;
    }
</style>
<section>
    
</section>
<div class="container-fluid mb-4">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-6">
            <div class="text-center trade-text" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                <p>Trading is even better now!</p>
                <p>Providing you the opportunity to invest</p>
                <p>in more than 100 assets for continuous income</p>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-6">
            <img src="<?=ROOT?>/assets/trade-1.jpg" class="img shadow" style="width: 600px; height: auto; max-height: 600px;" alt="">
        </div>
    </div>
</div>

<?php $this->view("includes/footer") ?>