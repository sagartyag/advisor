<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <style>
        .image-container {
            text-align: center;
            margin-top: 50px;
        }
        .address-container {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .address-container input {
            width: 270px;
            text-align: center;
        }
        .address-container button {
            margin-left: 10px;
        }
        .table-container {
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="header-text-full">
                <h3 class="ms-2 mb-0 mt-2">Fund Transfer</h3>
            </div>
        </div>
    </div>
    <div class="main row">
        <!-- <div class="col-md-6">
            <div class="image-container">
                <img src="{{ asset('assets/uploads/content/qr-code-file-bangla-mobile-code-0.png') }}" 
                     style="height: 270px; width: 270px;" 
                     alt="Your Image" class="img-fluid">
                <div class="address-container">
                    <input type="text" id="address" value="Johan5656566@icici" class="form-control" readonly>
                    <button onclick="copyAddress()" class="btn btn-primary">Copy</button>
                </div>
            </div>
        </div> -->

        <div class="col-md-6">
            <!-- Form -->
            <div class="table-parent table-responsive mt-4">
                <div class="table-search-bar">
                    <div>
                        <form action="{{ route('user.submittransfer') }}" method="post" enctype='multipart/form-data'>
                            {{ csrf_field() }}
                            <div class="row g-3 align-items-end">                            
                            <span class="cashback-info-label"></span>
                            <span>Select Wallet</span>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                <select name="wallet" id="wallet" class="form-control">
                                   <option value="1">Account Balance</option>
                                <option value="2">Fund Balance</option>
                                </select>
                                </div>                                
                                <span class="cashback-info-label"></span>
                                <span>Amount</span>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    <input class="form-control" type="text" name="amount" value=""
                                        placeholder="Enter Amount"  />
                                </div>                                
                                <span class="cashback-info-label"></span>
                                <span> Username Number</span>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    <input class="form-control check_sponsor_exist" type="text" name="username"
                                        placeholder="Username " data-response="sponsor_res" required="true" />
                                </div>
                                <span id="sponsor_res"></span>                                
                                <span class="cashback-info-label"></span>
                                <span >Password</span>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    <input type="text" class="form-control " name="tpassword"
                                    placeholder="Transaction Password ">
                                </div>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    <button class="btn-custom w-100" type="submit"><i
                                            class="fal fa-dollar-sign submit-btn "></i>Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Bank Details Table -->
           
        </div>






    </div>
    
    

    <section class="refferal-link">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="header-text-full">
                    <h3 class="ms-2 mb-0 mt-2">Fund Transfer Records</h3>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="d-flex justify-content-start" id="ref-label">
                    <div class="nav flex-column nav-pills mx-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <!-- Add your nav-pills items here if any -->
                    </div>
                    <div class="tab-content w-100" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">User ID From</th>
                                            <th scope="col">User ID To</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Transfer Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (is_array($fund_transfers) || is_object($fund_transfers))
                                            @foreach ($fund_transfers as $value)
                                                <tr>                                
                                                    <td data-label="User ID From">{{ $value->user->name }} {{ $value->user_id_from }}</td>
                                                    <td data-label="User ID To">{{ $value->user_to->name }} {{ $value->user_id_to }}</td>
                                                    <td data-label="Amount">{{ $value->amount }}</td>
                                                    <td data-label="Transfer Date">{{ date('D, d M Y H:i:s', strtotime($value->created_at)) }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                {{ $fund_transfers->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    $(function () {
        $('input[name="amount2"]').on('change keyup', function () {
            let str = $(this).val();
            str = str.replace(',', '.');
            $(this).val(str);
            let min = 500;

            let amount = parseFloat(str);

            if (amount >= min) {
                $(".submit-btn").prop("disabled", false);
                $('.cashback-info-label').html('');
            } else {
                $(".submit-btn").prop("disabled", true);
                $('.cashback-info-label').html("minimum Withdrawal is " + min + " INR").css('color', 'red');
            }
        });

        $('#wallet_type').change(function () {
            let icon = $(this).val();
            if (icon == "USDT.TRC20") {
                $('#walletAddress').val('{{Auth::user()->usdtTrc20}}');
            } else {
                $('#walletAddress').val('{{Auth::user()->usdtBep20}}');
            }
        });
    });

    function copyAddress() {
        var addressText = document.getElementById("address");
        addressText.select();
        addressText.setSelectionRange(0, 99999); // For mobile devices
        document.execCommand("copy");
        alert("Address copied to clipboard!");
    }

    
    $('.check_sponsor_exist').keyup(function(e) {
                     var ths = $(this);
                     var res_area = $(ths).attr('data-response');
                     var sponsor = $(this).val();
                     // alert(sponsor); 
                     $.ajax({
                         type: "POST"
                         , url: "{{ route('getUserName') }}"
                         , data: {
                             "user_id": sponsor
                             , "_token": "{{ csrf_token() }}"
                         , }
                         , success: function(response) {
                             // alert(response);      
                             if (response != 1) {
                                 // alert("hh");
                                 $(".submit-btn").prop("disabled", false);
                                 $('#' + res_area).html(response).css('color', '#000').css('font-weight', '800')
                                     .css('margin-buttom', '10px');
                             } else {
                                 // alert("hi");
                                 $(".submit-btn").prop("disabled", true);
                                 $('#' + res_area).html("User Not exists!").css('color', 'red').css(
                                     'margin-buttom', '10px');
                             }
                         }
                     });
                 });

</script>
</body>
</html>
