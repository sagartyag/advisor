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
        <code class="" style="font-weight: 900; color: #9ef54f; font-size:15px; text-align: center">
            Available Balance : <b>{{ currency() }} {{ number_format(Auth::user()->FundBalance(), 2) }}</b>
        </code>
        <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
            <label for="walletType"> Wallet Type</label>
            <select class="form-control" name="walletType" id="walletType">
                <option value="1" selected>Wallet Type 1</option>
              
                <!-- Add more options as needed -->
            </select>
        </div>
        <span class="cashback-info-label">Amount</span>
        <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
            <input class="form-control" type="number" name="amount" placeholder="Enter Amount" value="100" readonly />
        </div>
        <span class="cashback-info-label">Member Id</span>
        <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
            <input class="form-control" type="text" name="user_id" placeholder="Member ID" required value=" "/>
        </div>
        <span class="cashback-info-label">Transaction Password</span>
        <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
            <input class="form-control" type="password" name="transaction_password"  placeholder="Transaction Password" required value=""/>
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
    $(function(){
        $('input[name="amount"]').on('change keyup',function () {
            let str = $(this).val();
            str = str.replace(',','.');
            $(this).val(str);
            let min =  500;
            let amount = parseFloat(str);
            if (amount>=min) {
                $(".submit-btn").prop("disabled", false);
                $('.cashback-info-label').html('');
            } else {
                $(".submit-btn").prop("disabled", true);
                $('.cashback-info-label').html("minimum Withdrawal is "+min+" INR").css('color', 'red');
            }
        });

        $('#wallet_type').change(function () {
            let icon = $(this).val();
            if (icon=="USDT.TRC20") {
                $('#walletAddress').val('{{Auth::user()->usdtTrc20}}');
            } else {
                $('#walletAddress').val('{{Auth::user()->usdtBep20}}');
            }
        });
    })
</script>
@include('partials.notify')

<style>
    .table-parent {
   
        border-radius: 5px;
        padding: 15px;
    }