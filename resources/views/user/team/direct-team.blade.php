<!-- main -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="header-text-full">
                <h3 class="ms-2 mb-0 mt-2">Direct Team</h3>
            </div>
        </div>
    </div>
    <div class="main row">
        <div class="col-12">
            <!-- table -->
            <div class="table-parent table-responsive mt-4">
                <div class="table-search-bar">
                    <div>
                        <form action="{{ route('user.referral-team') }}" method="get">
                            <div class="row g-3 align-items-end">
                                <div class="input-box col-lg-3 col-md-3 col-xl-3 col-12">
                                    <input type="text" name="search" value="{{ @$search }}" class="form-control"
                                        placeholder="Search for operation" />
                                </div>

                          



                                <div class="input-box col-lg-3 col-md-3 col-xl-3 col-12">
                                    <button class="btn-custom w-100" type="submit"><i class="fal fa-search"></i>
                                        Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-striped">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>User ID</th>
                                        <th>Email ID</th>
                                        <th>Mobile No</th>
                                        <th>Joining Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(is_array($direct_team) || is_object($direct_team)){ ?>

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-start " id="ref-label">
                                    
                                    <div class="tab-content w-100" id="v-pills-tabContent">
                                        <div class="tab-pane fade  show active   " id="v-pills-1" role="tabpanel"
                                            aria-labelledby="v-pills-1-tab">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">User Id</th>
                                                            <th scope="col">Registration date</th>
                                                            <th scope="col">E-mail</th>
                                                            <th scope="col">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                      <?php if(is_array($direct_team) || is_object($direct_team)){ ?>

                                                        <?php
                                                           date_default_timezone_set('UTC');
                                                        $cnt = $direct_team->perPage() * ($direct_team->currentPage() - 1); ?>
                                                        @foreach ($direct_team as $value)

                                                        <tr>

                                                            <td data-label="Name">
                                                              {{ $value->name }} </td>

                                                              <td data-label="User ID">
                                                                {{ $value->username }} </td>

                                                            <td data-label="Registration date" class="">
                                                              {{ date('D, d M Y H:i:s', strtotime($value->created_at)) }}</td>

                                                                <td data-label="E-mail" class="">
                                                                  {{ $value->email }}</td>
  


                                                        
                                                            <td data-label="Status">
                                                              {{ $value->active_status }}
                                                            </td>

                                    <?php }?>
                            </tbody>
                                </table>
       
                                {{ $direct_team->withQueryString()->links() }}

            </div>
        </div>
    </div>
</div>


</div>
</div>
</div>
