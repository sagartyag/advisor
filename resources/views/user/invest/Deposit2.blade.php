<!-- main -->

<div class="container-fluid">

    <div class="row">
        <div class="col">
            <div class="header-text-full">
                <h3 class="ms-2 mb-0 mt-2">Deposit</h3>
            </div>
        </div>


    </div>
    <div class="main row">
        <div class="col-md-6">
            <!-- Deposit form -->
            <div class="table-parent table-responsive mt-4">
                <div class="table-search-bar">
                    <div>
                        <form action="{{ route('user.fundActivation') }}" method="post">
                            @csrf

                            <div class="row g-3 align-items-end">
                                <code class=""
                                    style="font-weight: 900; color: #151515; font-size:15px; text-align: center">
                                    Available Balance : <b>{{ currency() }}
                                        {{ number_format(Auth::user()->FundBalance(), 2) }}</b>
                                </code>
                               
                                <span class="cashback-info-label">Amount</span>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    <input class="form-control" type="number" name="amount" placeholder="Enter Amount"
                                        value="100" readonly />
                                </div>
                                <span class="cashback-info-label">Member Id</span>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    <input class="form-control check_sponsor_exist" type="text" data-response="sponsor_res" name="user_id" placeholder="Member ID"
                                        required value="" />
                                </div>
                                <span id="sponsor_res"></span>
                                <span class="cashback-info-label">Transaction Password</span>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    <input class="form-control" type="password" name="transaction_password"
                                        placeholder="Transaction Password" required value="" />
                                </div>
                                <!-- Assuming default wallet type is 1 -->
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    <button class="btn-custom" type="submit">SUBMIT</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Bank details form -->

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    $(function() {
        $('input[name="amount2"]').on('change keyup', function() {
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
                $('.cashback-info-label').html("minimum Withdrawal is " + min + " INR").css('color',
                    'red');
            }
        });

        $('#wallet_type').change(function() {
            let icon = $(this).val();
            if (icon == "USDT.TRC20") {
                $('#walletAddress').val('{{ Auth::user()->usdtTrc20 }}');
            } else {
                $('#walletAddress').val('{{ Auth::user()->usdtBep20 }}');
            }
        });

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


    })
</script>
@include('partials.notify')

<style>
    .table-parent {

        border-radius: 5px;
        padding: 15px;
    }
