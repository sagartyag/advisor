<!-- main -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="header-text-full">
                <h3 class="ms-2 mb-0 mt-2">Add Fund</h3>
            </div>
        </div>
    </div>
    <div class="main row">
        <div class="col-md-6">
            <!-- table -->
            <div class="table-parent table-responsive mt-4">
                <div class="table-search-bar">
                    <div>
                        <form action="{{ route('user.SubmitBuyFund') }}" method="post" enctype='multipart/form-data'>
                            {{ csrf_field() }}
                            <div class="row g-3 align-items-end">






                                <span class="cashback-info-label">Amount</span>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    <input class="form-control" type="text" name="amount" value=""
                                        placeholder="Enter Amount"  />

                                </div>


                                <span class="cashback-info-label"> Trx Password</span>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    <input class="form-control" type="text" name="transaction_hash"
                                        placeholder="Transaction ID. " required="true" />
                                </div>
                                <span class="cashback-info-label">Choose File</span>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    <input type="file" class="form-control " name="icon_image">
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
        </div>


        <div class="col-md-6">
            <div class="table-parent table-responsive mt-4">
                <div class="table-search-bar">
                    <div>
                        <form action="{{ route('user.BankDetail') }}" method="get">
                            @csrf
                            <div class="row g-3 align-items-end">
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12 mb-4">
                                    Bank Name : <b> <b>{{ $bank->bank_name ?? 'Na' }}</b>
                                </div>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12 mb-5">
                                    Account Number : <b>{{ $bank->account_no ?? 'Na' }}</b>
                                </div>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12 mb-5">
                                    IFSC Code : <b>{{ $bank->ifsc_code ?? 'Na' }}</b>
                                </div>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12 mb-5">
                                    Branch Name : <b> {{ $bank->branch_name ?? 'Na' }}</b>
                                </div>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12 mb-5">
                                    Pancard No : <b> {{ $bank->pancard_no ?? 'Na' }}</b>
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
