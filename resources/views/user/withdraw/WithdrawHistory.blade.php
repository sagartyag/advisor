<!-- main -->
<div class="container-fluid">
  <div class="row">
      <div class="col">
          <div class="header-text-full">
              <h3 class="ms-2 mb-0 mt-2">Withdrawal History</h3>
          </div>
      </div>
  </div>
  <div class="main row">
      <div class="col-12">
          <!-- table -->
          <div class="table-parent table-responsive mt-4">
              <div class="table-search-bar">
                  <div>
                      <form action="{{ route('user.Withdraw-History') }}" method="get">
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
                          <th scope="col">Date</th>
                          <th scope="col">amount</th>
                          <th scope="col">Charge 10%</th>
                          <th scope="col">Payable Amount</th>
                          <th scope="col">Transaction ID</th>
                          <th scope="col">Status</th>
                          <th scope="col">payment system</th>
                      </tr>
                  </thead>
                  <tbody>

                      <?php if(is_array($withdraw_report) || is_object($withdraw_report)){ ?>

                      <?php date_default_timezone_set('UTC');
                      $cnt = $withdraw_report->perPage() * ($withdraw_report->currentPage() - 1); ?>
                      @foreach ($withdraw_report as $value)
                          <tr>

                              <td data-label="Date">{{ date('D, d M Y H:i:s', strtotime($value->created_at)) }}</td>
                              <td data-label="Amount">
                                  <span class="fontBold text-danger">-{{ $value->amount }}
                                      {{ generalDetail()->cur_text }}</span>
                              </td>

                              <td data-label="Charge">
                                <span class="fontBold text-danger">-{{ $value->amount*10/100 }}
                                    {{ generalDetail()->cur_text }}</span>
                            </td>

                            <td data-label="Payable Amount">
                              <span class="fontBold text-danger">-{{ $value->amount- $value->amount*10/100 }}
                                  {{ generalDetail()->cur_text }}</span>
                          </td>

                              <td data-label="Transaction ID"> {{ $value->txn_id }} </td>
                              <td data-label="Status">{{ $value->status }} </td>
                              <td data-label="payment system">{{$value->payment_mode}}</td>
                          </tr>
                      @endforeach

                      <?php }?>

                  </tbody>
              </table>

              {{ $withdraw_report->withQueryString()->links() }}
                            

          </div>
      </div>
  </div>
</div>


</div>
</div>
</div>
