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
                            <h3>Your Deposit</h3>
                        </div>
                    </div>
                    <br/>     

                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php echo $plan_info->name;?>
                                        </td>
                                        <td>
                                            <?php echo $plan_info->description;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Debit Ammount:
                                        </td>
                                        <td>
                                            Ƀ<?php echo $deposit_info->amount;?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>  
                    <div class="row">
                        <p class="bg-info"><strong>Send <?php echo $deposit_info->amount;?> BTC to address : <a href="#"><?php echo $deposit_info->address;?></a></strong></p>
                    </div>        
                    <div class="row">
                        <p class="bg-warning"><strong>*All deposits are credited automatically after few confirmations.</strong></p>
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