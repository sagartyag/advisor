

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Fund Management </a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Fund Request</a></li>
					</ol>
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Fund Request</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>S NO.</th>

                                                <th>Name</th>
                                                <th>User ID</th>
                                                <th>Amount</th>
                                                <th>Transaction Date.</th>
                                                <th>Transaction ID.</th>
                                                <th>Status</th>
                                                <th>Payment Mode</th>
                                                <th>Upload Proof</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(is_array($add_fund_report) || is_object($add_fund_report)){ ?>

                                                <?php $cnt =$add_fund_report->perPage() * ($add_fund_report->currentPage() - 1); ?>
                                                @foreach($add_fund_report as $value)
                                                    <tr>
                                                        <td><?= $cnt += 1?></td>
                    
                                                        <td>{{ ($value->user)?$value->user->name:"" }}</td>
                                                        <td>{{ $value->user_id_fk }}</td>
                                                        <td> {{currency()}} {{ $value->amount }}</td>
                                                        <td>{{ $value->created_at }}</td>
                                                        <td>{{ $value->txn_no }}</td>
                    
                                                        <td>{{ $value->status }}</td>
                                                        <td>{{ $value->type }}</td>
                                                        <td><a target="_blank" href="{{asset($value->slip)}}"><img style="width: 100%;" src="{{asset($value->slip)}}" alt=""> </a> </td>
                                                     
                    
                                                        <td><a href="{{route('admin.fund_request_done')}}?id={{$value->id}}&user_Id={{$value->user_id}}&withdraw_status=success" class='btn btn-success'>Success</a> <a href="{{route('admin.fund_request_done')}}?id={{$value->id}}&user_Id={{$value->user_id}}&withdraw_status=blocked" class='btn btn-danger'>Reject</a></td>
                    
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
        <!--**********************************
            Content body end
        ***********************************-->
