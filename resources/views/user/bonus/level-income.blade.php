<!-- main -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="header-text-full">
                <h3 class="ms-2 mb-0 mt-2">Level Income</h3>
            </div>
        </div>
    </div>
    <div class="main row">
        <div class="col-12">
            <!-- table -->
            <div class="table-parent table-responsive mt-4">
                <div class="table-search-bar">
                    <div>
                        <form action="{{ route('user.level-income') }}" method="get">
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
                <table class="table table-striped mb-5">
                    <thead>
                        <tr>
                            <th scope="col">Level</th>
                            <th scope="col">Required Team</th>
                            <th scope="col">Total Team</th>
                            <th scope="col">Earning</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>

                       
                            <tr>
                                <td data-label="Level">1</td>
                                <td data-label="Required Team">
                                   5
                                </td>
                                <td data-label="Total team">{{$gen_team1}} </td>
                                 <td data-label="Earning"> {{currency()}} {{number_format(getPoolIncome($user->username,'matrix_club100',1))}} </td>
                                 <td data-label="Status">{{$gen_team1>=5?"Completed":"Pending"}} </td>
                            </tr>


                            <tr>
                                <td data-label="Level">2</td>
                                <td data-label="Required Team">
                                   25
                                </td>
                                <td data-label="Total team">{{$gen_team2}} </td>
                                 <td data-label="Earning">{{currency()}} {{number_format(getPoolIncome($user->username,'matrix_club100',2))}} </td>
                                 <td data-label="Status">{{$gen_team2>=25?"Completed":"Pending"}} </td>
                            </tr>


                            <tr>
                                <td data-label="Level">2</td>
                                <td data-label="Required Team">
                                   125
                                </td>
                                <td data-label="Total team">{{$gen_team3}} </td>
                                 <td data-label="Earning">{{currency()}} {{number_format(getPoolIncome($user->username,'matrix_club100',3))}} </td>
                                 <td data-label="Status">{{$gen_team3>=125?"Completed":"Pending"}} </td>
                            </tr>

                            <tr>
                                <td data-label="Level">4</td>
                                <td data-label="Required Team">
                                   625
                                </td>
                                <td data-label="Total team">{{$gen_team4}} </td>
                                 <td data-label="Earning">{{currency()}} {{number_format(getPoolIncome($user->username,'matrix_club100',4))}} </td>
                                 <td data-label="Status">{{$gen_team4>=625?"Completed":"Pending"}} </td>
                            </tr>

                            <tr>
                                <td data-label="Level">5</td>
                                <td data-label="Required Team">
                                    3125
                                </td>
                                <td data-label="Total team">{{$gen_team5}} </td>
                                 <td data-label="Earning">{{currency()}} {{number_format(getPoolIncome($user->username,'matrix_club100',5))}} </td>
                                 <td data-label="Status">{{$gen_team5>=3125?"Completed":"Pending"}} </td>
                            </tr>

                            <tr>
                                <td data-label="Level">6</td>
                                <td data-label="Required Team">
                                    15625
                                </td>
                                <td data-label="Total team">{{$gen_team6}} </td>
                                 <td data-label="Earning">{{currency()}} {{number_format(getPoolIncome($user->username,'matrix_club100',6))}} </td>
                                 <td data-label="Status">{{$gen_team6>=15625?"Completed":"Pending"}} </td>
                            </tr>

                            <tr>
                                <td data-label="Level">7</td>
                                <td data-label="Required Team">
                                    78125
                                </td>
                                <td data-label="Total team">{{$gen_team7}} </td>
                                 <td data-label="Earning">{{currency()}} {{number_format(getPoolIncome($user->username,'matrix_club100',7))}} </td>
                                 <td data-label="Status">{{$gen_team7>=78125?"Completed":"Pending"}} </td>
                            </tr>
                            <tr>
                                <td data-label="Level">8</td>
                                <td data-label="Required Team">
                                    390625
                                </td>
                                <td data-label="Total team">{{$gen_team8}} </td>
                                 <td data-label="Earning">{{currency()}} {{number_format(getPoolIncome($user->username,'matrix_club100',8))}} </td>
                                 <td data-label="Status">{{$gen_team8>=390625?"Completed":"Pending"}} </td>
                            </tr>

                            <tr>
                                <td data-label="Level">9</td>
                                <td data-label="Required Team">
                                    1953125
                                </td>
                                <td data-label="Total team">{{$gen_team9}} </td>
                                 <td data-label="Earning">{{currency()}} {{number_format(getPoolIncome($user->username,'matrix_club100',9))}} </td>
                                 <td data-label="Status">{{$gen_team9>=1953125?"Completed":"Pending"}} </td>
                            </tr>

                            <tr>
                                <td data-label="Level">10</td>
                                <td data-label="Required Team">
                                    9765625
                                </td>
                                <td data-label="Total team">{{$gen_team10}} </td>
                                 <td data-label="Earning">{{currency()}} {{number_format(getPoolIncome($user->username,'matrix_club100',10))}} </td>
                                 <td data-label="Status">{{$gen_team10>=9765625?"Completed":"Pending"}} </td>
                            </tr>

                       

                    </tbody>
                </table>
       

            </div>
        </div>
    </div>
</div>


</div>
</div>
</div>
