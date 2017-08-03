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
                            <h3>Promotion Banners</h3>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="table-responsive">
                            <table cellspacing="4" cellpadding="4" align="center" border="0" width="100%" class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="inheader" colspan="3" align="center">728x90 banner</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" align="center">
                                <center>
                                    <img src="<?php echo base_url(); ?>include_files/img/memberpanel/banner1.jpg" alt="" height="" width="">
                                </center>
                                <br>
                                <textarea class="form-control" style="width: 821px; height: 35px;">&lt;a href=<?php echo $userinfo['reffrence_link'];?>&gt;&lt; img src="<?php echo base_url().'include_files/img/memberpanel/banner1.jpg';?>" alt="" width="728" height="90" /&gt;&lt;/a&gt;</textarea>
                                </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="inheader" align="center">468x60 banner</td>
                                    <td class="inheader" align="center" width="180">160x600 banner</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                <center>
                                    <img src="<?php echo base_url(); ?>include_files/img/memberpanel/banner2.jpg" alt="" height="60" width="468">
                                </center>
                                <br>
                                <textarea class="form-control" style="width: 640px; height: 41px;">&lt;a href=<?php echo $userinfo['reffrence_link'];?>&gt;&lt;img src="<?php echo base_url().'include_files/img/memberpanel/banner2.jpg';?>" alt="" width="468" height="60" /&gt;&lt;/a&gt;</textarea>
                                </td>
                                <td rowspan="7">
                                <center>
                                    <img src="<?php echo base_url(); ?>include_files/img/memberpanel/banner3.jpg" alt="" height="600" width="160">
                                </center>
                                <br>
                                <textarea class="form-control" style="width:100%;height:150px;">&lt;a href=<?php echo $userinfo['reffrence_link'];?>&gt;&lt;img src="<?php echo base_url().'include_files/img/memberpanel/banner3.jpg';?>" alt="" width="160" height="600" /&gt;&lt;/a&gt;</textarea>
                                </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="inheader" align="center">125x125 banner</td>
                                </tr>
                                <tr>
                                    <td align="center" width="200">
                                        <img src="<?php echo base_url(); ?>include_files/img/memberpanel/banner4.jpg" alt="" height="125" width="125">
                                    </td>
                                    <td><textarea class="form-control" style="width:90%;height:130px;">&lt;a href=<?php echo $userinfo['reffrence_link'];?>&gt;&lt;img src="<?php echo base_url().'include_files/img/memberpanel/banner4.jpg';?>" alt="" width="125" height="125" /&gt;&lt;/a&gt;</textarea></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="inheader" align="center">200x200 banner</td>
                                </tr>
                                <tr>
                                    <td align="center" width="200"><img src="<?php echo base_url(); ?>include_files/img/memberpanel/banner5.jpg" alt="" height="200" width="200"></td>
                                    <td><textarea class="form-control" style="width:90%;height:200px;">&lt;a href=<?php echo $userinfo['reffrence_link'];?>&gt;&lt;img src="<?php echo base_url().'include_files/img/memberpanel/banner5.jpg';?>" alt="" width="200" height="200" /&gt;&lt;/a&gt;</textarea></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="inheader" align="center">300x250 banner</td>
                                </tr>
                                <tr>
                                    <td width="300&quot;"><img src="<?php echo base_url(); ?>include_files/img/memberpanel/banner6.jpg" alt="" height="250" width="300"></td>
                                    <td><textarea class="form-control" style="width:90%;height:250px;">&lt;a href=<?php echo $userinfo['reffrence_link'];?>&gt;&lt;img src="<?php echo base_url().'include_files/img/memberpanel/banner6.jpg';?>" alt="" width="300" height="250" /&gt;&lt;/a&gt;</textarea></td>
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