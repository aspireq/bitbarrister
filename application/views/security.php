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
                        <h1>Security Advises</h1>
                    </div>
                </div>
            </div>
            <img src="<?php echo base_url();?>include_files/img/subbanner.jpg" class="img-responsive sub-banner-img" />
        </section>
        <section id="securityadvises">
            <div class="container">
                <div class="row card">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 col-xs-12">
                                <img src="<?php echo base_url();?>include_files/img/security.png" alt="" class="img-responsive img-center" />
                            </div>
                            <div class="col-md-10 col-sm-9 col-xs-12">
                                <h2 class="blue">BitnetCoin's Security advises</h2>
                                <p>BitNetCoin provides an investment platform for users, who accept that the investment is not without risks. Users are encouraged to take precautions when making transactions, as the website is not responsible for financial losses and damages.</p>
                                <p>
                                    At BitNetCoin, we are committed to securing your personal information and account related data. We will provide an encryption service to make your personal and financial details secure from unauthorized internet users. Our security team regularly updates the site's security and firewall system to protect you from financial loss.
                                </p>
                            </div>
                        </div>
                        <p>
                            At BitNetCoin, our personnel are trained to provide security-related advice for users, and monitor the website traffic for potential risks. We do everything possible to make the site secure and eliminate risks of using the site for online transactions. Customers are also encouraged to check out our security advice, detailed on the website and adhere to the guidelines of acceptable and safe use.
                        </p>
                        <hr/>
                        <h3>Users should always consider the following security precautions</h3>
                        <p>
                            You need to set a secure password for creating a secure investment account with BitNetCoin.
                            You need to keep your password safe. Do not write it down or disclose it to anybody who could use it to make fraudulent or unauthorized transactions in your name. 
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