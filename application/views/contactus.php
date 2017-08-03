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
                        <h1>Contact Us</h1>
                    </div>
                </div>
            </div>
            <img src="<?php echo base_url(); ?>include_files/img/subbanner.jpg" class="img-responsive sub-banner-img" />
        </section>
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="row card p-b-20">
                            <div class="clearfix">
                                <div class="col-md-2 col-lg-2 col-sm-3 col-xs-12">
                                    <img src="<?php echo base_url(); ?>include_files/img/contact.png" alt="" class="img-responsive img-center" />
                                </div>
                                <div class="col-md-10 col-lg-10 col-sm-9 col-xs-12">
                                    <h2 class="blue">We are here to answer any questions you may have about Bitcoin Safe Network Pte. Ltd. Reach out to us and we'll respond as soon as we can.</h2>
                                    <p>Please make sure to read our faq section first, your question might have been already answered there.</p>
                                </div>
                            </div>
                            <hr/>
                            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                                <p class="red">* For faster respond please include your support pin although it is not mandatory.</p>
                                <br/>
                                <form role="form" method="post" enctype="multipart/form-data" id="contactus">
                                    <?php
                                    if ($message != "" && $message == "Email has been sent successfully") {
                                        ?>
                                        <div class="alert alert-success alert-dismissable">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <?php echo $message; ?>
                                        </div>
                                        <?php
                                    } else if($message != "") {
                                        ?>
                                        <div class="alert alert-danger alert-dismissable">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <?php echo $message; ?>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group col-lg-6 col-md-6">
                                        <label for="name">Name:<sup>*</sup></label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6">
                                        <label for="username">User Name:</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="User Name">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6">
                                        <label for="email">Email:<sup>*</sup></label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6">
                                        <label for="subject">Subject:</label>
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="message">Message:<sup>*</sup></label>
                                        <textarea  class="form-control" rows="3" name="message" id="message"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-info pull-right" name="contact_form" id="contact_form">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                                <div class="media">
                                    <div class="media-left contact-icon">
                                        <img class="media-object" src="<?php echo base_url(); ?>include_files/img/email.png" alt="email">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Email</h4>
                                        <p>support@bitbarrister.com</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left contact-icon">
                                        <img class="media-object" src="<?php echo base_url(); ?>include_files/img/phone.png" alt="email">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Phone</h4>
                                        <p>+44 151 3242999</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left contact-icon">
                                        <img class="media-object" src="<?php echo base_url(); ?>include_files/img/head.png" alt="email">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Headquater</h4>
                                        <address>BIT BARRISTER ORMSKIRK ROAD<br/>
                                            Liverpool, Mersayside <br/>
                                            United Kingdom<br/>
                                            L95AN
                                        </address>
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
        <script src="<?php echo base_url(); ?>include_files/js/forms.jquery.js"></script>
        <script src="<?php echo base_url(); ?>include_files/js/jquery.validate.min.js"></script>
        <script>
//            $(function () {               
//                $("#contactus").submit(function () {                    
//                }).validate({
//                    rules: {
//                        name: "required",
//                        username: "required",
//                        subject: "required",
//                        email: "required",
//                        message: "required",
//                    },
//                    messages: {
//                        name: "name is required",
//                        username: "username is required",
//                        subject: "subject is required",
//                        email: "email is required",
//                        message: "please write something for us",
//                    },
//                    success: function (element) {
//                        element.closest('.form-group').removeClass('has-error');
//                        element.closest('.form-group label').remove();
//                    },
//                    highlight: function (element) {
//                        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
//                    },
//                    submitHandler: function (form) {
//                        $("form").submit();
//                         $('button#contact_form').text('Please Wait');
//                    }
//                });
//            });
        </script>
    </body>
</html>