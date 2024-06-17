<section class="refferal-link">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="header-text-full">
                    <h3 class="ms-2 mb-0 mt-2">Level Team</h3>
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
                                            <th scope="col">Name</th>
                                            <th scope="col">User Id</th>
                                            <th scope="col">Registration date</th>
                                            <th scope="col">E-mail</th>
                                            <th scope="col">Level</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (is_array($direct_team) || is_object($direct_team)) { ?>
                                        <?php
                                        date_default_timezone_set('UTC');
                                        $cnt = $direct_team->perPage() * ($direct_team->currentPage() - 1); ?>
                                        @foreach ($direct_team as $value)
                                        <tr>
                                            <td data-label="Name">{{ $value->name }}</td>
                                            <td data-label="User ID">{{ $value->username }}</td>
                                            <td data-label="Registration date">{{ date('D, d M Y H:i:s', strtotime($value->created_at)) }}</td>
                                            <td data-label="E-mail">{{ $value->email }}</td>
                                            <td data-label="Package">{{ $value->level}} </td>***
                                            <td data-label="Status">{{ $value->active_status }}</td>
                                        </tr>
                                        @endforeach
                                        <?php } ?>
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


