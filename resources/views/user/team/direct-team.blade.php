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

                                    <?php $cnt = $direct_team->perPage() * ($direct_team->currentPage() - 1); ?>
                                    @foreach ($direct_team as $value)
                                        <tr>
                                            <td><?= $cnt += 1 ?></td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->username }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->phone }}</td>
                                            <td>{{ $value->created_at }}</td>

                                            <td><span
                                                    class="badge badge-{{ $value->active_status == 'Active' ? 'success' : 'danger' }}">{{ $value->active_status }}</span>
                                            </td>


                                        </tr>
                                    @endforeach

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
