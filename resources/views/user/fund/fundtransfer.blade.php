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
                            <span class="cashback-info-label">Select Wallet</span>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                <select name="wallet" id="wallet" class="form-control">
                                   <option value="1">Available Balance</option>
                                <option value="2">Fund Balance</option>
                                </select>
                                </div>
                                <span class="cashback-info-label">Amount</span>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    <input class="form-control" type="text" name="amount" value=""
                                        placeholder="Enter Amount"  />
                                </div>
                                <span class="cashback-info-label"> Username Number</span>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    <input class="form-control" type="text" name="username"
                                        placeholder="Username " required="true" />
                                </div>
                                <span class="cashback-info-label">Password</span>
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
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    $(function () {
        $('input[name="amount"]').on('change keyup', function () {
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
</script>
</body>
</html>
