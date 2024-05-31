@extends('layouts.master')
@section('title')
    {{ __('translation.Clients') }}
@endsection
@section('css')
    <!-- Sweet Alert css-->
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <!--datatable css-->
    <link href="{{ URL::asset('build/libs/datatable/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/datatable/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert css-->
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <style>
        .dataTable {
            width: 100% !important;
        }

        .dataTables_filter {
            width: calc(25% - 52px);
            float: right;
        }
    </style>
@endsection

@section('body')

    <body>
    @endsection

    @section('content')
        @component('components.breadcrumb')
            @slot('title')
                {{ __('translation.Clients') }}
            @endslot
            @slot('pagetitle')
                {{ __('translation.Client List') }}
            @endslot
        @endcomponent

        <div class="row pb-4 gy-3">
            <div class="col-sm-4">
                <button class="btn btn-primary addPayment-modal" data-bs-toggle="modal" data-bs-target="#addClientModal"><i
                        class="las la-plus me-1"></i> {{ __('translation.Add Client') }}</button>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table nowrap dt-responsive align-middle table-hover table-bordered mb-0"
                                id="clientListTable">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('translation.Sr. No') }}</th>
                                        <th scope="col">{{ __('translation.Client Name') }}</th>
                                        <th scope="col">{{ __('translation.Company Name') }}</th>
                                        <th scope="col">{{ __('translation.Email') }}</th>
                                        <th scope="col">{{ __('translation.Country') }}</th>
                                        <th scope="col">{{ __('translation.Mobile') }}</th>
                                        <th scope="col">{{ __('translation.Registered On') }}</th>
                                        <th scope="col">{{ __('translation.Status') }}</th>
                                        <th scope="col" style="width: 12%;">{{ __('translation.Action') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    {{-- Tabel values are getting from Yajra datatable ajax --}}
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->

                            @foreach ($clients as $key => $client)
                                <input type="hidden" id="first_name_{{ $client['id'] }}"
                                    value="{{ @$client['first_name'] }}">
                                <input type="hidden" id="last_name_{{ $client['id'] }}"
                                    value="{{ @$client['last_name'] }}">
                                <input type="hidden" id="email_{{ $client['id'] }}" value="{{ @$client['email'] }}">
                                <input type="hidden" id="username_{{ $client['id'] }}"
                                    value="{{ @$client['username'] }}">
                                <input type="hidden" id="country_{{ $client['id'] }}" value="{{ @$client['country'] }}">
                                <input type="hidden" id="mobile_number_{{ $client['id'] }}"
                                    value="{{ @$client['mobile_number'] }}">
                                <input type="hidden" id="profile_image_{{ $client['id'] }}"
                                    value="{{ URL::asset('build/images/users/' . $client['profile_image']) }}">
                                <input type="hidden" id="company_name_{{ $client['id'] }}"
                                    value="{{ @$client['clientDetails']['company_name'] }}">
                                <input type="hidden" id="gst_number_{{ $client['id'] }}"
                                    value="{{ @$client['clientDetails']['gst_number'] }}">
                                <input type="hidden" id="company_code_{{ $client['id'] }}"
                                    value="{{ @$client['clientDetails']['company_code'] }}">
                                <input type="hidden" id="address_{{ $client['id'] }}"
                                    value="{{ @$client['clientDetails']['address'] }}">
                            @endforeach

                        </div><!-- end table responsive -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Modal -->
        <div class="modal fade" id="addClientModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0">
                    <div class="modal-header p-4 pb-0">
                        <h5 class="modal-title" id="createMemberLabel">{{ __('translation.Add Client') }}</h5>
                        <button type="button" class="btn-close" id="createMemberBtn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form method="POST" action="{{ url('add-client') }}" autocomplete="off" id="clientform"
                            class="needs-validation" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="hidden" id="memberid-input" class="form-control" value="">
                                    <div class="text-center mb-2">
                                        <div class="position-relative d-inline-block">
                                            <div class="position-absolute bottom-0 end-0">
                                                <label for="member-image-input" class="mb-0" data-bs-toggle="tooltip"
                                                    data-bs-placement="right" title="Select Client Image">
                                                    <div class="avatar-xs">
                                                        <div
                                                            class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                            <i class="ri-image-fill"></i>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input
                                                    class="form-control d-none @error('profile_image') is-invalid @enderror"
                                                    value="" id="member-image-input" type="file"
                                                    name="profile_image" accept="image/png, image/gif, image/jpeg"
                                                    onchange="displayProfile(this)" required>
                                                <div class="invalid-feedback">Please select image.</div>
                                            </div>
                                            <div class="avatar-lg">
                                                <div class="avatar-title bg-light rounded-circle">
                                                    <img src="{{ URL::asset('/build/images/users/user-dummy-img.jpg') }}"
                                                        id="member-img" class="avatar-md rounded-circle h-auto" />
                                                </div>
                                            </div>
                                        </div>
                                        @error('profile_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="firstName"
                                                class="form-label">{{ __('translation.First Name') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                id="firstName" name="first_name" placeholder="Enter first name" required>

                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="lastsName"
                                                class="form-label">{{ __('translation.Last Name') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                id="lastsName" name="last_name" placeholder="Enter last name" required>

                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="username"
                                                class="form-label">{{ __('translation.Username') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror"
                                                id="username" name="username" placeholder="Enter username" required>

                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="mobile_number"
                                                class="form-label">{{ __('translation.Mobile') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="number"
                                                class="form-control @error('mobile_number') is-invalid @enderror"
                                                id="mobile_number" name="mobile_number" placeholder="Enter mobile"
                                                required>

                                            @error('mobile_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="email" class="form-label">{{ __('translation.Email') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                name="email" placeholder="Enter email" required>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="country" class="form-label">{{ __('translation.Country') }}<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="country" required>
                                                <option value="">Select Country</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antartica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
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
                                                <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean
                                                    Territory</option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
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
                                                <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo">Congo, the Democratic Republic of the</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                                <option value="Croatia">Croatia (Hrvatska)</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="East Timor">East Timor</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="France Metropolitan">France, Metropolitan</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories
                                                </option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard and McDonald Islands">Heard and Mc Donald Islands
                                                </option>
                                                <option value="Holy See">Holy See (Vatican City State)</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran">Iran (Islamic Republic of)</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Democratic People's Republic of Korea">Korea, Democratic
                                                    People's Republic of</option>
                                                <option value="Korea">Korea, Republic of</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Lao">Lao People's Democratic Republic</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macau">Macau</option>
                                                <option value="Macedonia">Macedonia, The Former Yugoslav Republic of
                                                </option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia">Micronesia, Federated States of</option>
                                                <option value="Moldova">Moldova, Republic of</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
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
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russia">Russian Federation</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint LUCIA">Saint LUCIA</option>
                                                <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia">South Georgia and the South Sandwich Islands
                                                </option>
                                                <option value="Span">Spain</option>
                                                <option value="SriLanka">Sri Lanka</option>
                                                <option value="St. Helena">St. Helena</option>
                                                <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syria">Syrian Arab Republic</option>
                                                <option value="Taiwan">Taiwan, Province of China</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania">Tanzania, United Republic of</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">United States Minor
                                                    Outlying Islands</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Vietnam">Viet Nam</option>
                                                <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                                <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                                <option value="Wallis and Futana Islands">Wallis and Futuna Islands
                                                </option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>

                                            @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-2">
                                                <label for="userpassword" class="form-label">Password <span
                                                        class="text-danger">*</span></label>
                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <input type="password"
                                                        class="form-control pe-5 @error('password') is-invalid @enderror"
                                                        placeholder="Enter password" id="password-input" name="password">
                                                </div>

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="d-flex p-2 bg-success bg-gradient text-white">
                                        <strong>{{ __('translation.Company Details') }}</strong>
                                    </div>

                                    <div class="mt-2">
                                        <div class="col-lg-12 mb-2 mt-2">
                                            <label for="companyName"
                                                class="form-label">{{ __('translation.Company Name') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('company_name') is-invalid @enderror"
                                                id="companyName" name="company_name" placeholder="Enter company name"
                                                required>

                                            @error('company_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="gst_number" class="form-label">{{ __('translation.GST Number') }}
                                                <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('gst_number') is-invalid @enderror"
                                                id="gst_number" name="gst_number" required placeholder="Enter GST">

                                            @error('gst_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="company_code"
                                                class="form-label">{{ __('translation.Company Code') }}<span
                                                    class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <input type="text"
                                                    class="form-control @error('company_code') is-invalid @enderror"
                                                    id="company_code" name="company_code"
                                                    placeholder="Enter company code" required>
                                                <button type="button"
                                                    class="btn btn-success position-absolute top-0 end-0"
                                                    id="generateCode" data-bs-toggle="tooltip" data-bs-placement="right"
                                                    title="Generat Random" onclick="randomValue();"><i
                                                        class="las la-random"></i></button>

                                                @error('company_code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2 mt-2">
                                        <label for="companyAddress"
                                            class="form-label">{{ __('translation.Company Address') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control @error('company_address') is-invalid @enderror" id="companyAddress"
                                            name="company_address" placeholder="Enter company address" required rows="4"></textarea>

                                        @error('company_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">{{ __('translation.Close') }}</button>
                                        <button type="submit" class="btn btn-success"
                                            id="addNewClient">{{ __('translation.Add Client') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--end modal-content-->
            </div>
            <!--end modal-dialog-->
        </div>
        <!-- END Add Modal -->

        <!-- Edit Modal -->
        <div class="modal fade" id="editClientModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0">
                    <div class="modal-header p-4 pb-0">
                        <h5 class="modal-title" id="createMemberLabel">{{ __('translation.Edit Client') }}</h5>
                        <button type="button" class="btn-close" id="createMemberBtn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form method="POST" action="{{ url('update-client') }}" autocomplete="off" id="clientform"
                            class="needs-validation" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="hidden" id="memberid-input" class="form-control" value="">
                                    <input type="hidden" id="clientId" name="clientId" value="">
                                    <div class="text-center mb-2">
                                        <div class="position-relative d-inline-block">
                                            <div class="position-absolute bottom-0 end-0">
                                                <label for="editClientProfile" class="mb-0" data-bs-toggle="tooltip"
                                                    data-bs-placement="right" title="Select Client Image">
                                                    <div class="avatar-xs">
                                                        <div
                                                            class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                            <i class="ri-image-fill"></i>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input
                                                    class="form-control d-none @error('profile_image') is-invalid @enderror"
                                                    value="" id="editClientProfile" type="file"
                                                    name="profile_image" accept="image/png, image/gif, image/jpeg"
                                                    onchange="editProfile(this)">
                                                <div class="invalid-feedback">Please select image.</div>
                                            </div>
                                            <div class="avatar-lg">
                                                <div class="avatar-title bg-light rounded-circle">
                                                    <img src="{{ URL::asset('/build/images/users/user-dummy-img.jpg') }}"
                                                        id="editClientImage" class="avatar-md rounded-circle h-auto" />
                                                </div>
                                            </div>
                                        </div>
                                        @error('profile_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="editFirstName"
                                                class="form-label">{{ __('translation.First Name') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                id="editFirstName" name="first_name" placeholder="Enter first name"
                                                required>

                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="editLastName"
                                                class="form-label">{{ __('translation.Last Name') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                id="editLastName" name="last_name" placeholder="Enter last name"
                                                required>

                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="editUsername"
                                                class="form-label">{{ __('translation.Username') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror"
                                                id="editUsername" name="username" placeholder="Enter username" required>

                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="editMobileNumber"
                                                class="form-label">{{ __('translation.Mobile') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="number"
                                                class="form-control @error('mobile_number') is-invalid @enderror"
                                                id="editMobileNumber" name="mobile_number" placeholder="Enter mobile"
                                                required>

                                            @error('mobile_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="editEmail" class="form-label">{{ __('translation.Email') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="editEmail"
                                                name="email" placeholder="Enter email" required>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="editCountry"
                                                class="form-label">{{ __('translation.Country') }}<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="country" id="editCountry" required>
                                                <option value="">Select Country</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antartica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
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
                                                <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean
                                                    Territory</option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
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
                                                <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo">Congo, the Democratic Republic of the</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                                <option value="Croatia">Croatia (Hrvatska)</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="East Timor">East Timor</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="France Metropolitan">France, Metropolitan</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories
                                                </option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard and McDonald Islands">Heard and Mc Donald Islands
                                                </option>
                                                <option value="Holy See">Holy See (Vatican City State)</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran">Iran (Islamic Republic of)</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Democratic People's Republic of Korea">Korea, Democratic
                                                    People's Republic of</option>
                                                <option value="Korea">Korea, Republic of</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Lao">Lao People's Democratic Republic</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macau">Macau</option>
                                                <option value="Macedonia">Macedonia, The Former Yugoslav Republic of
                                                </option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia">Micronesia, Federated States of</option>
                                                <option value="Moldova">Moldova, Republic of</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
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
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russia">Russian Federation</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint LUCIA">Saint LUCIA</option>
                                                <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia">South Georgia and the South Sandwich Islands
                                                </option>
                                                <option value="Span">Spain</option>
                                                <option value="SriLanka">Sri Lanka</option>
                                                <option value="St. Helena">St. Helena</option>
                                                <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syria">Syrian Arab Republic</option>
                                                <option value="Taiwan">Taiwan, Province of China</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania">Tanzania, United Republic of</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">United States Minor
                                                    Outlying Islands</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Vietnam">Viet Nam</option>
                                                <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                                <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                                <option value="Wallis and Futana Islands">Wallis and Futuna Islands
                                                </option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>

                                            @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="d-flex p-2 bg-success bg-gradient text-white">
                                        <strong>{{ __('translation.Company Details') }}</strong>
                                    </div>

                                    <div class="mt-2">
                                        <div class="col-lg-12 mb-2 mt-2">
                                            <label for="editCompanyName"
                                                class="form-label">{{ __('translation.Company Name') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('company_name') is-invalid @enderror"
                                                id="editCompanyName" name="company_name" placeholder="Enter company name"
                                                required>

                                            @error('company_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="editGstNumber"
                                                class="form-label">{{ __('translation.GST Number') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('gst_number') is-invalid @enderror"
                                                id="editGstNumber" name="gst_number" required placeholder="Enter GST">

                                            @error('gst_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="editCompanyCode"
                                                class="form-label">{{ __('translation.Company Code') }}<span
                                                    class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <input type="text"
                                                    class="form-control @error('company_code') is-invalid @enderror"
                                                    id="editCompanyCode" name="company_code"
                                                    placeholder="Enter company code" required>
                                                <button type="button"
                                                    class="btn btn-success position-absolute top-0 end-0"
                                                    id="editGenerateCode" data-bs-toggle="tooltip"
                                                    data-bs-placement="right" title="Generat Random"
                                                    onclick="editRandomValue();"><i class="las la-random"></i></button>

                                                @error('company_code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2 mt-2">
                                        <label for="editAddress"
                                            class="form-label">{{ __('translation.Company Address') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control @error('company_address') is-invalid @enderror" id="editAddress" name="address"
                                            placeholder="Enter company address" required rows="4"></textarea>

                                        @error('company_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">{{ __('translation.Close') }}</button>
                                        <button type="submit" class="btn btn-success"
                                            id="addNewClient">{{ __('translation.Update Client') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--end modal-content-->
            </div>
            <!--end modal-dialog-->
        </div>
        <!-- END Edit Modal-->

        <!-- View Modal -->
        <div class="modal fade" id="viewClientModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0">
                    <div class="modal-header p-4 pb-0">
                        <h5 class="modal-title" id="createMemberLabel">{{ __('translation.View Client') }}</h5>
                        <button type="button" class="btn-close" id="createMemberBtn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form method="POST" action="#" autocomplete="off" id="clientform" class="needs-validation"
                            enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="hidden" id="memberid-input" class="form-control" value="">
                                    <div class="text-center mb-2">
                                        <div class="position-relative d-inline-block">
                                            <div class="avatar-lg">
                                                <div class="avatar-title bg-light rounded-circle">
                                                    <img src="{{ URL::asset('/build/images/users/user-dummy-img.jpg') }}"
                                                        id="viewClientImage" class="avatar-md rounded-circle h-auto" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="firstName"
                                                class="form-label">{{ __('translation.First Name') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="viewFirstName" readonly>
                                        </div>
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="lastsName"
                                                class="form-label">{{ __('translation.Last Name') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="viewLastName" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="username"
                                                class="form-label">{{ __('translation.Username') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="viewUsername" readonly>
                                        </div>
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="mobile_number"
                                                class="form-label">{{ __('translation.Mobile') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="viewMobileNumber" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="email"
                                                class="form-label">{{ __('translation.Email') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="viewEmail" name="email"
                                                readonly>
                                        </div>
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="country"
                                                class="form-label">{{ __('translation.Country') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="viewCountry"
                                                name="country" readonly>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="d-flex p-2 bg-success bg-gradient text-white">
                                        <strong>{{ __('translation.Company Details') }}</strong>
                                    </div>

                                    <div class="mt-2">
                                        <div class="col-lg-12 mb-2 mt-2">
                                            <label for="companyName"
                                                class="form-label">{{ __('translation.Company Name') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="viewCompanyName" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="gst_number"
                                                class="form-label">{{ __('translation.GST Number') }}</label>
                                            <input type="text" class="form-control" id="viewGstNumber" readonly>
                                        </div>

                                        <div class="col-lg-6 mb-2 mt-2">
                                            <label for="company_code"
                                                class="form-label">{{ __('translation.Company Code') }}<span
                                                    class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" id="viewCompanyCode"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2 mt-2">
                                        <label for="address"
                                            class="form-label">{{ __('translation.Company Address') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" id="viewAddress" rows="6" readonly></textarea>
                                    </div>

                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">{{ __('translation.Close') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--end modal-content-->
            </div>
            <!--end modal-dialog-->
        </div>
        <!-- END View Modal-->
    @endsection

    @section('scripts')
        <!-- Sweet Alerts js -->
        <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <!-- jquery -->
        <script src="{{ URL::asset('build/js/jquery-3.6.4.min.js') }}"></script>
        <!--datatable js-->
        <script src="{{ URL::asset('build/libs/datatable/jquery.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/datatable/dataTables.bootstrap5.min.js') }}"></script>
        <!-- Sweet Alerts js -->
        <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script>
            //Client form validate 
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')
            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })


            $(document).ready(function() {
                $('#clientListTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('client-list') }}",
                    columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    }, {
                        data: 'client_name',
                        name: 'client_name'
                    }, {
                        data: 'company_name',
                        name: 'company_name'
                    }, {
                        data: 'email',
                        name: 'email'
                    }, {
                        data: 'country',
                        name: 'country'
                    }, {
                        data: 'mobile_number',
                        name: 'mobile_number'
                    }, {
                        data: 'created_at',
                        name: 'created_at'
                    }, {
                        data: 'status',
                        name: 'status'
                    }, {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }, ],
                    pagingType: 'full_numbers',
                    drawCallback: function() {
                        viewClientData();
                        editClientData();
                    }
                });
            });


            function viewClientData(clientId) {
                if (clientId) {
                    document.getElementById('viewFirstName').value = document.getElementById('first_name_' + clientId)
                        .value;
                    document.getElementById('viewLastName').value = document.getElementById('last_name_' + clientId)
                        .value;
                    document.getElementById('viewEmail').value = document.getElementById('email_' + clientId).value;
                    document.getElementById('viewUsername').value = document.getElementById('username_' + clientId)
                        .value;
                    document.getElementById('viewCountry').value = document.getElementById('country_' + clientId).value;
                    document.getElementById('viewMobileNumber').value = document.getElementById('mobile_number_' +
                        clientId).value;
                    document.getElementById('viewCompanyName').value = document.getElementById('company_name_' +
                        clientId).value;
                    document.getElementById('viewGstNumber').value = document.getElementById('gst_number_' + clientId)
                        .value;
                    document.getElementById('viewCompanyCode').value = document.getElementById('company_code_' +
                        clientId).value;
                    document.getElementById('viewAddress').value = document.getElementById('address_' + clientId).value;
                    document.getElementById("viewClientImage").src = document.getElementById('profile_image_' +
                        clientId).value;
                }
            }

            function editClientData(clientId) {
                if (clientId) {
                    document.getElementById('editFirstName').value = document.getElementById('first_name_' + clientId)
                        .value;
                    document.getElementById('editLastName').value = document.getElementById('last_name_' + clientId)
                        .value;
                    document.getElementById('editEmail').value = document.getElementById('email_' + clientId).value;
                    document.getElementById('editUsername').value = document.getElementById('username_' + clientId)
                        .value;
                    document.getElementById('editCountry').value = document.getElementById('country_' + clientId).value;
                    document.getElementById('editMobileNumber').value = document.getElementById('mobile_number_' +
                        clientId).value;
                    document.getElementById('editCompanyName').value = document.getElementById('company_name_' +
                        clientId).value;
                    document.getElementById('editGstNumber').value = document.getElementById('gst_number_' + clientId)
                        .value;
                    document.getElementById('editCompanyCode').value = document.getElementById('company_code_' +
                        clientId).value;
                    document.getElementById('editAddress').value = document.getElementById('address_' + clientId).value;
                    document.getElementById("editClientImage").src = document.getElementById('profile_image_' +
                        clientId).value;
                    document.getElementById("clientId").value = clientId;
                }
            }

            function callConfirmationModal(clientId) {
                event.preventDefault();
                Swal.fire({
                    title: "Are you sure you want to delete this client?",
                    text: "Once deelted, you will not be able to recover this record!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes, I am sure!',
                    cancelButtonText: "No, cancel it!",
                    closeOnConfirm: false,
                    closeOnCancel: false,
                    dangerMode: true,
                }).then(function(isConfirm) {
                    if (isConfirm.value) {
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Client is deleted successfully!',
                            icon: 'success'
                        }).then(function() {
                            window.location.href = 'delete-client/' + clientId;
                        });
                    } else {
                        Swal.fire("Cancelled", "Your brand is safe.", "error");
                    }
                });
            }



            function editProfile(e) {
                if (e.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.querySelector('#editClientImage').setAttribute('src', e.target.result);
                    }
                    reader.readAsDataURL(e.files[0]);
                }
            }

            function displayProfile(e) {
                if (e.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.querySelector('#member-img').setAttribute('src', e.target.result);
                    }
                    reader.readAsDataURL(e.files[0]);
                }
            }

            function Random() {
                return Math.floor(Math.random() * 1000000000);
            }

            function randomValue() {
                document.getElementById('company_code').value = Random();
            }

            function editRandomValue() {
                document.getElementById('editCompanyCode').value = Random();
            }
        </script>
    @endsection
