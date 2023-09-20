<nav class="navbar navbar-expand-lg" style="background-color: black;">
    <?php echo Auth::logged_in() ?>
    <div class="container-fluid">
        <a class="navbar-brand ms-3  text-white" href="#">
            <i class="fa fa-globe"></i>
            Trading Lt.D
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="row row-reverse">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item me-5">
                        <?php if(Auth::logged_in()) :?>
                        <a class="nav-link active  text-white" aria-current="page" href="<?=ROOT?>/home">Home</a>
                        <?php else:?>
                            <a href=""></a>
                        <?php endif;?>
                    </li>
                    <li class="nav-item dropdown me-5">
                        <?php if(Auth::logged_in()) :?>
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Features
                        </a>
                        <ul class="dropdown-menu" style="font-size: 15px;">
                            <li><a class="dropdown-item" href="<?=ROOT?>/market">Buy</a></li>
                            <li><a class="dropdown-item" href="<?=ROOT?>/trade?tab=sellnow">Sell</a></li>
                            <li><a class="dropdown-item" href="<?=ROOT?>/inventory">Inventory</a></li>
                            <li><a class="dropdown-item" href="<?=ROOT?>/record">Records</a></li>
                            <li><a class="dropdown-item" href="<?=ROOT?>/account">My Account</a></li>
                        </ul>
                        <?php else:?>
                            <a href=""></a>
                        <?php endif ;?>
                    </li>
                    <li class="nav-item me-5">
                        <?php if(Auth::logged_in()):?>
                        <a class="nav-link text-white" href="<?= (Auth::logged_in() && Auth::getRank() == 'user') ? (ROOT . '/user_dashboard') : ((Auth::logged_in() && (Auth::getRank() == 'admin' || Auth::getRank() == 'super_admin')) ? (ROOT . '/admin') : (ROOT .'/login')) ?>">Dashboard</a>
                        <?php else :?>
                            <a href=""></a>
                        <?php endif;?>
                    </li>

                    <li class="nav-item me-5">
                    <?php if(Auth::logged_in()):?>
                        <a class="nav-link  text-white" href="#">About</a>
                    <?php else:?>
                        <a href=""></a>
                    <?php endif;?>
                    </li>
                    <li class="nav-item me-5">
                    <?php if(Auth::logged_in()):?>
                        <a class="nav-link  text-white" href="">Contact</a>
                    <?php else:?>
                        <a href=""></a>
                    <?php endif;?>
                    </li>
                    <?php if(Auth::logged_in()) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=ROOT?>/logout">
                                <button class="btn btn-sm btn-primary">Logout</button>
                            </a>
                        </li>
                    <?php else :?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=ROOT?>/login">
                                <button class="btn btn-sm btn-primary">Login</button>
                            </a>
                        </li>
                        <li class="nav-item me-5">
                                <a class="nav-link" href="<?=ROOT?>/signup">
                                    <button class="btn btn-sm btn-primary">Signup</button>
                                </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
        
    </div>
</nav>