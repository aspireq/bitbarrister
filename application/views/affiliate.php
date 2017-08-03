<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $common; ?>
    </head>
    <body>
        <?php echo $header; ?>
        <section>
            <div class="container">
                <div class="sub-banner">
                    <div class="sub-banner-text">
                        <h1>Affiliate Program</h1>
                    </div>
                </div>
            </div>
            <img src="<?php echo base_url();?>include_files/img/subbanner.jpg" class="img-responsive sub-banner-img" />
        </section>
        <section id="investmentpackages">
            <div class="container">
                <div class="row card p-b-20">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <img src="<?php echo base_url();?>include_files/img/program.png" alt="" class="img-responsive img-center" />
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <h2 class="blue">Affiliate System <span>(BitnetCoin Package)</span></h2>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, 
                                </p>
                                <h3 class="yellow"><b>5% Referral Commission From Your Referrals</b></h3>
                                <h4><i class="fa fa-arrow-circle-right"></i> You don't need to have an active investment! &nbsp;&nbsp;
                                    <i class="fa fa-arrow-circle-right"></i> No Limits  
                                </h4>
                                <button class="btn btn-info" onClick="location.href = '<?php echo base_url(); ?>signin'">Login to your Account&nbsp;&nbsp; <i class="fa fa-sign-in"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="step">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3>OPEN YOUR ACCOUNT</h3>
                        <p>After four simple steps, enjoy the advantages of the your BitnetCoin account.</p>
                        <br/>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <img src="<?php echo base_url();?>include_files/img/step1.png" alt=""/>
                        <h3>Step 1</h3>
                        <p>
                            You need to open an account with BitNetCoin, which is free. To open the account, click on Register, fill in the details and submit. 
                        </p>
                        <div class="arrow1"><img src="img/arrow1.png" alt=""></div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <img src="<?php echo base_url();?>include_files/img/step2.png" alt=""/>
                        <h3>Step 2</h3>
                        <p>
                            Verify your details in your email and finally log into your account with your credentials.
                        </p>
                        <div class="arrow1"><img src="<?php echo base_url();?>include_files/img/arrow2.png" alt=""></div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <img src="<?php echo base_url();?>include_files/img/step3.png" alt=""/>
                        <h3>Step 3</h3>
                        <p>
                            Click on "Deposit" button and then proceed to decide how much you are willing to deposit. Each member has an unique Bitcoin address.
                        </p>
                        <div class="arrow1"><img src="<?php echo base_url();?>include_files/img/arrow1.png" alt=""></div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <img src="<?php echo base_url();?>include_files/img/step4.png" alt=""/>
                        <h3>Step 4</h3>
                        <p>
                            BitNetCoin will credit your account automatically, you will view the summary of your accounts activities On your account dashboard.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <?php echo $footer; ?>

        <!-- The scroll to top feature -->
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