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
                        <h3 class="blue">Reset Password</h3>
                        <?php if ($message != "") { ?>                    
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $message; ?>
                            </div>
                        <?php } ?>
                        <form data-toggle="validator" role="form" method="post" id="reset_password">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-unlock"></i></div>
                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Password" autofocus="autofocus">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-unlock"></i></div>
                                    <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" placeholder="Confirm Password" autofocus="autofocus">
                                </div>
                            </div>                            
                            <div class="form-group">
                                <button type="submit" name="reset_pwd" id="reset_pwd" class="btn btn-info btn-block">Reset Password</button>                                
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