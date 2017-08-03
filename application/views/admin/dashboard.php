<!DOCTYPE html>
<html>
    <head>
        <?php echo $common; ?>
    </head>
    <body>
        <div id="theme-wrapper">
            <?php echo $header; ?>
            <div id="page-wrapper" class="container">
                <div class="row">
                    <?php echo $sidebar; ?>
                    <div id="content-wrapper">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <ol class="breadcrumb">
                                    <li><a href="#">Home</a></li>
                                    <li class="active"><span>Dashboard</span></li>
                                </ol>
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-xs-12">
                                <div class="main-box infographic-box colored commitee">
                                    <i class="fa fa-users"></i>
                                    <span class="headline">Users</span>
                                    <span class="value"><?php echo $dashboard_data->total_user_accounts; ?></span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-xs-12">
                                <div class="main-box infographic-box colored events">
                                    <i class="fa fa-user"></i>
                                    <span class="headline">Active Users</span>
                                    <span class="value"><?php echo $dashboard_data->total_active_users;; ?></span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-xs-12">
                                <div class="main-box infographic-box colored tributes">
                                    <i class="fa fa-users"></i>
                                    <span class="headline">Pending Users</span>
                                    <span class="value"><?php echo $dashboard_data->total_pending_users;; ?></span>
                                </div>
                            </div>
                        
                            <div class="col-lg-4 col-sm-6 col-xs-12">
                                <div class="main-box infographic-box colored donors">
                                    <i class="fa fa-mixcloud"></i>
                                    <span class="headline">Total Plans</span>
                                    <span class="value"><?php echo $dashboard_data->total_plans;; ?></span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-xs-12">
                                <div class="main-box infographic-box colored donations">
                                    <i class="fa fa-gift"></i>
                                    <span class="headline">Total Deposits</span>
                                    <span class="value"><?php echo $dashboard_data->total_deposits;; ?></span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-xs-12">
                                <div class="main-box infographic-box colored cards">
                                    <i class="fa fa-calculator"></i>
                                    <span class="headline">Total Withdrawals</span>
                                    <span class="value"><?php echo $dashboard_data->total_withdrawals;; ?></span>
                                </div>
                            </div>                       
                        </div>                          
                        <?php echo $footer; ?>
                    </div>
                </div>
            </div>
        </div>        
        <script src="<?php echo base_url(); ?>include_files/admin/js/demo-skin-changer.js"></script>  
        <script src="<?php echo base_url(); ?>include_files/admin/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/jquery.nanoscroller.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/demo.js"></script>                
        <script src="<?php echo base_url(); ?>include_files/admin/js/moment.min.js"></script>                        
        <script src="<?php echo base_url(); ?>include_files/admin/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/pace.min.js"></script> 
        <script src="<?php echo base_url(); ?>include_files/admin/js/aspire.js" type="text/javascript"></script>
    </body>
</html>