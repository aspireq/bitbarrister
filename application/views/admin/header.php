<header class="navbar" id="header-navbar">
    <div class="container">
        <a href="<?php echo base_url(); ?>auth_admin" id="logo" class="navbar-brand">
            Bitbarrister
        </a>
        <div class="clearfix">
            <button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars"></span>
            </button>
            <div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
                <ul class="nav navbar-nav pull-left">
                    <li>
                        <a class="btn" id="make-small-nav">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="nav-no-collapse pull-right" id="header-nav">
                <ul class="nav navbar-nav pull-right">                    
                    <li class="dropdown profile-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">     <span class="hidden-xs">Welcome,&nbsp;<?php echo $admininfo['uacc_username']; ?></span>
                        </a>
                    </li>
                    <li class="hidden-xxs">
                        <a class="btn" href="<?php echo base_url(); ?>auth_admin/logout">
                            <i class="fa fa-power-off"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>