<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $common; ?>
    </head>
    <body>
        <?php echo $header; ?>
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12 card blue-bg">
                        <h3 class="blue">Forgot Password</h3>
                        <hr/>
                        <?php
                         if ($message != "") {                        
                            ?>
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $message; ?>
                            </div>
                        <?php } ?>
                        <form data-toggle="validator" role="form" method="post" id="login">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                                    <input type="text" class="form-control" id="forgot_password_identity" name="forgot_password_identity" placeholder="User Name / Email " autofocus="autofocus">
                                </div>
                            </div>                            
                            <div class="form-group">
                                <button type="submit" name="forgot_pwd" id="forgot_pwd" class="btn btn-info btn-block">Receive Password Reset Link</button>                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php echo $footer; ?>
        <div class="scroll-top-wrapper ">
            <span class="scroll-top-inner">
                <i class="fa fa-2x fa-arrow-circle-up"></i>
            </span>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    
        <script src="<?php echo base_url(); ?>include_files/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/js/bitbarrister.js"></script>
    </body>
</html>