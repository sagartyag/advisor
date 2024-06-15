<section class="refferal-link">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="header-text-full">
                    <h3 class="ms-2 mb-0 mt-2">Direct Team</h3>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="d-flex justify-content-start" id="ref-label">
                    <div class="nav flex-column nav-pills mx-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <!-- Add your nav-pills items here if any -->
                    </div>
                    <div class="tab-content w-100" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                            <div class="table-responsive">
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
                                             

                                            </div>
                                        </div>
                                 
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>




            </div>
        </div>
    </div>






    <script>
        "use strict";

        function copyFunction() {
            var copyText = document.getElementById("sponsorURL");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            /*For mobile devices*/
            document.execCommand("copy");
            Notiflix.Notify.Success(`Copied: ${copyText.value}`);
        }
    </script>


