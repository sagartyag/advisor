
                <!-- main -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="header-text-full">
                                <h3 class="ms-2 mb-0 mt-2">Invest History</h3>
                            </div>
                        </div>
                    </div>
                    <div class="main row">
                        <div class="col-12">
                            <!-- table -->
                            <div class="table-parent table-responsive mt-4">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Transaction ID</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">payment system</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php if(is_array($deposit_list) || is_object($deposit_list)){ ?>

                                      <?php
                                       date_default_timezone_set('UTC');
                                      $cnt = 0; ?>
                                      @foreach($deposit_list as $value)


                                        <tr>
                                            <td data-label="Date">{{date("D, d M Y H:i:s ", strtotime($value->created_at))}}</td>
                                            <td data-label="Amount">
                                              {{ $value->amount }} {{generalDetail()->cur_text}}
                                            </td>
                                            <td data-label="Transaction ID">
                                              {{ $value->transaction_id }}

                                            </td>
                                            <td data-label="Status">
                                              {{ $value->status }}
                                            </td>

                                            <td data-label="payment system">
                                              {{$value->payment_mode}}
                                            </td>

                                            <td data-label="Action">
                                                @if($value->status=="Pending")
                                                <a href="{{route('user.cancel-payment',['id'=>$value->orderId])}}"
                                                name="balance/oper_frm_btncancel"
                                                class="" style="       background: #df3131;
    padding: 10px;
    color: #fff;
    text-decoration: none;
    border-radius: 7px; background: #df3131;"
                                                onClick="return confirm('Are you want to  \'Cancel\'');">Cancel</a>
                                                        @else
                                                            <span>N/A</span>
                                                        @endif
                                              </td>
                                          

                                           
                                        </tr>

                                        @endforeach
                
                                        <?php }?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
