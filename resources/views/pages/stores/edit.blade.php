
<div class="modal fade" id="modalEditStore" tabindex="-1" style="display: none;" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-600px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Edit Store</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body py-lg-10 px-lg-10">
                <form  action="{{ route('store.update') }}" method="POST" class="form"  >
                    @csrf
                    @method('PUT')
                    <!--begin::Add store-->
                    <div class="card card-flush py-4">
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <input type="hidden" name="id_update" value="" id="id_update">
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <!--begin::Label name-->
                                <label class="required form-label">Store Name</label>
                                <!--end::Label name-->
                                <!--begin::Input name-->
                                <input type="text" id="name" name="name" class="form-control mb-2" placeholder="Store name" value=""  required>
                                <!--end::Input name-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Input group-->

                             <!--begin::Input group-->
                             <div class="mb-10 fv-row fv-plugins-icon-container">
                                <!--begin::Label domain-->
                                <label class="required form-label">Domain</label>
                                <!--end::Label domain-->
                                <!--begin::Input domain-->
                                <input type="text" id="domain" name="domain" class="form-control mb-2" placeholder="Domain" value="" required="">
                                <!--end::Input domain-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>

                             <!--begin::Input group-->
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <!--begin::Label country_name-->
                                <label class="required form-label">Country name</label>
                                <!--end::Label country_name-->
                                <!--begin::input country_name-->
                                    <!--begin::Select country_name-->
                                    <select name="country_name_edit" id="country_name_edit" data-hide-search="true" class="form-select mb-2 select2-hidden-accessible" data-control="select2" data-hide-search="true" data-placeholder="Select an option"  data-select2-id="select2-data-kt_ecommerce_add_category_status_select" tabindex="-1" aria-hidden="true"  required>
                                            <option data-code="AFk55" data-id="AFN" value="Afghanistan">Afghanistan</option>
                                            <option data-code="AL" data-id="ALL" value="Albania">Albania</option>
                                            <option data-code="DZ" data-id="DZD" value="Algeria">Algeria</option>
                                            <option data-code="AD" data-id="EUR" value="Andorra">Andorra</option>
                                            <option data-code="AO" data-id="AOA" value="Angola">Angola</option>
                                            <option data-code="AG" data-id="XCD" value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option data-code="AR" data-id="ARS" value="Argentina">Argentina</option>
                                            <option data-code="AM" data-id="AMD" value="Armenia">Armenia</option>
                                            <option data-code="AU" data-id="AUD" value="Australia">Australia</option>
                                            <option data-code="AT" data-id="EUR" value="Austria">Austria</option>
                                            <option data-code="AZ" data-id="AZN" value="Azerbaijan">Azerbaijan</option>
                                            <option data-code="BS" data-id="BSD" value="Bahamas">Bahamas</option>
                                            <option data-code="BH" data-id="BHD" value="Bahrain">Bahrain</option>
                                            <option data-code="BD" data-id="BDT" value="Bangladesh">Bangladesh</option>
                                            <option data-code="BB" data-id="BBD" value="Barbados">Barbados</option>
                                            <option data-code="BY" data-id="BYN" value="Belarus">Belarus</option>
                                            <option data-code="BE" data-id="EUR" value="Belgium">Belgium</option>
                                            <option data-code="BZ" data-id="BZD" value="Belize">Belize</option>
                                            <option data-code="BJ" data-id="XOF" value="Benin">Benin</option>
                                            <option data-code="BT" data-id="BTN" value="Bhutan">Bhutan</option>
                                            <option data-code="BO" data-id="BOB" value="Bolivia">Bolivia</option>
                                            <option data-code="BA" data-id="BAM" value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option data-code="BW" data-id="BWP" value="Botswana">Botswana</option>
                                            <option data-code="BR" data-id="BRL" value="Brazil">Brazil</option>
                                            <option data-code="BN" data-id="BND" value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option data-code="BG" data-id="BGN" value="Bulgaria">Bulgaria</option>
                                            <option data-code="BF" data-id="XOF" value="Burkina Faso">Burkina Faso</option>
                                            <option data-code="BI" data-id="BIF" value="Burundi">Burundi</option>
                                            <option data-code="KH" data-id="KHR" value="Cambodia">Cambodia</option>
                                            <option data-code="CM" data-id="XAF" value="Cameroon">Cameroon</option>
                                            <option data-code="CA" data-id="CAD" value="Canada">Canada</option>
                                            <option data-code="CV" data-id="CVE" value="Cape Verde">Cape Verde</option>
                                            <option data-code="CF" data-id="XAF" value="Central African Republic">Central African Republic</option>
                                            <option data-code="TD" data-id="XAF" value="Chad">Chad</option>
                                            <option data-code="CL" data-id="CLP" value="Chile">Chile</option>
                                            <option data-code="CN" data-id="CNY" value="China">China</option>
                                            <option data-code="CO" data-id="COP" value="Colombia">Colombia</option>
                                            <option data-code="KM" data-id="KMF" value="Comoros">Comoros</option>
                                            <option data-code="CR" data-id="CRC" value="Costa Rica">Costa Rica</option>
                                            <option data-code="HR" data-id="HRK" value="Croatia">Croatia</option>
                                            <option data-code="CU" data-id="CUP" value="Cuba">Cuba</option>
                                            <option data-code="CY" data-id="EUR" value="Cyprus">Cyprus</option>
                                            <option data-code="CZ" data-id="CZK" value="Czech Republic">Czech Republic</option>
                                            <option data-code="DK" data-id="DKK" value="Denmark">Denmark</option>
                                            <option data-code="DJ" data-id="DJF" value="Djibouti">Djibouti</option>
                                            <option data-code="DM" data-id="XCD" value="Dominica">Dominica</option>
                                            <option data-code="DO" data-id="DOP" value="Dominican Republic">Dominican Republic</option>
                                            <option data-code="EC" data-id="USD" value="Ecuador">Ecuador</option>
                                            <option data-code="EG" data-id="EGP" value="Egypt">Egypt</option>
                                            <option data-code="SV" data-id="USD" value="El Salvador">El Salvador</option>
                                            <option data-code="GQ" data-id="XAF" value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option data-code="ER" data-id="ERN" value="Eritrea">Eritrea</option>
                                            <option data-code="EE" data-id="EUR" value="Estonia">Estonia</option>
                                            <option data-code="ET" data-id="ETB" value="Ethiopia">Ethiopia</option>
                                            <option data-code="FJ" data-id="FJD" value="Fiji">Fiji</option>
                                            <option data-code="FI" data-id="EUR" value="Finland">Finland</option>
                                            <option data-code="FR" data-id="EUR" value="France">France</option>
                                            <option data-code="GA" data-id="XAF" value="Gabon">Gabon</option>
                                            <option data-code="GM" data-id="GMD" value="Gambia">Gambia</option>
                                            <option data-code="GE" data-id="GEL" value="Georgia">Georgia</option>
                                            <option data-code="DE" data-id="EUR" value="Germany">Germany</option>
                                            <option data-code="GH" data-id="GHS" value="Ghana">Ghana</option>
                                            <option data-code="GR" data-id="EUR" value="Greece">Greece</option>
                                            <option data-code="GD" data-id="XCD" value="Grenada">Grenada</option>
                                            <option data-code="GT" data-id="GTQ" value="Guatemala">Guatemala</option>
                                            <option data-code="GN" data-id="GNF" value="Guinea">Guinea</option>
                                            <option data-code="GW" data-id="XOF" value="Guinea-Bissau">Guinea-Bissau</option>
                                            <option data-code="GY" data-id="GYD" value="Guyana">Guyana</option>
                                            <option data-code="HT" data-id="HTG" value="Haiti">Haiti</option>
                                            <option data-code="HN" data-id="HNL" value="Honduras">Honduras</option>
                                            <option data-code="HU" data-id="HUF" value="Hungary">Hungary</option>
                                            <option data-code="IS" data-id="ISK" value="Iceland">Iceland</option>
                                            <option data-code="IN" data-id="INR" value="India">India</option>
                                            <option data-code="ID" data-id="IDR" value="Indonesia">Indonesia</option>
                                            <option data-code="IR" data-id="IRR" value="Iran">Iran</option>
                                            <option data-code="IQ" data-id="IQD" value="Iraq">Iraq</option>
                                            <option data-code="IE" data-id="EUR" value="Ireland">Ireland</option>
                                            <option data-code="IT" data-id="EUR" value="Italy">Italy</option>
                                            <option data-code="JM" data-id="JMD" value="Jamaica">Jamaica</option>
                                            <option data-code="JP" data-id="JPY" value="Japan">Japan</option>
                                            <option data-code="JO" data-id="JOD" value="Jordan">Jordan</option>
                                            <option data-code="KZ" data-id="KZT" value="Kazakhstan">Kazakhstan</option>
                                            <option data-code="KE" data-id="KES" value="Kenya">Kenya</option>
                                            <option data-code="KI" data-id="KES" value="Kiribati">Kiribati</option>
                                            <option data-code="KP" data-id="KPW" value="Korea North">Korea North</option>
                                            <option data-code="KR" data-id="KRW" value="Korea South">Korea South</option>
                                            <option data-code="XK" data-id="EUR" value="Kosovo">Kosovo</option>
                                            <option data-code="KW" data-id="KWD" value="Kuwait">Kuwait</option>
                                            <option data-code="KG" data-id="KGS" value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option data-code="LA" data-id="LAK" value="Laos">Laos</option>
                                            <option data-code="LV" data-id="EUR" value="Latvia">Latvia</option>
                                            <option data-code="LB" data-id="LBP" value="Lebanon">Lebanon</option>
                                            <option data-code="LS" data-id="LSL" value="Lesotho">Lesotho</option>
                                            <option data-code="LR" data-id="LRD" value="Liberia">Liberia</option>
                                            <option data-code="LY" data-id="LYD" value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                            <option data-code="LI" data-id="CHF" value="Liechtenstein">Liechtenstein</option>
                                            <option data-code="LT" data-id="EUR" value="Lithuania">Lithuania</option>
                                            <option data-code="LU" data-id="EUR" value="Luxembourg">Luxembourg</option>
                                            <option data-code="MG" data-id="MGA" value="Madagascar">Madagascar</option>
                                            <option data-code="MW" data-id="MWK" value="Malawi">Malawi</option>
                                            <option data-code="MY" data-id="MYR" value="Malaysia">Malaysia</option>
                                            <option data-code="MV" data-id="MVR" value="Maldives">Maldives</option>
                                            <option data-code="ML" data-id="XOF" value="Mali">Mali</option>
                                            <option data-code="MT" data-id="EUR" value="Malta">Malta</option>
                                            <option data-code="MH" data-id="USD" value="Marshall Islands">Marshall Islands</option>
                                            <option data-code="MR" data-id="MRO" value="Mauritania">Mauritania</option>
                                            <option data-code="MU" data-id="MUR" value="Mauritius">Mauritius</option>
                                            <option data-code="MX" data-id="MXN" value="Mexico">Mexico</option>
                                            <option data-code="FM" data-id="USD" value="Micronesia">Micronesia</option>
                                            <option data-code="MD" data-id="MDL" value="Moldova">Moldova</option>
                                            <option data-code="MC" data-id="EUR" value="Monaco">Monaco</option>
                                            <option data-code="MN" data-id="MNT" value="Mongolia">Mongolia</option>
                                            <option data-code="ME" data-id="EUR" value="Montenegro">Montenegro</option>
                                            <option data-code="MA" data-id="MAD" value="Morocco">Morocco</option>
                                            <option data-code="MZ" data-id="MZN" value="Mozambique">Mozambique</option>
                                            <option data-code="MM" data-id="MMK" value="Myanmar">Myanmar</option>
                                            <option data-code="NA" data-id="NAD" value="Namibia">Namibia</option>
                                            <option data-code="NR" data-id="AUD" value="Nauru">Nauru</option>
                                            <option data-code="NP" data-id="NPR" value="Nepal">Nepal</option>
                                            <option data-code="NL" data-id="EUR" value="Netherlands">Netherlands</option>
                                            <option data-code="NZ" data-id="NZD" value="New Zealand">New Zealand</option>
                                            <option data-code="NI" data-id="NIO" value="Nicaragua">Nicaragua</option>
                                            <option data-code="NE" data-id="XOF" value="Niger">Niger</option>
                                            <option data-code="NG" data-id="NGN" value="Nigeria">Nigeria</option>
                                            <option data-code="NO" data-id="NOK" value="Norway">Norway</option>
                                            <option data-code="OM" data-id="OMR" value="Oman">Oman</option>
                                            <option data-code="PK" data-id="PKR" value="Pakistan">Pakistan</option>
                                            <option data-code="PW" data-id="USD" value="Palau">Palau</option>
                                            <option data-code="PS" data-id="ILS" value="Palestine">Palestine</option>
                                            <option data-code="PA" data-id="PAB" value="Panama">Panama</option>
                                            <option data-code="PG" data-id="PGK" value="Papua New Guinea">Papua New Guinea</option>
                                            <option data-code="PY" data-id="PYG" value="Paraguay">Paraguay</option>
                                            <option data-code="PE" data-id="PEN" value="Peru">Peru</option>
                                            <option data-code="PH" data-id="PHP" value="Philippines">Philippines</option>
                                            <option data-code="PL" data-id="PLN" value="Poland">Poland</option>
                                            <option data-code="PT" data-id="EUR" value="Portugal">Portugal</option>
                                            <option data-code="QA" data-id="QAR" value="Qatar">Qatar</option>
                                            <option data-code="RE" data-id="XAF" value="Republic of the Congo">Republic of the Congo</option>
                                            <option data-code="RO" data-id="RON" value="Romania">Romania</option>
                                            <option data-code="RU" data-id="RUB" value="Russian Federation">Russian Federation</option>
                                            <option data-code="RW" data-id="RWF" value="Rwanda">Rwanda</option>
                                            <option data-code="KN" data-id="XCD" value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option data-code="LC" data-id="XCD" value="Saint Lucia">Saint Lucia</option>
                                            <option data-code="VC" data-id="XCD" value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                            <option data-code="WS" data-id="WST" value="Samoa">Samoa</option>
                                            <option data-code="SM" data-id="EUR" value="San Marino">San Marino</option>
                                            <option data-code="ST" data-id="STD" value="Sao Tome and Principe">Sao Tome and Principe</option>
                                            <option data-code="SA" data-id="SAR" value="Saudi Arabia">Saudi Arabia</option>
                                            <option data-code="SN" data-id="XOF" value="Senegal">Senegal</option>
                                            <option data-code="RS" data-id="RSD" value="Serbia">Serbia</option>
                                            <option data-code="SC" data-id="SCR" value="Seychelles">Seychelles</option>
                                            <option data-code="SL" data-id="SLL" value="Sierra Leone">Sierra Leone</option>
                                            <option data-code="SG" data-id="SGD" value="Singapore">Singapore</option>
                                            <option data-code="SK" data-id="EUR" value="Slovakia">Slovakia</option>
                                            <option data-code="SI" data-id="EUR" value="Slovenia">Slovenia</option>
                                            <option data-code="SB" data-id="SBD" value="Solomon Islands">Solomon Islands</option>
                                            <option data-code="SO" data-id="SOS" value="Somalia">Somalia</option>
                                            <option data-code="ZA" data-id="ZAR" value="South Africa">South Africa</option>
                                            <option data-code="SS" data-id="SSP" value="South Sudan">South Sudan</option>
                                            <option data-code="ES" data-id="EUR" value="Spain">Spain</option>
                                            <option data-code="LK" data-id="LKR" value="Sri Lanka">Sri Lanka</option>
                                            <option data-code="SD" data-id="SDG" value="Sudan">Sudan</option>
                                            <option data-code="SR" data-id="SRD" value="Suriname">Suriname</option>
                                            <option data-code="SE" data-id="SEK" value="Sweden">Sweden</option>
                                            <option data-code="CH" data-id="CHF" value="Switzerland">Switzerland</option>
                                            <option data-code="SY" data-id="SYP" value="Syrian Arab Republic">Syrian Arab Republic</option>
                                            <option data-code="TW" data-id="TWD" value="Taiwan, Province of China">Taiwan, Province of China</option>
                                            <option data-code="TJ" data-id="TJS" value="Tajikistan">Tajikistan</option>
                                            <option data-code="TZ" data-id="TZS" value="Tanzania">Tanzania</option>
                                            <option data-code="TH" data-id="THB" value="Thailand">Thailand</option>
                                            <option data-code="TG" data-id="XOF" value="Togo">Togo</option>
                                            <option data-code="TO" data-id="TOP" value="Tonga">Tonga</option>
                                            <option data-code="TT" data-id="TTD" value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option data-code="TN" data-id="TND" value="Tunisia">Tunisia</option>
                                            <option data-code="TR" data-id="TRY" value="Turkey">Turkey</option>
                                            <option data-code="TM" data-id="TMT" value="Turkmenistan">Turkmenistan</option>
                                            <option data-code="TV" data-id="AUD" value="Tuvalu">Tuvalu</option>
                                            <option data-code="UG" data-id="UGX" value="Uganda">Uganda</option>
                                            <option data-code="UA" data-id="UAH" value="Ukraine">Ukraine</option>
                                            <option data-code="AE" data-id="AED" value="United Arab Emirates">United Arab Emirates</option>
                                            <option data-code="GB" data-id="GBP" value="United Kingdom">United Kingdom</option>
                                            <option data-code="US" data-id="USD" value="United States">United States</option>
                                            <option data-code="UY" data-id="UYU" value="Uruguay">Uruguay</option>
                                            <option data-code="UZ" data-id="UZS" value="Uzbekistan">Uzbekistan</option>
                                            <option data-code="VU" data-id="VUV" value="Vanuatu">Vanuatu</option>
                                            <option data-code="VE" data-id="VEF" value="Venezuela">Venezuela</option>
                                            <option data-code="VN" data-id="VND" value="Viet Nam">Viet Nam</option>
                                            <option data-code="YE" data-id="YER" value="Yemen">Yemen</option>
                                            <option data-code="ZM" data-id="ZMW" value="Zambia">Zambia</option>
                                            <option data-code="ZW" data-id="USD" value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                    <!--end::Select country_name-->
                                <!--end::input country_name-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Input group-->

                             <!--begin::Input group-->
                             <div class="mb-10 fv-row fv-plugins-icon-container">
                                <!--begin::Label country_code-->
                                <label class="required form-label">Country code</label>
                                <!--end::Label country_code-->
                                <!--begin::Input country_code-->
                                <input type="text" name="country_code_edit" id="country_code_edit" class="form-control mb-2" placeholder="Country code" value=""  required>
                                <!--end::Input country_code-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Input group-->

                             <!--begin::Input group-->
                             <div class="mb-10 fv-row fv-plugins-icon-container">
                                <!--begin::Label currency-->
                                <label class="required form-label">Currency</label>
                                <!--end::Label currency-->
                                <!--begin::Input currency-->
                                <input type="text" name="currency_edit" id="currency_edit" class="form-control mb-2" placeholder="Currency" value="" required>
                                <!--end::Input currency-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Input group-->

                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Add store-->

                    <div class="d-flex justify-content-end">
                       <!--begin::Button-->
                       <a href="{{ Route('store') }}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
                       <!--end::Button-->
                       <!--begin::Button-->
                       <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                           <span class="indicator-label">Save changes</span>
                           <span class="indicator-progress">Please wait...
                           <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                       </button>
                       <!--end::Button-->
                </form>

            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>



