<!-- main -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="header-text-full">
                <h3 class="ms-2 mb-0 mt-2">Retired Royalty Income</h3>
            </div>
        </div>
    </div>
    <div class="main row">
        <div class="col-12">
            <!-- table -->
            <div class="table-parent table-responsive mt-4">
                <div class="table-search-bar">
                    <div>
                        <form action="{{ route('user.dailyIncentive') }}" method="get">
                        @csrf
                            <div class="row g-3 align-items-end">
                                <div class="input-box col-lg-3 col-md-3 col-xl-3 col-12">
                                    <input type="text" name="search" value="{{ @$search }}" class="form-control"
                                        placeholder="Search for operation" />
                                </div>

                                <div class="input-box col-lg-3 col-md-3 col-xl-3 col-12">
                                    <input type="text" name="remark" value="" class="form-control"
                                        placeholder="Remark" />
                                </div>



                                <div class="input-box col-lg-3 col-md-3 col-xl-3 col-12">
                                    <button class="btn-custom w-100" type="submit"><i class="fal fa-search"></i>
                                        Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-striped mb-5">
                    <thead>
                        <tr>
                            <th scope="col">Username</th>
                            <th scope="col">User Id</th>
                            <th scope="col">Level</th>
                            <th scope="col">Remark</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Comm</th>
                            <th scope="col">Created At</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if(is_array($level_income) || is_object($level_income)){ ?>

                        <?php date_default_timezone_set('UTC');
                        $cnt = $level_income->perPage() * ($level_income->currentPage() - 1); ?>
                        @foreach ($level_income as $value)
                            <tr>

                                <td data-label="Date">{{ date('D, d M Y H:i:s', strtotime($value->created_at)) }}</td>
                                <td data-label="Amount">
                                    <span class="fontBold text-success">+{{ $value->comm }}
                                        {{ generalDetail()->cur_text }}</span>
                                </td>
                                <td data-label="operation"> {{ $value->remarks }} </td>
                                <td data-label="operation"> {{ $value->user_id_fk }} </td>
                                <td data-label="operation"> {{ $value->user_id }} </td>
                                <td data-label="operation"> {{ $value->amount }} </td>
                                <td data-label="operation"> {{ $value->level }} </td>

                                
                            </tr>
                        @endforeach

                        <?php }?>

                    </tbody>
                </table>

                {{ $level_income->withQueryString()->links() }}
                              

            </div>
        </div>
    </div>
</div>


</div>
</div>
</div>
