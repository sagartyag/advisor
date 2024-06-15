<!-- main -->
<div class="container-fluid">
    <div class="main row">
        <div class="col-12">
            <div class="dashboard-heading">
                <h4 class="mb-0">Edit Profile</h4>
            </div>

            <section class="profile-setting">
                <div class="row g-4 g-lg-5">
                    <div class="col-lg-4">
                        <div class="sidebar-wrapper">
                            <form method="post" action="/user/updateProfile" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="WMHLDRiVajXWstMy5KCxrx8s9sfOXw9ocPafUQsV">
                                <div class="profile">
                                    <div class="img">
                                        <img id="profile" src="assets/uploads/male-avatar-icon-13.jpg"
                                            alt="preview user image" class="img-fluid" />
                                      
                                    </div>


                                    <div class="text">
                                        <h5 class="name">{{Auth::user()->name}}</h5>
                                        <span>{{Auth::user()->email}}</span>
                                        <div>
                                            <button style="display: none" class="btn-custom mt-2 p-2 text-white" type="submit">Submit
                                                Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="profile-navigator">
                                <button tab-id="tab1" class="tab  active">
                                    <i class="fal fa-user"></i> Profile information </button>
                                    <button tab-id="tab4" class="tab  ">
                                    <i class="fal fa-user"></i>Bank Detail </button>
                                <button tab-id="tab2" class="tab ">
                                    <i class="fal fa-key"></i> Password setting </button>
                              
                               
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div id="tab1" class="content  active">
                            <form action="{{ route('user.update-profile') }}" method="post">
                                
                                {{ csrf_field() }}

                                @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
 @endif
                                <div class="row g-4">
                                    <div class="input-box col-md-6">
                                        <label for="">Your Upline</label>
                                        <input type="text" class="form-control" readonly value="{{ $profile_data->sponsor_detail ? $profile_data->sponsor_detail->username : '0' }}"  />
                                    </div>

                                    <div class="input-box col-md-6">
                                        <label for="">Your Login</label>
                                        <input type="text" id="lastname"value="{{ $profile_data ? $profile_data->username : '' }}" readonly disabled class="form-control"
                                             />
                                    </div>

                                    <div class="input-box col-md-6">
                                        <label for="">Name</label>
                                        <input type="text" id="username" value="{{ $profile_data ? $profile_data->name : '' }}" name="name"
                                            class="form-control" />
                                    </div>
                                    <div class="input-box col-md-6">
                                        <label for="">Email Address</label>
                                        <input type="email" id="email" value="{{ $profile_data ? $profile_data->email : '' }}" readonly disabled
                                            class="form-control" />
                                    </div>
                                    <div class="input-box col-md-6">
                                        <label for="">Phone Number</label>
                                        <input type="text" id="phone" name="phone" class="form-control"
                                            value="{{ $profile_data ? $profile_data->phone : '' }}" />
                                    </div>
                                    <div class="input-box col-md-6">
                                        <label for="">Country</label>
                                        <select class="js-example-basic-single form-control form-select"
                                            name="country" id="language_id" aria-label="Default select example">
                                            <option selected>
                                                {{ $profile_data ? $profile_data->country : '' }}
                                            </option>
                                            <option value="AFGHANISTAN">
                                                AFGHANISTAN</option>
                                            <option value="ALBANIA">ALBANIA
                                            </option>
                                            <option value="ALGERIA">ALGERIA
                                            </option>
                                            <option value="AMERICAN SAMOA">
                                                AMERICAN SAMOA</option>
                                            <option value="ANDORRA">ANDORRA
                                            </option>
                                            <option value="ANGOLA">ANGOLA
                                            </option>
                                            <option value="ANGUILLA">ANGUILLA
                                            </option>
                                            <option value="ANTARCTICA">
                                                ANTARCTICA</option>
                                            <option value="ANTIGUA AND BARBUDA">
                                                ANTIGUA AND BARBUDA</option>
                                            <option value="ARGENTINA">
                                                ARGENTINA</option>
                                            <option value="ARMENIA">ARMENIA
                                            </option>
                                            <option value="ARUBA">ARUBA
                                            </option>
                                            <option value="AUSTRALIA">
                                                AUSTRALIA</option>
                                            <option value="AUSTRIA">AUSTRIA
                                            </option>
                                            <option value="AZERBAIJAN">
                                                AZERBAIJAN</option>
                                            <option value="BAHAMAS">BAHAMAS
                                            </option>
                                            <option value="BAHRAIN">BAHRAIN
                                            </option>
                                            <option value="BANGLADESH">
                                                BANGLADESH</option>
                                            <option value="BARBADOS">
                                                BARBADOS</option>
                                            <option value="BELARUS">BELARUS
                                            </option>
                                            <option value="BELGIUM">BELGIUM
                                            </option>
                                            <option value="BELIZE">BELIZE
                                            </option>
                                            <option value="BENIN">BENIN
                                            </option>
                                            <option value="BERMUDA">BERMUDA
                                            </option>
                                            <option value="BHUTAN">BHUTAN
                                            </option>
                                            <option value="BOLIVIA">BOLIVIA
                                            </option>
                                            <option value="BOSNIA AND HERZEGOVINA">
                                                BOSNIA AND HERZEGOVINA
                                            </option>
                                            <option value="BOTSWANA">
                                                BOTSWANA</option>
                                            <option value="BOUVET ISLAND">
                                                BOUVET ISLAND</option>
                                            <option value="BRAZIL">BRAZIL
                                            </option>
                                            <option value="BRITISH INDIAN OCEAN TERRITORY">
                                                BRITISH INDIAN OCEAN
                                                TERRITORY</option>
                                            <option value="BRUNEI DARUSSALAM">
                                                BRUNEI DARUSSALAM</option>
                                            <option value="BULGARIA">
                                                BULGARIA</option>
                                            <option value="BURKINA FASO">
                                                BURKINA FASO</option>
                                            <option value="BURUNDI">BURUNDI
                                            </option>
                                            <option value="CAMBODIA">
                                                CAMBODIA</option>
                                            <option value="CAMEROON">
                                                CAMEROON</option>
                                            <option value="CANADA">CANADA
                                            </option>
                                            <option value="CAPE VERDE">CAPE
                                                VERDE</option>
                                            <option value="CAYMAN ISLANDS">
                                                CAYMAN ISLANDS</option>
                                            <option value="CENTRAL AFRICAN REPUBLIC">
                                                CENTRAL AFRICAN REPUBLIC
                                            </option>
                                            <option value="CHAD">CHAD
                                            </option>
                                            <option value="CHILE">CHILE
                                            </option>
                                            <option value="CHINA">CHINA
                                            </option>
                                            <option value="CHRISTMAS ISLAND">
                                                CHRISTMAS ISLAND</option>
                                            <option value="COCOS (KEELING) ISLANDS">
                                                COCOS (KEELING) ISLANDS
                                            </option>
                                            <option value="COLOMBIA">
                                                COLOMBIA</option>
                                            <option value="COMOROS">COMOROS
                                            </option>
                                            <option value="CONGO">CONGO
                                            </option>
                                            <option value="CONGO, THE DEMOCRATIC REPUBLIC OF THE">
                                                CONGO, THE DEMOCRATIC
                                                REPUBLIC OF THE</option>
                                            <option value="COOK ISLANDS">
                                                COOK ISLANDS</option>
                                            <option value="COSTA RICA">COSTA
                                                RICA</option>
                                            <option value="COTE D'IVOIRE">
                                                COTE D'IVOIRE</option>
                                            <option value="CROATIA">CROATIA
                                            </option>
                                            <option value="CUBA">CUBA
                                            </option>
                                            <option value="CYPRUS">CYPRUS
                                            </option>
                                            <option value="CZECH REPUBLIC">
                                                CZECH REPUBLIC</option>
                                            <option value="DENMARK">DENMARK
                                            </option>
                                            <option value="DJIBOUTI">
                                                DJIBOUTI</option>
                                            <option value="DOMINICA">
                                                DOMINICA</option>
                                            <option value="DOMINICAN REPUBLIC">
                                                DOMINICAN REPUBLIC</option>
                                            <option value="ECUADOR">ECUADOR
                                            </option>
                                            <option value="EGYPT">EGYPT
                                            </option>
                                            <option value="EL SALVADOR">EL
                                                SALVADOR</option>
                                            <option value="EQUATORIAL GUINEA">
                                                EQUATORIAL GUINEA</option>
                                            <option value="ERITREA">ERITREA
                                            </option>
                                            <option value="ESTONIA">ESTONIA
                                            </option>
                                            <option value="ETHIOPIA">
                                                ETHIOPIA</option>
                                            <option value="FALKLAND ISLANDS (MALVINAS)">
                                                FALKLAND ISLANDS (MALVINAS)
                                            </option>
                                            <option value="FAROE ISLANDS">
                                                FAROE ISLANDS</option>
                                            <option value="FIJI">FIJI
                                            </option>
                                            <option value="FINLAND">FINLAND
                                            </option>
                                            <option value="FRANCE">FRANCE
                                            </option>
                                            <option value="FRENCH GUIANA">
                                                FRENCH GUIANA</option>
                                            <option value="FRENCH POLYNESIA">
                                                FRENCH POLYNESIA</option>
                                            <option value="FRENCH SOUTHERN TERRITORIES">
                                                FRENCH SOUTHERN TERRITORIES
                                            </option>
                                            <option value="GABON">GABON
                                            </option>
                                            <option value="GAMBIA">GAMBIA
                                            </option>
                                            <option value="GEORGIA">GEORGIA
                                            </option>
                                            <option value="GERMANY">GERMANY
                                            </option>
                                            <option value="GHANA">GHANA
                                            </option>
                                            <option value="GIBRALTAR">
                                                GIBRALTAR</option>
                                            <option value="GREECE">GREECE
                                            </option>
                                            <option value="GREENLAND">
                                                GREENLAND</option>
                                            <option value="GRENADA">GRENADA
                                            </option>
                                            <option value="GUADELOUPE">
                                                GUADELOUPE</option>
                                            <option value="GUAM">GUAM
                                            </option>
                                            <option value="GUATEMALA">
                                                GUATEMALA</option>
                                            <option value="GUINEA">GUINEA
                                            </option>
                                            <option value="GUINEA-BISSAU">
                                                GUINEA-BISSAU</option>
                                            <option value="GUYANA">GUYANA
                                            </option>
                                            <option value="HAITI">HAITI
                                            </option>
                                            <option value="HEARD ISLAND AND MCDONALD ISLANDS">
                                                HEARD ISLAND AND MCDONALD
                                                ISLANDS</option>
                                            <option value="HOLY SEE (VATICAN CITY STATE)">
                                                HOLY SEE (VATICAN CITY STATE)
                                            </option>
                                            <option value="HONDURAS">
                                                HONDURAS</option>
                                            <option value="HONG KONG">HONG
                                                KONG</option>
                                            <option value="HUNGARY">HUNGARY
                                            </option>
                                            <option value="ICELAND">ICELAND
                                            </option>
                                            <option value="INDIA">INDIA
                                            </option>
                                            <option value="INDONESIA">
                                                INDONESIA</option>
                                            <option value="IRAN, ISLAMIC REPUBLIC OF">
                                                IRAN, ISLAMIC REPUBLIC OF
                                            </option>
                                            <option value="IRAQ">IRAQ
                                            </option>
                                            <option value="IRELAND">IRELAND
                                            </option>
                                            <option value="ISRAEL">ISRAEL
                                            </option>
                                            <option value="ITALY">ITALY
                                            </option>
                                            <option value="JAMAICA">JAMAICA
                                            </option>
                                            <option value="JAPAN">JAPAN
                                            </option>
                                            <option value="JORDAN">JORDAN
                                            </option>
                                            <option value="KAZAKHSTAN">
                                                KAZAKHSTAN</option>
                                            <option value="KENYA">KENYA
                                            </option>
                                            <option value="KIRIBATI">
                                                KIRIBATI</option>
                                            <option value="KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF">
                                                KOREA, DEMOCRATIC PEOPLE'S
                                                REPUBLIC OF</option>
                                            <option value="KOREA, REPUBLIC OF">
                                                KOREA, REPUBLIC OF</option>
                                            <option value="KUWAIT">KUWAIT
                                            </option>
                                            <option value="KYRGYZSTAN">
                                                KYRGYZSTAN</option>
                                            <option value="LAO PEOPLE'S DEMOCRATIC REPUBLIC">
                                                LAO PEOPLE'S DEMOCRATIC
                                                REPUBLIC</option>
                                            <option value="LATVIA">LATVIA
                                            </option>
                                            <option value="LEBANON">LEBANON
                                            </option>
                                            <option value="LESOTHO">LESOTHO
                                            </option>
                                            <option value="LIBERIA">LIBERIA
                                            </option>
                                            <option value="LIBYAN ARAB JAMAHIRIYA">
                                                LIBYAN ARAB JAMAHIRIYA
                                            </option>
                                            <option value="LIECHTENSTEIN">
                                                LIECHTENSTEIN</option>
                                            <option value="LITHUANIA">
                                                LITHUANIA</option>
                                            <option value="LUXEMBOURG">
                                                LUXEMBOURG</option>
                                            <option value="MACAO">MACAO
                                            </option>
                                            <option value="MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF">
                                                MACEDONIA, THE FORMER
                                                YUGOSLAV REPUBLIC OF</option>
                                            <option value="MADAGASCAR">
                                                MADAGASCAR</option>
                                            <option value="MALAWI">MALAWI
                                            </option>
                                            <option value="MALAYSIA">
                                                MALAYSIA</option>
                                            <option value="MALDIVES">
                                                MALDIVES</option>
                                            <option value="MALI">MALI
                                            </option>
                                            <option value="MALTA">MALTA
                                            </option>
                                            <option value="MARSHALL ISLANDS">
                                                MARSHALL ISLANDS</option>
                                            <option value="MARTINIQUE">
                                                MARTINIQUE</option>
                                            <option value="MAURITANIA">
                                                MAURITANIA</option>
                                            <option value="MAURITIUS">
                                                MAURITIUS</option>
                                            <option value="MAYOTTE">MAYOTTE
                                            </option>
                                            <option value="MEXICO">MEXICO
                                            </option>
                                            <option value="MICRONESIA, FEDERATED STATES OF">
                                                MICRONESIA, FEDERATED STATES
                                                OF</option>
                                            <option value="MOLDOVA, REPUBLIC OF">
                                                MOLDOVA, REPUBLIC OF</option>
                                            <option value="MONACO">MONACO
                                            </option>
                                            <option value="MONGOLIA">
                                                MONGOLIA</option>
                                            <option value="MONTSERRAT">
                                                MONTSERRAT</option>
                                            <option value="MOROCCO">MOROCCO
                                            </option>
                                            <option value="MOZAMBIQUE">
                                                MOZAMBIQUE</option>
                                            <option value="MYANMAR">MYANMAR
                                            </option>
                                            <option value="NAMIBIA">NAMIBIA
                                            </option>
                                            <option value="NAURU">NAURU
                                            </option>
                                            <option value="NEPAL">NEPAL
                                            </option>
                                            <option value="NETHERLANDS">
                                                NETHERLANDS</option>
                                            <option value="NETHERLANDS ANTILLES">
                                                NETHERLANDS ANTILLES</option>
                                            <option value="NEW CALEDONIA">
                                                NEW CALEDONIA</option>
                                            <option value="NEW ZEALAND">NEW
                                                ZEALAND</option>
                                            <option value="NICARAGUA">
                                                NICARAGUA</option>
                                        </select>
                                    </div>

                                    <div class="input-box col-md-12">
                                        <label for="">Registration Date</label>
                                        <input type="text" id="username" value="{{ date("D, d M Y", strtotime($profile_data->created_at))}}"   readonly disabled 
                                            class="form-control" />
                                    </div>

                                   
                                    <div class="input-box col-12">
                                        <button class="btn-custom">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div id="tab2" class="content ">
                            <form method="post" action="{{ route('user.edit-password') }}">
                                {{ csrf_field() }}
                                <div class="row g-4">
                                    <div class="input-box col-md-6">
                                        <label for="">Current Password</label>
                                        <input type="password" id="current_password" name="old_password"
                                            autocomplete="off" class="form-control"
                                            placeholder="Enter Current Password" />
                                    </div>

                                    <div class="input-box col-md-6">
                                        <label for="">New Password</label>
                                        <input type="password" id="password" name="password" autocomplete="off"
                                            class="form-control" placeholder="Enter New Password" />
                                    </div>
                                    <div class="input-box col-md-6">
                                        <label for="">Confirm Password</label>
                                        <input type="password" id="password_confirmation"
                                            name="password_confirmation" autocomplete="off" class="form-control"
                                            placeholder="Confirm Password" />
                                    </div>
                                    <div class="input-box col-12">
                                        <button class="btn-custom" type="submit">Update
                                            Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div id="tab3" class="content ">
                            <form method="post" action="{{ route('user.update-wallet') }}">
                                {{ csrf_field() }}
                                <div class="row g-4">
                                    <div class="input-box col-md-12">
                                        <label for="">USDT - TRC20</label>
                                        <input type="text" name="usdtTrc20"   value="{{ $profile_data ? $profile_data->usdtTrc20 : '' }}" 
                                        placeholder="USDT TRC20 " class="form-control" />
                                    </div>

                                    <div class="input-box col-md-12">
                                        <label for="">USDT - BEP20</label>
                                        <input type="text"  name="usdtBep20" value="{{ $profile_data ? $profile_data->usdtBep20 : '' }}" 
                                        placeholder="USDT BEP20 wallet"
                                            class="form-control" />
                                    </div>
                                   
                                    <div class="input-box col-12">
                                        <button class="btn-custom" type="submit">Update
                                            Wallet</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="tab4" class="content ">
                        <form action="{{ route('user.bank-update') }}" method="POST">
                            @csrf
                                <div class="row g-4">
                                    <div class="input-box col-md-6">
                                        <label for="">Account Holder </label>
                                        <input class="form-control" type="text" name="account_holder"  
                                                <?=(@$bank_value->account_holder)?"readonly":""?> value="{{ @$bank_value->account_holder }}"
                              placeholder="Enter a/c holder first name">
                                    </div>

                                    <div class="input-box col-md-6">
                                        <label for="">Bank Name</label>
                                        <input class="form-control" type="text" name="bank_name" 
                                                <?=(@$bank_value->bank_name)?"readonly":""?> value="{{ @$bank_value->bank_name }}"
                              placeholder="Enter Bank Name">
                                    </div>
                                    <div class="input-box col-md-6">
                                        <label for="">Branch Name</label>
                                        <input class="form-control" type="text" name="branch_name" 
                                                <?=(@$bank_value->branch_name)?"readonly":""?> value="{{ @$bank_value->branch_name }}"
                                placeholder="Enter Branch Name">
                                    </div>
                                    <div class="input-box col-md-6">
                                        <label for="">Bank A/c Number </label>
                                        <input class="form-control" type="text" name="account_number" 
                                                <?=(@$bank_value->account_no)?"readonly":""?> value="{{ @$bank_value->account_no }}"
                              placeholder="Enter Account Number" required>
                                    </div>
                                    <div class="input-box col-md-6">
                                        <label for="">IFSC </label>
                                        <input class="form-control" type="text" name="ifsc_code" 
                                                <?=(@$bank_value->ifsc_code)?"readonly":""?> value="{{ @$bank_value->ifsc_code }}"
                              placeholder="Enter IFS Code " required>
                                    </div>
                                    <div class="input-box col-md-6">
                                        <label for="">pancard Number </label>
                                        <input class="form-control" type="text" name="pancard_no" 
                                                <?=(@$bank_value->pancard_no)?"readonly":""?> value="{{ @$bank_value->pancard_no }}"
                              placeholder="Enter Pancard Number " required>
                                    </div>
                              <!--      <div class="input-box col-md-6">-->
                              <!--          <label for="">Aadhar Card</label>-->
                              <!--          <input class="form-control" type="text" name="aadhar" value="{{ @$bank_value->aadhar }}"-->
                              <!--placeholder="Enter Aadhar Card " required>-->
                              <!--      </div>-->
                                    <div class="input-box col-12">
                                        <button class="btn-custom" type="submit">SUBMIT
                                            </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div id="tab4" class="content ">
                            <div class="alert mb-0">
                                <i class="fal fa-check-circle text-success"></i>
                                <span>Your KYC already verified</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


</div>
</div>
</div>
