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
                        <h1>Help Center</h1>
                    </div>
                </div>
            </div>
            <img src="<?php echo base_url();?>include_files/img/subbanner.jpg" class="img-responsive sub-banner-img" />
        </section>
        <section id="help">
            <div class="container">
                <div class="row card">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 col-xs-12">
                                <img src="<?php echo base_url();?>include_files/img/faq.png" alt="" class="img-responsive img-center" />
                            </div>
                            <div class="col-md-10 col-sm-9 col-xs-12">
                                <h2 class="blue">Frequently Asked Questions</h2>
                                <p>Below you can find the answers to many Frequently Asked Questions. If you can’t find what you are looking for, please email your question to the support team or fill out the contact form. Your email will be either answered or redirected to the appropriate person to be resolved, and your question may be added here.</p>
                            </div>
                        </div>
                        <hr/>
                        <div class="panel-group" id="accordion">
                            <div class="faqHeader">General questions</div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">What is Bitcoin Safe Network Pte. Ltd?</a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        Bitcoin Safe Network Pte. Ltd is an officially registered private investment firm. The main aim of our company is to work on cryptocurrency exclusively BitCoin, engaged in BitCoin mining and cryptocurrency trading.Bitnetcoin offers you some of the best possible and intelligently devised investment plans. You can opt for any of our investment plans depending on your requirement and expertise. However, no matter which plan you opt for, you are sure to earn huge profit and substantial returns on each investment you make. With the help of our plans, you can grab so many money-spinning investments. Bitcoin Safe Network Pte. Ltd doing business as www.Bitnetcoin.com.  
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">What Are Bitcoins?</a>
                                    </h4>
                                </div>
                                <div id="collapseTen" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Bitcoins are units of electronic currency. They are similar to gold, in that they can be mined, valued and exchanged for other currencies. However, the only tool needed for Bitcoin mining is the power of a computer. The rate of Bitcoin mining is measured in MHash/s (millions hashes per second). It is not possible to mine Bitcoins on a standard PC, as the process requires specially optimized computing solutions. 
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">How many people work for Bitnetcoin?</a>
                                    </h4>
                                </div>
                                <div id="collapseEleven" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        As of November 2016, Bitnetcoin consist of 57 experienced industry professionals.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">Where is the head office of Bitnetcoin?</a>
                                    </h4>
                                </div>
                                <div id="collapseEleven" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Bitnetcoin is headquartered in Singapore, where corporate account management, administration, transnational and secretarial functions a carried out by a small stuff.
                                    </div>
                                </div>
                            </div>
                        </div>
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