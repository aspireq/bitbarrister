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
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="row panel-header">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h3><?php echo ucfirst($userinfo['uacc_username']); ?></h3>
                            <p><i class="fa fa-envelope s-blue"></i>&nbsp;&nbsp;Your E-mail address : <?php echo ucfirst($userinfo['uacc_email']); ?></p>
                            <p><i class="fa fa-calendar s-blue"></i>&nbsp;&nbsp;Registration date : <?php echo ucfirst($userinfo['uacc_date_added']); ?></p>
                            <p><i class="fa fa-location-arrow s-blue"></i>&nbsp;&nbsp;Last Login From : <?php echo ucfirst($userinfo['uacc_ip_address']); ?></p>
                        </div>
                        <a class="btn btn-primary pull-right btn-acinfo" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <?php $change_password_class = ($message != "") ? 'collapse in' : 'collapse'; ?>
                        <div class="<?php echo $change_password_class; ?>" id="collapseExample">
                            <div class="well">
                                <p><i class="fa fa-btc s-blue"></i>&nbsp;&nbsp;Your Bitcoin acc no: <?php echo ucfirst($userinfo['bitcoin_account_no']); ?></p>
                                <?php if ($message != "") { ?>             
                                    <div class="alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <?php echo $message; ?>
                                    </div>
                                <?php } ?>
                                <form method="post">
                                    <div class="row">
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label for="name">Your Name</label>
                                            <input type="text" class="form-control" id="uacc_username" name="uacc_username" value="<?php echo $userinfo['uacc_username']; ?>" readonly="">
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label for="current_password">Current Password</label>
                                            <input type="password" class="form-control" id="current_password" name="current_password">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="new_password">Password</label>
                                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="******">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="confirm_new_password">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" placeholder="******">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-warning" id="change_password" name="change_password">Change Data</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row acbalance">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h3 class="text-center">Account Balance : <i class="fa fa-btc"></i>&nbsp;<?php echo $userinfo['balance']; ?></h3>
                        </div>
                    </div>

                    <div class="row acbox">
                        <div class="col-md-4 col-sm-6 col-xs-12 withdraw">
                            <h3>Withdrawals History</h3>
                            <img src="<?php echo base_url(); ?>include_files/img/memberpanel/bitcoin.png" class="img-responsive" alt="">
                            <ul class="list">
                                <li>
                                    <label>Total</label>
                                    <span><?php echo ($dashboard_summary->total_withdrawals) ? '<i class="fa fa-btc"></i>&nbsp;' . $dashboard_summary->total_withdrawals : 'N/A'; ?></span>                                    
                                </li>
                                <li>
                                    <label>Pending</label>
                                    <span><?php echo ($dashboard_summary->pending_withdrawals) ? '<i class="fa fa-btc"></i>&nbsp;' . $dashboard_summary->pending_withdrawals : 'N/A'; ?></span>
                                </li>
                                <li>
                                    <label>Last Access</label>
                                    <span><?php echo ($dashboard_summary->withdrawals_last_visit_date) ? date('d-m-Y', strtotime($dashboard_summary->withdrawals_last_visit_date)) : 'N/A'; ?></span>
                                </li>
                            </ul>
                            <a href="<?php echo base_url(); ?>auth/withdrawals_history" class="btn btn-warning btn-block">View Detail</a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 deposit">
                            <h3>Deposits History</h3>
                            <img src="<?php echo base_url(); ?>include_files/img/memberpanel/strongbox.png" class="img-responsive" alt="">
                            <ul class="list">
                                <li>
                                    <label>Total</label>
                                    <span><?php echo ($dashboard_summary->total_deposits) ? '<i class="fa fa-btc"></i>&nbsp;' . $dashboard_summary->total_deposits : 'N/A'; ?></span>
                                </li>
                                <li>
                                    <label>Pending</label>
                                    <span><?php echo ($dashboard_summary->pending_deposits) ? '<i class="fa fa-btc"></i>&nbsp;' . $dashboard_summary->pending_deposits : 'N/A'; ?></span>
                                </li>
                                <li>
                                    <label>Last Access</label>
                                    <span><?php echo ($dashboard_summary->deposit_last_visit_date) ? date('d-m-Y', strtotime($dashboard_summary->deposit_last_visit_date)) : 'N/A'; ?></span>
                                </li>
                            </ul>
                            <a href="<?php echo base_url(); ?>auth/deposit_history" class="btn btn-primary btn-block">View Detail</a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 earning">
                            <h3>Earnings History</h3>
                            <img src="<?php echo base_url(); ?>include_files/img/memberpanel/wallet.png" class="img-responsive" alt="">
                            <ul class="list">
                                <li>
                                    <label>Total</label>
                                    <span><?php echo ($userinfo['earnings']) ? '<i class="fa fa-btc"></i>&nbsp;' . $userinfo['earnings'] : 'N/A'; ?></span>
                                </li>
                                <li>
                                    <label>Referral commission</label>
                                    <span><?php echo ($dashboard_summary->total_reffral_commission) ? '<i class="fa fa-btc"></i>&nbsp;' . $dashboard_summary->total_reffral_commission : 'N/A'; ?></span>
                                </li>
                                <li>
                                    <label>Last Access</label>
                                    <span><?php echo ($dashboard_summary->earnings_last_date) ? date('d-m-Y', strtotime($dashboard_summary->earnings_last_date)) : 'N/A'; ?></span>
                                </li>
                            </ul>
                            <a href="<?php echo base_url(); ?>auth/earninghistory" class="btn btn-success btn-block">View Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $footer; ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    
        <script src="<?php echo base_url(); ?>include_files/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/js/bitbarrister.js"></script>
    </body>
</html>