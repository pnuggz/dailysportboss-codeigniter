<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 7/10/2016
 * Time: 10:49 AM
 */
?>


<body class="dsb">
<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="<?php echo  base_url(); ?>">
              <img src="<?php echo  base_url(); ?>/img/dsb/logo.png" class="img-responsive logo visible-md visible-lg" alt="">
              <img src="<?php echo  base_url(); ?>/img/dsb/logo.png" class="img-responsive logo visible-sm visible-xs" alt="">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="<?php echo  base_url(); ?>about/dsb/">About Us</a>
                </li>
                <li>
                    <a class="page-scroll" href="<?php echo  base_url(); ?>about/partnership/">Partnership</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<div id="dsb">
    <div class="container-fluid section-1">
        <div class="container container-1">
            <div class="row row-1">
              <table class="table-header visible-md visible-lg">
                <tbody>
                  <tr>
                    <td>
                      <br>
                      <hr>
                    </td>
                    <td>
                      <h1 class="orange-text text-center">ABOUT US</h1>
                    </td>
                    <td>
                      <br>
                      <hr>
                    </td>
                  </tr>
                </tbody>
              </table>
              <table style="width: 100%;" class="table-header mobile visible-xs visible-sm">
                <tbody>
                  <tr>
                    <td>
                      <h1 class="orange-text text-center">ABOUT US</h1>
                    </td>

                  </tr>
                </tbody>
              </table>
            </div>
        </div>
        <div class="container container-2">
            <img class="img-responsive" src="<?php echo  base_url(); ?>/img/dsb/dsbbanner.png">
        </div>
        <div class="container container-3">
            Daily Sport Boss is a small team of friends who share a passion for sports. Based in Jakarta, the team came together and realized there wasn’t an existing Fantasy Sport platform that was engaging or rewarding for sport lovers. Thus, Daily Sport Boss was formed with a vision to introduce and provide the first game-changing, free-to-play Daily Fantasy Sport application in Indonesia.
            <br/>
            <br/>
            Through partnerships with sponsors, Daily Sport Boss will provide weekly contests that run over a short period of time. All contests will be free to enter but Daily Sport Boss will still provide an opportunity for users to win real cash prizes!
            <br/>
            <br/>
            The Daily Sport Boss platform allows users to experience more flexibility with no long-term commitment, and more excitement with better sport statistics used.
            <br/>
            <br/>
            Come and play on the Daily Sport Boss application today and show to them who's Boss.
        </div>
        <div class="container container-4">
          <div class="col-md-10 col-xs-12 box-center">
            <div class="col-md-2 col-xs-8 ball-img">
              <img class="img-responsive img-ball" src="<?php echo  base_url(); ?>/img/dsb/ball1.png">
              <span class="ball-description">EPL</span>
            </div>
            <div class="col-md-2 col-xs-8 ball-img">
              <img class="img-responsive img-ball" src="<?php echo  base_url(); ?>/img/dsb/ball2.png">
              <span class="ball-description">Champions Leagua</span>
            </div>
            <div class="col-md-2 col-xs-8 ball-img">
              <img class="img-responsive img-ball" src="<?php echo  base_url(); ?>/img/dsb/ball3.png">
              <span class="ball-description opacity">Series A</span>
            </div>
            <div class="col-md-2 col-xs-8 ball-img">
              <img class="img-responsive img-ball" src="<?php echo  base_url(); ?>/img/dsb/ball4.png">
              <span class="ball-description opacity">LA LIGA</span>
            </div>
            <div class="col-md-2 col-xs-8 ball-img">
              <img class="img-responsive img-ball" src="<?php echo  base_url(); ?>/img/dsb/ball5.png">
              <span class="ball-description opacity">NBA</span>
            </div>
            <div class="col-md-2 col-xs-8 ball-img">
              <img class="img-responsive img-ball" src="<?php echo  base_url(); ?>/img/dsb/more.png">
              <span class="ball-description opacity">MORE</span>
            </div>
          </div>
        </div>

        <div class="container container-5">
            <div class="col-md-12 col-xs-12">
              <h3>Subscribe now!</h3>
            </div>
            <br/>
            <div class="col-md-9 text-center box-center box-subscribe">
                <?php
                $attributes = array('id'  =>   'subscribe');

                echo form_open('about/subscribe', $attributes);
                ?>
                <div class="input-group">
                    <div class="col-md-6 col-xs-12 col-sm-12 padding-5">
                        <input type="text" class="form-control" name="email" placeholder="ENTER YOUR EMAIL" required>
                    </div>
                    <div class="col-md-4 col-xs-12 col-sm-12 padding-5">
                        <select id="country" name="country" class="form-control text-center" required>
                            <option value="">COUNTRY</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antartica">Antartica</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Ashmore and Cartier Island">Ashmore and Cartier Island</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Brazil">Brazil</option>
                            <option value="British Virgin Islands">British Virgin Islands</option>
                            <option value="Brunei">Brunei</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burma">Burma</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Clipperton Island">Clipperton Island</option>
                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                            <option value="Congo, Republic of the">Congo, Republic of the</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czeck Republic">Czeck Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Europa Island">Europa Island</option>
                            <option value="Falkland Islands (Islas Malvinas)">Falkland Islands (Islas Malvinas)</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern and Antarctic Lands">French Southern and Antarctic Lands</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia, The">Gambia, The</option>
                            <option value="Gaza Strip">Gaza Strip</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Glorioso Islands">Glorioso Islands</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernsey">Guernsey</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                            <option value="Holy See (Vatican City)">Holy See (Vatican City)</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Howland Island">Howland Island</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran">Iran</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Ireland, Northern">Ireland, Northern</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Jan Mayen">Jan Mayen</option>
                            <option value="Japan">Japan</option>
                            <option value="Jarvis Island">Jarvis Island</option>
                            <option value="Jersey">Jersey</option>
                            <option value="Johnston Atoll">Johnston Atoll</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Juan de Nova Island">Juan de Nova Island</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea, North">Korea, North</option>
                            <option value="Korea, South">Korea, South</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Laos">Laos</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libya">Libya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macau">Macau</option>
                            <option value="Macedonia, Former Yugoslav Republic of">Macedonia, Former Yugoslav Republic of</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Man, Isle of">Man, Isle of</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                            <option value="Midway Islands">Midway Islands</option>
                            <option value="Moldova">Moldova</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">Norfolk Island</option>
                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcaim Islands">Pitcaim Islands</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romainia">Romainia</option>
                            <option value="Russia">Russia</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Helena">Saint Helena</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Scotland">Scotland</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Georgia and South Sandwich Islands">South Georgia and South Sandwich Islands</option>
                            <option value="Spain">Spain</option>
                            <option value="Spratly Islands">Spratly Islands</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Svalbard">Svalbard</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syria">Syria</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Tobago">Tobago</option>
                            <option value="Toga">Toga</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad">Trinidad</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="USA">USA</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Virgin Islands">Virgin Islands</option>
                            <option value="Wales">Wales</option>
                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                            <option value="West Bank">West Bank</option>
                            <option value="Western Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Yugoslavia">Yugoslavia</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-12 padding-5">
                        <input type="submit" class="btn btn-secondary subscribe" value="" ></input>
                    </div>
                    <?php echo $this->session->flashdata('subscribe_success'); ?>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
  <div class="container">
    <div class="row visible-md visible-lg">
      <div class="col-md-3">
        <div class="dsb-footer-about-title">About</div>
        <ul class="dsb-footer-about-ul">
          <li><a href="<?php echo  base_url(); ?>about/dsb/">Daily Sport Boss</a></li>
          <li><a href="<?php echo  base_url(); ?>about/partnership/">Partnership Opportunities</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <div class="dsb-footer-support-title">More</div>
        <ul class="dsb-footer-about-ul">
          <li><a href="<?php echo  base_url(); ?>/info/termsofuse/">Terms of Use</a></li>
          <li><a href="<?php echo  base_url(); ?>/info/privacy/">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="col-md-3">
      </div>
      <div class="col-md-3">
        <div class="dsb-footer-getintouch-title">PT Daily Sport Boss</div>
        <div class="dsb-footer-getintouch-description">
          <span class="orange-text">Jakarta, Indonesia</span><br>
          <a href="http://www.facebook.com/dailysportboss" class="text-gray">Facebook</a><br>
          <a href="http://www.twitter.com/dailysportboss" class="text-gray">Twitter</a><br>
          <a href="http://www.instagram.com/dailysportboss" class="text-gray">Instagram</a><br><br>
        </div>
      </div>
    </div>
    <div class="row visible-xs visible-sm">
      <div class="col-xs-12 col-sm-12 text-center">
        <div class="dsb-footer-about-title">About</div>
        <ul class="dsb-footer-about-ul">
          <li><a href="<?php echo base_url(); ?>about/dsb/">Daily Sport Boss</a></li>
          <li><a href="<?php echo base_url(); ?>about/partnership/">Partnership Opportunities</a></li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-12 text-center">
        <div class="dsb-footer-support-title">More</div>
        <ul class="dsb-footer-about-ul">
          <li><a href="<?php echo base_url(); ?>/info/termsofuse/">Terms of Use</a></li>
          <li><a href="<?php echo base_url(); ?>/info/privacy/">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-12 text-center">
        <div class="dsb-footer-getintouch-title">PT Daily Sport Boss</div>
        <div class="dsb-footer-getintouch-description">
          <span class="orange-text">Jakarta, Indonesia</span><br>
          <a href="http://www.facebook.com/dailysportboss" class="text-gray">Facebook</a><br>
          <a href="http://www.twitter.com/dailysportboss" class="text-gray">Twitter</a><br>
          <a href="http://www.instagram.com/dailysportboss" class="text-gray">Instagram</a><br><br>
        </div>
      </div>
    </div>

    <br>
  </div>
  <div class="col-md-12 col-lg-12 box-copyright">
    <h5 class="text-center">Copyright Daily Sport Boss 2016</h5>
  </div>
</footer>
</body>
