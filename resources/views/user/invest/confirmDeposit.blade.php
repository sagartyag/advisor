<!-- main -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="header-text-full">
                <h3 class="ms-2 mb-0 mt-2">Deposit Confirmation</h3>
            </div>
        </div>
    </div>
    <div class="main row">
        <div class="col-md-6">
            <!-- table -->
            <div class="table-parent table-responsive mt-4">
                <div class="table-search-bar">
                    <div>
                        <form action="{{ route('user.fundActivation') }}" method="post"  enctype="multipart/form-data">
                          {{ csrf_field() }}
                            <div class="row g-3 align-items-end">


                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                   Note :  <b>Please  wait for 5-10 minutes after sending the payment; it will be automatically activated. </b>
                                </div>


                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    Status :  <b>Waiting for Approvel. </b>
                                 </div> 

                                 
                                 @if ($paymentMode=="INR")
                                 <span>Company Account Details</span>
                                 <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    Account Name :  <b>**** </b>
                                 </div> 

                                 <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    Bank Name :  <b>**** </b>
                                 </div> 


                                 <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    Branch Name :  <b>**** </b>
                                 </div> 

                                 <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    Account Number :  <b>**** </b>
                                 </div> 

                                 <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    Ifsc Code :  <b>**** </b>
                                 </div> 
                                     
                                 @endif

                                 @if ($paymentMode=="USDT")


                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    <img id="qrCode" style="width: 150px;    margin: 0px auto;"
                                    src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{generalDetail()->usdtBep20}}">

                                        
                                </div>

                                <span class="cashback-info-label"> Pay to account</span>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                  <input class="form-control copy" type="text" id="walletAddress" readonly  name="walletAddress" value="{{generalDetail()->usdtBep20}}"
                                      placeholder="Wallet Address" />
                                    
                              </div>


                                     
                                 @endif

                                
                                  

                                <span class="cashback-info-label">Send {{$paymentMode}} </span>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    <input class="form-control" type="text" readonly  value="{{$amount}}"
                                        placeholder="Enter Amount"
                                        onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" />
                                        
                                </div>
                                <input name="paymentMode" value="{{$paymentMode}}" type="hidden">
                                <input name="amount" value="{{$amount}}" type="hidden">
                                <input name="orderId" value="{{$orderId}}" id="orderId" type="hidden">
                       

                               

                              <span class="cashback-info-label"> Payment system</span>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    <input class="form-control" type="text"  name="" readonly value="{{$paymentMode}}"
                                        placeholder="Secret Password" />
                                </div>

                                <span class="cashback-info-label"> Upload Proof</span>
                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                    <input class="form-control" type="file"  name="icon_image"  readonly value=""
                                        placeholder="Upload Proof" />
                                </div>


                                <div class="input-box col-lg-12 col-md-12 col-xl-12 col-12">
                                <button class="btn-custom" type="submit">SUBMIT
                                            </button>
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


	$(function(){

        $(".copy").click(function (){
            $(this).select();
            document.execCommand("copy");
          
            iziToast.success({message:"copied", position: "topRight"});
            });

		$('input[name="amount"]').on('change keyup',function () {
			let str = $(this).val();
			str = str.replace(',','.');
			$(this).val(str);
           let min =  10;
      
			let amount = parseFloat(str);
		
			
            if (amount>=min) 
            {
                $(".submit-btn").prop("disabled", false);
                $('.cashback-info-label').html('');
            }
            else
            {

            $(".submit-btn").prop("disabled", true);
            $('.cashback-info-label').html("minimum Withdrawal is "+min+" USDT").css('color', 'red');

            }
            
            	
			if (amount%10==0) 
            {
                
                console.log("hii");
                $(".submit-btn").prop("disabled", false);
                $('.cashback-info-label').html('');
            }
             else
            {
                      console.log("hidddi");

            $(".submit-btn").prop("disabled", true);
            $('.cashback-info-label').html("Withdrawal is multiple 10 USDT").css('color', 'red');

            }
            
		
			//console.log(summ_usd);
		});

        $('#wallet_type').change(function () {
          let icon = $(this).val();
          // alert(icon);
            if (icon=="USDT.TRC20") {
                $('#walletAddress').val('{{Auth::user()->usdtTrc20}}');
                
            }else{
                $('#walletAddress').val('{{Auth::user()->usdtBep20}}');
            }
			
		});


    })

</script>
