<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>Bitbarrister - Admin</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>include_files/admin/css/bootstrap/bootstrap.min.css"/>
        <script src="<?php echo base_url(); ?>include_files/admin/js/demo-rtl.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>include_files/admin/css/libs/font-awesome.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>include_files/admin/css/libs/nanoscroller.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>include_files/admin/css/compiled/theme_styles.css"/>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
        <link type="image/x-icon" href="<?php echo base_url(); ?>include_files/img/favicon.png" rel="shortcut icon"/>
    </head>
    <body id="login-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div id="login-box">
                        <div id="login-box-holder">
                            <div class="row">
                                <div class="col-xs-12">
                                    <header id="login-header">
                                        <div id="login-logo">
                                            Bitbarrister
                                        </div>
                                    </header>

                                    <div id="login-box-inner">
                                        <form role="form" method="post">
                                            <?php
                                            if ($message) {
                                                ?>
                                                <div class="alert alert-danger">
                                                    <?php echo $message; ?>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input class="form-control" type="text" placeholder="Email address" name="login_identity" id="login_identity">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                                <input type="password" class="form-control" placeholder="Password" name="login_password" id="login_password">
                                            </div>
                                            <div id="remember-me-wrapper">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <div class="checkbox-nice">
                                                            <input type="checkbox" id="remember_me" name="remember_me" value="1" />
                                                            <label for="remember-me">
                                                                Remember me
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <a href="<?php echo base_url();?>auth/forgotten_password" id="login-forget-link" class="col-xs-6" onclick="return forgot_password()">
                                                        Forgot password?
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="submit" class="btn btn-success col-xs-12" value="Login" name="submit" id="submit">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="forgot_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h1 class="modal-title" id="myModalLabel">Forgot Password</h1>
                    </div>
                    <div class="modal-body">
                        <form method="post" accept-charset="utf-8" id="add_categories" novalidate="novalidate" enctype="multipart/form-data">                              
                            <div class="alert alert-success" id="forgot_pwd_msg">
                                <span id="error_message"></span>
                            </div>
                            <div class="form-group">
                                <label for="forgot_password_identity">Email</label>
                                <input type="text" class="form-control" name="forgot_password_identity" id="forgot_password_identity" placeholder="">
                            </div>
                            <input class="btn btn-default" type="button"  name="forgot_pwd" id="forgot_pwd" value="Receive Password Reset Link">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url(); ?>include_files/admin/js/demo-skin-changer.js"></script>  
        <script src="<?php echo base_url(); ?>include_files/admin/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/jquery.nanoscroller.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/demo.js"></script>  
        <script src="<?php echo base_url(); ?>include_files/admin/js/scripts.js"></script>
        <script>
//                                function forgot_password() {
//                                    $('#forgot_pwd_msg').hide();
//                                    $('#forgot_password').modal('show');
//                                }
//                                function reset_password() {
//                                    var forgot_password_identity = $('#forgot_password_identity').val();
//                                    $.ajax({
//                                        url: "<?php echo base_url(); ?>auth/forgot_password/",
//                                        type: "POST",
//                                        data: {forgot_password_identity: forgot_password_identity},
//                                        dataType: "JSON",
//                                        success: function (data)
//                                        {
//                                            alert('12345');
//                                            $('#forgot_pwd_msg').show();
//                                            $('#error_message').text(data);
//                                        }
//                                    });
//                                }
        </script>
    </body>
</html>