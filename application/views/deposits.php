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
                            <h3>Your Deposit</h3>
                        </div>
                    </div>
                    <div class="row">
                        <p class="bg-info">Total Deposits: Ƀ <?php echo $total_depisit; ?></p>
                    </div>                      
                    <?php
                    foreach ($deposits as $deposit) {
                        if (!empty($deposit)) {
                            echo '<div class="row">';
                            echo '<div class="col-md-12 col-sm-12 col-xs-12 p-0">';
                            //if (!empty($deposit)) {                           
                            echo '<div class="table-responsive">';
                            echo '<table class="table table-bordered">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th>' . $deposit[0]['description'] . '</th>';
                            echo '<th>Amount Spent (<i class="fa fa-btc"></i>)</th>';
                            //echo '<th>Hourly Profit (%)</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            foreach ($deposit as $key => $final_deposit) {
//                            unset($final_deposit->plan_name);
//                            unset($final_deposit->description);
//                            unset($final_deposit->minimum_amount);
                                // echo $key;
                                // echo "<pre>";
                                //print_r($final_deposit);
                                if (!empty($final_deposit)) {
                                    echo '<tr>';
                                    echo '<td>';
                                    echo $final_deposit['transaction_id'];
                                    echo '</td>';
                                    echo '<td>';
                                    echo 'Ƀ ' . $final_deposit['amount'];
                                    echo '</td>';
//                            echo '<td>';
//                            echo '0.13';
//                            echo '</td>';
                                    echo '</tr>';
                                } else {
                                    echo '<p class="bg-danger">No deposits for this plan</p>';
                                }
                            }
                            echo '</tbody>';
                            echo '</table>';
                            echo '</div>';
                            // } else {
                            //echo '<p class="bg-danger">No deposits for this plan</p>';
                            // }
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                    ?>              
                </div>
            </div>
        </div>
        <?php echo $footer; ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    
        <script src="<?php echo base_url(); ?>include_files/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/js/bitbarrister.js"></script>
    </body>
</html>