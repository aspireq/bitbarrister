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
                <div class="col-md-9">
                    <div class="row panel-header">
                        <div class="col-md-12">
                            <h3>Request Payment</h3>
                        </div>
                    </div>
                    <div class="row">
                        <p class="bg-warning"><strong>* Minimum withdrawal amount is <span class="red">0.01 BTC</span></strong></p>
                    </div>
                    <?php if ($message != "") { ?>
                        <div class="row">
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $message; ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <form method="post" id="add_withdrawal_form">
                            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 depositmoney">
                                <div class="row">
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <img src="<?php echo base_url(); ?>include_files/img/memberpanel/atm.png" alt="deposit" class="img-responsive img-center" />
                                    </div>
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                    
                                        <div class="form-group">
                                            <label class="control-label">Amount to Withdraw(<i class="fa fa-btc"></i>)&nbsp;:</label>
                                            <input type="text" name="amount" id="amount" class="form-control" placeholder="0.00100000">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary btn-block" id="add_withdrawal" name="add_withdrawal">Spend</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> 
                </div>
                <div class="col-md-9">
                    <div class="row panel-header">
                        <div class="col-md-12">
                            <h3>Add Investment</h3>
                        </div>
                    </div>
                    <div class="row">
                        <p class="bg-info"><strong> Total Earnings : <?php echo $userinfo['earnings']; ?></strong></p>
                        <p class="bg-warning"><strong> Spend your earnings into the deposit</strong></p>
                    </div>
                    <?php if ($investment_message != "") { ?>
                        <div class="row">
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $investment_message; ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <form method="post" id="add_investment_form">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">                                    
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label">Amount to Add(<i class="fa fa-btc"></i>)&nbsp;:</label>
                                            <input type="text" name="investment_amount" id="investment_amount" class="form-control" placeholder="0.00100000">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Select the Deposit(<i class="fa fa-btc"></i>)&nbsp;:</label>
                                            <select name="deposit_id" id="deposit_id" class="form-control">
                                                <option value="">Select the Deposit</option>
                                                <?php foreach ($deposits as $deposit) { ?>
                                                    <option value="<?php echo $deposit->id; ?>"><?php echo $deposit->transaction_id . ' - ' . $deposit->amount . ' - ' . $deposit->created_date; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block" name="add_investment" id="add_investment" value="add_investment">Add Investment</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> 
                </div>
            </div>                

        </div>

        <?php echo $footer; ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    
        <script src="<?php echo base_url(); ?>include_files/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/js/bitbarrister.js"></script>
        <script>
            $(document).ready(function () {
                $('#add_withdrawal').click(function () {
                    var submit_false;
                    var withdraw_amount = parseFloat($('#amount').val());
                    var minimum_withdrawal = parseFloat('0.01');
                    if ($('#amount').val() == "") {
                        alert('Please enter amount');
                        submit_false = 1;
                    } else if (withdraw_amount < minimum_withdrawal) {
                        alert('Minimum withdrawal amount is ' + minimum_withdrawal + ' BTC');
                        submit_false = 1;
                    } else {
                        submit_false = (submit_false == 1) ? 1 : 0;
                    }
                    if (submit_false == 0) {
                        $('#add_withdrawal_form').submit();
                        $('input[id="add_withdrawal"]').attr('disabled', 'disabled');
                    }
                });
            });
        </script>
    </body>
</html>