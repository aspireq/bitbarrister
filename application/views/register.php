<?php
if ($_GET['ref'] != "") {
    $reffrence_link = base_url() . 'register?ref=' . $_GET['ref'];
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $common; ?>
    </head>
    <body>
        <?php echo $header; ?>

        <section id="about">
            <div class="container">
                <div class="row">                    
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12 card blue-bg">
                        <h3 class="blue">Register Now</h3>
                        <hr/>
                        <?php
                        $success_message = "An activation email has been sent.";
                        if ($message != "" && trim($message) === trim($success_message)) {
                            ?>
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $message; ?>
                            </div>
                        <?php } else if ($message != "") { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $message; ?>
                            </div>
                        <?php } ?>
                        <form data-toggle="validator" role="form" method="post" id="register_user">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" autofocus="autofocus" value="<?php echo (!empty($user_data)) ? $user_data['first_name'] : '' ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" autofocus="autofocus" value="<?php echo (!empty($user_data)) ? $user_data['last_name'] : '' ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user-circle-o"></i></div>
                                    <input type="text" class="form-control" id="register_username" name="register_username" placeholder="User Name" autofocus="autofocus" value="<?php echo (!empty($user_data)) ? $user_data['register_username'] : '' ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    <input type="text" class="form-control" id="register_email_address" name="register_email_address" placeholder="Email" autofocus="autofocus" value="<?php echo (!empty($user_data)) ? $user_data['register_email_address'] : '' ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-unlock-alt"></i></div>
                                    <input type="password" class="form-control" id="passwordmain" name="passwordmain" placeholder="Password" autofocus="autofocus">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                    <input type="password" class="form-control" id="inputPasswordConfirm" name="inputPasswordConfirm" placeholder="Confirm Password" autofocus="autofocus">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-bank"></i></div>
                                    <input type="text" class="form-control" id="bitcoin_account_no" name="bitcoin_account_no" placeholder="Bitcoin Account No." autofocus="autofocus" value="<?php echo (!empty($user_data)) ? $user_data['bitcoin_account_no'] : '' ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-link"></i></div>
                                    <input type="text" class="form-control" id="reffrence_link" name="reffrence_link" value="<?php echo ($reffrence_link != "") ? $reffrence_link : "" ?>" placeholder="Reffrence Link" autofocus="autofocus" readonly="" value="<?php echo (!empty($user_data)) ? $user_data['reffrence_link'] : '' ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                    <div class="input-group-addon" style="width: 190px;padding: 0;">
                                        <select class="form-control" name="country_code" id="country_code">
                                            <option value="93">Afghanistan</option>
                                            <option value="355">Albania</option>
                                            <option value="213">Algeria</option>
                                            <option value="1">American Samoa</option>
                                            <option value="376">Andorra</option>
                                            <option value="244">Angola</option>
                                            <option value="1">Anguilla</option>
                                            <option value="1">Antigua and Barbuda</option>
                                            <option value="54">Argentina</option>
                                            <option value="374">Armenia</option>
                                            <option value="297">Aruba</option>
                                            <option value="247">Ascension</option>
                                            <option value="61">Australia</option>
                                            <option value="43">Austria</option>
                                            <option value="994">Azerbaijan</option>
                                            <option value="1">Bahamas</option>
                                            <option value="973">Bahrain</option>
                                            <option value="880">Bangladesh</option>
                                            <option value="1">Barbados</option>
                                            <option value="375">Belarus</option>
                                            <option value="32">Belgium</option>
                                            <option value="501">Belize</option>
                                            <option value="229">Benin</option>
                                            <option value="1">Bermuda</option>
                                            <option value="975">Bhutan</option>
                                            <option value="591">Bolivia</option>
                                            <option value="387">Bosnia and Herzegovina</option>
                                            <option value="267">Botswana</option>
                                            <option value="55">Brazil</option>
                                            <option value="1">British Virgin Islands</option>
                                            <option value="673">Brunei</option>
                                            <option value="359">Bulgaria</option>
                                            <option value="226">Burkina Faso</option>
                                            <option value="257">Burundi</option>
                                            <option value="855">Cambodia</option>
                                            <option value="237">Cameroon</option>
                                            <option value="1">Canada</option>
                                            <option value="238">Cape Verde</option>
                                            <option value="1">Cayman Islands</option>
                                            <option value="236">Central African Republic</option>
                                            <option value="235">Chad</option>
                                            <option value="56">Chile</option>
                                            <option value="86">China</option>
                                            <option value="57">Colombia</option>
                                            <option value="269">Comoros</option>
                                            <option value="242">Congo</option>
                                            <option value="682">Cook Islands</option>
                                            <option value="506">Costa Rica</option>
                                            <option value="385">Croatia</option>
                                            <option value="53">Cuba</option>
                                            <option value="357">Cyprus</option>
                                            <option value="420">Czech Republic</option>
                                            <option value="243">Democratic Republic of Congo</option>
                                            <option value="45">Denmark</option>
                                            <option value="246">Diego Garcia</option>
                                            <option value="253">Djibouti</option>
                                            <option value="1">Dominica</option>
                                            <option value="1">Dominican Republic</option>
                                            <option value="670">East Timor</option>
                                            <option value="593">Ecuador</option>
                                            <option value="20">Egypt</option>
                                            <option value="503">El Salvador</option>
                                            <option value="240">Equatorial Guinea</option>
                                            <option value="291">Eritrea</option>
                                            <option value="372">Estonia</option>
                                            <option value="251">Ethiopia</option>
                                            <option value="500">Falkland (Malvinas) Islands</option>
                                            <option value="298">Faroe Islands</option>
                                            <option value="679">Fiji</option>
                                            <option value="358">Finland</option>
                                            <option value="33">France</option>
                                            <option value="594">French Guiana</option>
                                            <option value="689">French Polynesia</option>
                                            <option value="241">Gabon</option>
                                            <option value="220">Gambia</option>
                                            <option value="995">Georgia</option>
                                            <option value="49">Germany</option>
                                            <option value="233">Ghana</option>
                                            <option value="350">Gibraltar</option>
                                            <option value="30">Greece</option>
                                            <option value="299">Greenland</option>
                                            <option value="1">Grenada</option>
                                            <option value="590">Guadeloupe</option>
                                            <option value="1">Guam</option>
                                            <option value="502">Guatemala</option>
                                            <option value="224">Guinea</option>
                                            <option value="245">Guinea-Bissau</option>
                                            <option value="592">Guyana</option>
                                            <option value="509">Haiti</option>
                                            <option value="504">Honduras</option>
                                            <option value="852">Hong Kong</option>
                                            <option value="36">Hungary</option>
                                            <option value="354">Iceland</option>
                                            <option value="91">India</option>
                                            <option value="62">Indonesia</option>
                                            <option value="870">Inmarsat Satellite</option>
                                            <option value="98">Iran</option>
                                            <option value="964">Iraq</option>
                                            <option value="353">Ireland</option>
                                            <option value="972">Israel</option>
                                            <option value="39">Italy</option>
                                            <option value="225">Ivory Coast</option>
                                            <option value="1">Jamaica</option>
                                            <option value="81">Japan</option>
                                            <option value="962">Jordan</option>
                                            <option value="7">Kazakhstan</option>
                                            <option value="254">Kenya</option>
                                            <option value="686">Kiribati</option>
                                            <option value="965">Kuwait</option>
                                            <option value="996">Kyrgyzstan</option>
                                            <option value="856">Laos</option>
                                            <option value="371">Latvia</option>
                                            <option value="961">Lebanon</option>
                                            <option value="266">Lesotho</option>
                                            <option value="231">Liberia</option>
                                            <option value="218">Libya</option>
                                            <option value="423">Liechtenstein</option>
                                            <option value="370">Lithuania</option>
                                            <option value="352">Luxembourg</option>
                                            <option value="853">Macau</option>
                                            <option value="389">Macedonia</option>
                                            <option value="261">Madagascar</option>
                                            <option value="265">Malawi</option>
                                            <option value="60">Malaysia</option>
                                            <option value="960">Maldives</option>
                                            <option value="223">Mali</option>
                                            <option value="356">Malta</option>
                                            <option value="692">Marshall Islands</option>
                                            <option value="596">Martinique</option>
                                            <option value="222">Mauritania</option>
                                            <option value="230">Mauritius</option>
                                            <option value="262">Mayotte</option>
                                            <option value="52">Mexico</option>
                                            <option value="691">Micronesia</option>
                                            <option value="373">Moldova</option>
                                            <option value="377">Monaco</option>
                                            <option value="976">Mongolia</option>
                                            <option value="382">Montenegro</option>
                                            <option value="1">Montserrat</option>
                                            <option value="212">Morocco</option>
                                            <option value="258">Mozambique</option>
                                            <option value="95">Myanmar</option>
                                            <option value="264">Namibia</option>
                                            <option value="674">Nauru</option>
                                            <option value="977">Nepal</option>
                                            <option value="31">Netherlands</option>
                                            <option value="599">Netherlands Antilles</option>
                                            <option value="687">New Caledonia</option>
                                            <option value="64">New Zealand</option>
                                            <option value="505">Nicaragua</option>
                                            <option value="227">Niger</option>
                                            <option value="234">Nigeria</option>
                                            <option value="683">Niue Island</option>
                                            <option value="850">North Korea</option>
                                            <option value="1">Northern Marianas</option>
                                            <option value="47">Norway</option>
                                            <option value="968">Oman</option>
                                            <option value="92">Pakistan</option>
                                            <option value="680">Palau</option>
                                            <option value="507">Panama</option>
                                            <option value="675">Papua New Guinea</option>
                                            <option value="595">Paraguay</option>
                                            <option value="51">Peru</option>
                                            <option value="63">Philippines</option>
                                            <option value="48">Poland</option>
                                            <option value="351">Portugal</option>
                                            <option value="1">Puerto Rico</option>
                                            <option value="974">Qatar</option>
                                            <option value="262">Reunion</option>
                                            <option value="40">Romania</option>
                                            <option value="7">Russian Federation</option>
                                            <option value="250">Rwanda</option>
                                            <option value="290">Saint Helena</option>
                                            <option value="1">Saint Kitts and Nevis</option>
                                            <option value="1">Saint Lucia</option>
                                            <option value="508">Saint Pierre and Miquelon</option>
                                            <option value="1">Saint Vincent and the Grenadines</option>
                                            <option value="685">Samoa</option>
                                            <option value="378">San Marino</option>
                                            <option value="239">Sao Tome and Principe</option>
                                            <option value="966">Saudi Arabia</option>
                                            <option value="221">Senegal</option>
                                            <option value="381">Serbia</option>
                                            <option value="248">Seychelles</option>
                                            <option value="232">Sierra Leone</option>
                                            <option value="65">Singapore</option>
                                            <option value="421">Slovakia</option>
                                            <option value="386">Slovenia</option>
                                            <option value="677">Solomon Islands</option>
                                            <option value="252">Somalia</option>
                                            <option value="27">South Africa</option>
                                            <option value="82">South Korea</option>
                                            <option value="34">Spain</option>
                                            <option value="94">Sri Lanka</option>
                                            <option value="249">Sudan</option>
                                            <option value="597">Suriname</option>
                                            <option value="268">Swaziland</option>
                                            <option value="46">Sweden</option>
                                            <option value="41">Switzerland</option>
                                            <option value="963">Syria</option>
                                            <option value="886">Taiwan</option>
                                            <option value="992">Tajikistan</option>
                                            <option value="255">Tanzania</option>
                                            <option value="66">Thailand</option>
                                            <option value="228">Togo</option>
                                            <option value="690">Tokelau</option>
                                            <option value="676">Tonga</option>
                                            <option value="1">Trinidad and Tobago</option>
                                            <option value="216">Tunisia</option>
                                            <option value="90">Turkey</option>
                                            <option value="993">Turkmenistan</option>
                                            <option value="1">Turks and Caicos Islands</option>
                                            <option value="688">Tuvalu</option>
                                            <option value="256">Uganda</option>
                                            <option value="380">Ukraine</option>
                                            <option value="971">United Arab Emirates</option>
                                            <option value="44">United Kingdom</option>
                                            <option value="1">United States of America</option>
                                            <option value="1">U.S. Virgin Islands</option>
                                            <option value="598">Uruguay</option>
                                            <option value="998">Uzbekistan</option>
                                            <option value="678">Vanuatu</option>
                                            <option value="379">Vatican City</option>
                                            <option value="58">Venezuela</option>
                                            <option value="84">Vietnam</option>
                                            <option value="681">Wallis and Futuna</option>
                                            <option value="967">Yemen</option>
                                            <option value="260">Zambia</option>
                                            <option value="263">Zimbabwe</option>
                                        </select>
                                    </div>
                                    <input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact" autofocus="autofocus" value="<?php echo (!empty($user_data)) ? $user_data['contactno'] : '' ?>">
                                </div>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="" checked="checked">I have READ and AGREED with the <a href="#">Terms & Conditions</a></label>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" id="submit" class="btn btn-info btn-block">Register Now</button>
                            </div>
                        </form>
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