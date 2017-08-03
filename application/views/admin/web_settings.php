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
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ol class="breadcrumb">
                                            <li><a href="#">Home</a></li>
                                            <li class="active"><span><a href="<?php echo base_url(); ?>auth_admin/web_settings">Businesses</a></span></li>
                                        </ol>
                                        <h1>Web Settings</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-box">
                                    <header class="main-box-header clearfix">
                                        <h2 id="page_title">
                                            Edit Web Settings
                                        </h2>
                                    </header>
                                    <div class="main-box-body clearfix">
                                        <?php if ($message != "") { ?>
                                            <div class="alert alert-info fade in">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="fa fa-info-circle fa-fw fa-lg"></i>
                                                <?php echo $message; ?>
                                            </div>
                                        <?php } ?>
                                        <form role="form" method="post" enctype="multipart/form-data" id="setting_form">
                                            <div class="form-group">
                                                <label for="running_days">Running Days</label>
                                                <input type="text" class="form-control" id="running_days" name="running_days" value="<?php echo (!empty($web_settings)) ? $web_settings->running_days : "" ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="total_accounts">Total Accounts</label>
                                                <input type="text" class="form-control" id="total_accounts" name="total_accounts" value="<?php echo (!empty($web_settings)) ? $web_settings->total_accounts : "" ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="total_deposited">Total Deposited</label>
                                                <input type="text" class="form-control" id="total_deposited" name="total_deposited" value="<?php echo (!empty($web_settings)) ? $web_settings->total_deposited : "" ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="total_withdraw">Total Withdraw</label>
                                                <input type="text" class="form-control" id="total_withdraw" name="total_withdraw" value="<?php echo (!empty($web_settings)) ? $web_settings->total_withdraw : "" ?>">
                                            </div>
                                            <div class="form-group">                                                
                                                <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Save">
                                                <input type="button" class="btn btn-primary" id="cancel" name="cancel" value="Cancel" onclick="window.location.href = '<?php echo base_url(); ?>auth_admin/dashboard'">
                                            </div>
                                        </form>
                                    </div>
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
        <script src="<?php echo base_url(); ?>include_files/admin/js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/forms.jquery.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/jquery.nanoscroller.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/demo.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/pace.min.js"></script>
        <script>
                                                    $(function () {
                                                        $("#setting_form").submit(function () {
                                                        }).validate({
                                                            rules: {
                                                                running_days: "required",
                                                                total_accounts: "required",
                                                                total_deposited: "required",
                                                                total_withdraw: "required",
                                                            },
                                                            success: function (element) {
                                                                element.closest('.form-group').removeClass('has-error');
                                                                element.closest('.form-group label').remove();
                                                            },
                                                            highlight: function (element) {
                                                                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                                                            },
                                                            submitHandler: function (form) {
                                                                $("form").submit();
                                                            }
                                                        });
                                                    });
        </script>
    </body>
</html>