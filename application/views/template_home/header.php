<div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="<?php echo base_url(); ?>" class="logo d-flex align-items-center">
        <img src="<?php echo base_url();?>assets/img/logo.png" alt="">
        <span>Budget Tracker</span>
    </a>

    <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto <?php echo @$_status['status'] == 'home' ? 'active': ' ' ?>" href="<?php echo base_url()?>">Home</a></li>
            <!-- <li><a class="nav-link scrollto" href="#offices">Offices</a></li> -->
            <li><a class="nav-link scrollto <?php echo @$_status['status'] == 'login' ? 'active':' ' ?>" href="<?php echo base_url()?>/login">Login</a></li>
            <li><a class="nav-link scrollto <?php echo @$_status['status'] == 'register' ? 'active':' ' ?>" href="<?php echo base_url()?>/register">Register</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

</div>