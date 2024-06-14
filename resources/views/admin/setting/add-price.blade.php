   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Settings</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Add </a></li>
                    </ol>
                </div>
                <!-- row -->
                <div class="row">
     
     
                    <div class="col-xl-8 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Settings</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('admin.change-price') }}" method="POST">
                                     {{ csrf_field() }}
                                        <div class="row">
                                       
                                           

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">TOTAL FUNDS INVESTED</label>                                            
                                               <input type="text" placeholder="TOTAL FUNDS INVESTED" name="total_fund_invested" value="{{generalDetail()->total_fund_invested}}" class="form-control" required id="">
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">TOTAL PAID</label>                                             
                                                <input type="text" placeholder="TOTAL PAID" value="{{generalDetail()->paid_withdrawal}}" name="paid_withdrawal" class="form-control" required id="">
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">PEOPLE ONLINE</label>                                             
                                                <input type="text" placeholder="PEOPLE ONLINE" value="{{generalDetail()->people_online}}" name="people_online" class="form-control" required id="">
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">OUR INVESTORS</label>                                             
                                                <input type="text" placeholder="OUR INVESTORS" value="{{generalDetail()->our_investors}}" name="our_investors" class="form-control" required id="">
                                            </div>

              
                                           
                                        </div>
     
                                      
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                
     
                </div>
            </div>
        </div>
        <!--**********************************
                 Content body end
             ***********************************-->
     