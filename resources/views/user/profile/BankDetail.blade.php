<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="header-text-full">
                <h3 class="ms-2 mb-0 mt-2">Bank Detail</h3>
            </div>
        </div>
    </div>
    <div class="main row">
        
    <div class="col-md-6">
            <div class="table-parent table-responsive mt-4">
                <div class="table-search-bar">
                    <div>
                        <form action="{{ route('user.BankDetail') }}" method="get">
                            @csrf
                            <div class="row g-3 align-items-end">
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12 mb-4">
                                    Bank Name : <b> <b>{{ $bank_value->bank_name ?? 'Na' }}</b>
                                </div>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12 mb-5">
                                    Account Number : <b>{{ $bank_value->account_no ?? 'Na' }}</b>
                                </div>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12 mb-5">
                                    IFSC Code : <b>{{ $bank_value->ifsc_code ?? 'Na' }}</b>
                                </div>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12 mb-5">
                                    Branch Name : <b> {{ $bank_value->branch_name ?? 'Na' }}</b>
                                </div>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12 mb-5">
                                    Pancard No : <b> {{ $bank_value->pancard_no ?? 'Na' }}</b>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
<script src="https://code.jquery.com//jquery-3.3.1.min.js"></script>

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
                $('.cashback-info-label').html("minimum Withdrawal is " + min + " INR").css('color',
                    'red');

            }





            //console.log(summ_usd);
        });

        $('#wallet_type').change(function () {
            let icon = $(this).val();
            // alert(icon);
            if (icon == "USDT.TRC20") {
                $('#walletAddress').val('{{Auth::user()->usdtTrc20}}');

            } else {
                $('#walletAddress').val('{{Auth::user()->usdtBep20}}');
            }

        });


    })

</script>
