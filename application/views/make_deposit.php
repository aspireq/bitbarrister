<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $common; ?>
    </head>
    <body>
        <?php echo $header; ?>

        <section class="memberpanel-banner">
            <div class="container">
                <div class="sub-banner">
                    <div class="sub-banner-text">
                        <h1>Member Panel</h1>
                    </div>
                </div>
            </div>
            <img src="<?php echo base_url(); ?>include_files/img/memberpanel/subbanner.jpg" class="img-responsive sub-banner-img">
        </section>

        <div class="container">
            <div class="row memberpanel">
                <?php echo $member_sidebar; ?>
                <div class="col-md-9 col-sm-9">
                    <div class="row panel-header">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h3>Make Deposit</h3>
                        </div>
                    </div>
                    <form method="post" id="make_deposit" role="form" name="make_deposit">
                        <div class="row">
                            <div class="cradio row">
                                <?php foreach($plans as $plan) { ?>
                                <div class="cradio-primary col-md-4 col-sm-6 col-xs-12">
                                    <input type="radio" name="plan_type" id="<?php echo 'plan_id'.$plan->id;?>" value="<?php echo $plan->id;?>" />
                                    <label for="<?php echo 'plan_id'.$plan->id;?>" class="plan1">
                                        <h3><?php echo $plan->name;?></h3>
                                        <h4><?php echo $plan->description;?></h4>
                                        <p>Min : <?php echo $plan->minimum_amount;?>$</p>
                                    </label>
                                </div>
                                <?php } ?>
                            </div>
                        </div>    
                        <div class="row">
                            <p class="bg-info"><strong>Your A/c Balance :</strong> <i class="fa fa-btc"></i>&nbsp; <?php echo $userinfo['balance']; ?></p>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 depositmoney">
                                <div class="row">
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <img src="<?php echo base_url(); ?>include_files/img/memberpanel/atm.png" alt="deposit" class="img-responsive img-center" />
                                    </div>
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                    
                                        <div class="form-group">
                                            <label class="control-label">Amount to Spend(<i class="fa fa-btc"></i>)&nbsp;:</label>
                                            <input type="text" name="amount" id="amount" class="form-control" placeholder="0.00100000">
                                        </div>
                                        <div class="form-group">
                                            <input type="button" class="btn btn-primary btn-block" id="add_deposit" name="add_deposit" value="Spend">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>          
                    </form>
                </div>
            </div>
        </div>
        <?php echo $footer; ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    
        <script src="<?php echo base_url(); ?>include_files/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/js/bitbarrister.js"></script>
        <script>
            $(document).ready(function () {
                $('#add_deposit').click(function () {
                    var submit_false;
                    var selected_plan = $("input[name=plan_type]:checked").val();
                    var deposit_amount = parseFloat($('#amount').val());
                    var plandeposit_1 = parseFloat('0.09624');
                    var plandeposit_2 = parseFloat('0.24060');
                    var plandeposit_3 = parseFloat('0.47977');
                    if (typeof (selected_plan) == "undefined") {
                        alert('Please select plan');
                        submit_false = 1;
                    } else {
                        submit_false = (submit_false == 1) ? 1 : 0;
                    }
                    if ($('#amount').val() == "") {
                        alert('Please enter amount');
                        submit_false = 1;
                    } else {
                        submit_false = (submit_false == 1) ? 1 : 0;
                    }                    
                    if (selected_plan == 1 && deposit_amount < plandeposit_1) {
                        alert('Minimum amount for Plan 1 is 0.09624');
                        submit_false = 1;
                    } else {
                        submit_false = (submit_false == 1) ? 1 : 0;
                    }
                    if (selected_plan == 2 && deposit_amount < plandeposit_2) {
                        alert('Minimum amount for Plan 2 is 0.24060');
                        submit_false = 1;
                    } else {
                        submit_false = (submit_false == 1) ? 1 : 0;
                    }
                    if (selected_plan == 3 && deposit_amount < plandeposit_3) {
                        alert('Minimum amount for Plan 3 is 0.47977');
                        submit_false = 1;
                    } else {
                        submit_false = (submit_false == 1) ? 1 : 0;
                    }
                    if (submit_false == 0) {
                        $('#make_deposit').submit();
                        $('input[id="add_deposit"]').attr('disabled','disabled');                        
                    }
                });
            });
//            function BitcoinRate()
//            {
//                load('https://blockchain.info/tobtc?currency=USD&value=' + 100, 'BitcoinRate');
//            }
//            function load(url, reason) {
//                var xmlhttp;
//
//                if (window.XMLHttpRequest) {
//                    // code for IE7+, Firefox, Chrome, Opera, Safari
//                    xmlhttp = new XMLHttpRequest();
//                } else {
//                    // code for IE6, IE5
//                    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
//                }
//
//                xmlhttp.onreadystatechange = function () {
//                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                        var Answer = xmlhttp.responseText;
//                        if (reason == 'BitcoinRate') {
//                            document.getElementById('amount').innerHTML = Answer;
//                        }
//                        xmlhttp.open('GET', url, true);
//                        xmlhttp.send();
//                    }
//                }
//            }
        </script>
    </body>
</html>