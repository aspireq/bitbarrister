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
                            <h3>Affiliate Center</h3>
                        </div>
                    </div>
                    <div class="row">
                        <p class="bg-info"><strong>Your Referral Link: <a href="<?php echo $userinfo['reffrence_link'] ?>"><?php echo $userinfo['reffrence_link'] ?></a></strong></p>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>
                                            Referrals:
                                        </td>
                                        <td>
                                            <?php echo ($userinfo['reffrence_registration'] != null) ? $userinfo['reffrence_registration'] : 0; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Active referrals:
                                        </td>
                                        <td>                                            
                                            <?php echo ($reffrel_commission->active_refferals != null) ? $reffrel_commission->active_refferals : '0' ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Total referral commission:
                                        </td>
                                        <td>
                                            <?php echo ($reffrel_commission->total_reffral_commission != null) ? 'Ƀ'.$reffrel_commission->total_reffral_commission : 'N/A' ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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