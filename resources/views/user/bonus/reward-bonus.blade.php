<!-- main -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="header-text-full">
                <h3 class="ms-2 mb-0 mt-2">Rewards Income</h3>
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
                                    <th>Sr No</th>
                                    <th>Matching 60%</th>
                                    <th>Matching 40%</th>
                                    <th>Bonus</th>
                                    <!--<th>Commission</th>-->
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                if ($first_lvl > 0) {
                                    $status = 'Achieved';
                                    if ($second_lvl > 0) {
                                        $color = 'rgb(251, 189, 24)';
                                        $active = '';
                                    } else {
                                        $color = '#74d28c';
                                        $active = '( Active )';
                                    }
                                } else {
                                    $status = 'Pending';
                                    $color = 'none';
                                }

                                ?>
                                <tr style="background:<?= @$color ?>;color: #000;
font-weight: 600;">
                                    <td>1STAR</td>

                                    <td>3 Lac</td>
                                    <td>2 Lac</td>

                                    <td>&#8377; 10.000/ Phone</td>
                                    <td><?= @$status ?></td>


                                </tr>


                                <?php

                                if ($second_lvl > 0) {
                                    $status = 'Achieved';
                                    if ($third_lvl > 0) {
                                        $color = 'rgb(251, 189, 24)';
                                    } else {
                                        $color = '#74d28c';
                                    }
                                } else {
                                    $status = 'Pending';
                                    $color = 'none';
                                }

                                ?>
                                <tr style="background:<?= @$color ?>;color: #000;
font-weight: 600;">
                                    <td>2STAR</td>

                                    <td>6 Lac</td>
                                    <td>4 Lac</td>

                                    <td>&#8377; 20,000 / Laptop</td>
                                    <td><?= @$status ?> </td>


                                </tr>



                                <?php

                                if ($third_lvl > 0) {
                                    $status = 'Achieved';
                                    if ($four_lvl > 0) {
                                        $color = 'rgb(251, 189, 24)';
                                    } else {
                                        $color = '#74d28c';
                                    }
                                } else {
                                    $status = 'Pending';
                                    $color = 'none';
                                }

                                ?>
                                <tr style="background:<?= @$color ?>;color: #000;
font-weight: 600;">
                                    <td>3STAR</td>

                                    <td>12 Lac</td>
                                    <td>8 Lac</td>

                                    <td>&#8377; 40,000 / Bike DP </td>
                                    <td><?= @$status ?></td>


                                </tr>


                                <?php

                                if ($four_lvl > 0) {
                                    $status = 'Achieved';
                                    if ($five_lvl > 0) {
                                        $color = 'rgb(251, 189, 24)';
                                    } else {
                                        $color = '#74d28c';
                                    }
                                } else {
                                    $status = 'Pending';
                                    $color = 'none';
                                }

                                ?>
                                <tr style="background:<?= @$color ?>;color: #000;
font-weight: 600;">
                                    <td>4STAR</td>

                                    <td>18 Lac</td>
                                    <td>12 Lac</td>

                                    <td>&#8377; 90,000/ Macbook</td>
                                    <td><?= @$status ?> </td>


                                </tr>

                                <?php

                                if ($five_lvl > 0) {
                                    $status = 'Achieved';
                                    if ($six_lvl > 0) {
                                        $color = 'rgb(251, 189, 24)';
                                    } else {
                                        $color = '#74d28c';
                                    }
                                } else {
                                    $status = 'Pending';
                                    $color = 'none';
                                }

                                ?>
                                <tr style="background:<?= @$color ?>;color: #000;
font-weight: 600;">
                                    <td>5STAR</td>

                                    <td>30 Lac</td>
                                    <td>20 Lac</td>

                                    <td>&#8377; 1,80,000/ Atlo DP</td>
                                    <td><?= @$status ?> </td>


                                </tr>


                                <?php

                                if ($six_lvl > 0) {
                                    $status = 'Achieved';
                                    if ($seven_lvl > 0) {
                                        $color = 'rgb(251, 189, 24)';
                                    } else {
                                        $color = '#74d28c';
                                    }
                                } else {
                                    $status = 'Pending';
                                    $color = 'none';
                                }

                                ?>
                                <tr style="background:<?= @$color ?>;color: #000;
font-weight: 600;">
                                    <td>6STAR</td>

                                    <td>70Lac</td>
                                    <td>50 Lac</td>

                                    <td>&#8377; 3,70,000/Nexon DP </td>
                                    <td><?= @$status ?> </td>


                                </tr>


                                <?php

                                if ($seven_lvl > 0) {
                                    $status = 'Achieved';
                                    if ($eight_lvl > 0) {
                                        $color = 'rgb(251, 189, 24)';
                                    } else {
                                        $color = '#74d28c';
                                    }
                                } else {
                                    $status = 'Pending';
                                    $color = 'none';
                                }

                                ?>
                                <tr style="background:<?= @$color ?>;color: #000;
font-weight: 600;">
                                    <td>7STAR</td>

                                    <td>1.25 Cr</td>
                                    <td>85 Lac</td>

                                    <td>&#8377; 7,30,000/ i20 DP </td>
                                    <td><?= @$status ?> </td>


                                </tr>


                                <?php

                                if ($eight_lvl > 0) {
                                    $status = 'Achieved';
                                    if ($nine_lvl > 0) {
                                        $color = 'rgb(251, 189, 24)';
                                    } else {
                                        $color = '#74d28c';
                                    }
                                } else {
                                    $status = 'Pending';
                                    $color = 'none';
                                }

                                ?>
                                <tr style="background:<?= @$color ?>;color: #000;
font-weight: 600;">
                                    <td>8STAR</td>

                                    <td>3 Cr</td>
                                    <td>2 Cr</td>

                                    <td>&#8377; 13,00,000/ Creta </td>
                                    <td><?= @$status ?></td>


                                </tr>


                                <?php

                                if ($nine_lvl > 0) {
                                    $status = 'Achieved';
                                    if ($ten_lvl > 0) {
                                        $color = 'rgb(251, 189, 24)';
                                    } else {
                                        $color = '#74d28c';
                                    }
                                } else {
                                    $status = 'Pending';
                                    $color = 'none';
                                }

                                ?>
                                <tr style="background:<?= @$color ?>;color: #000;
font-weight: 600;">
                                    <td>9STAR</td>

                                    <td>6 Cr</td>
                                    <td>4 Cr</td>

                                    <td>&#8377; 35,00,000 /Audi</td>
                                    <td><?= @$status ?> </td>


                                </tr>


                                <?php

                                if ($ten_lvl > 0) {
                                    $status = 'Achieved';
                                    $color = '#74d28c';
                                } else {
                                    $status = 'Pending';
                                    $color = 'none';
                                }

                                ?>
                                <tr style="background:<?= @$color ?>;color: #000;
font-weight: 600;">
                                    <td>10STAR</td>

                                    <td>11 Cr</td>
                                    <td>8 Cr</td>

                                    <td>&#8377; 1 Cr / Villa</td>
                                    <td><?= @$status ?> </td>


                                </tr>

                                <?php

                                if ($eleven_lvl > 0) {
                                    $status = 'Achieved';
                                    $color = '#74d28c';
                                } else {
                                    $status = 'Pending';
                                    $color = 'none';
                                }

                                ?>
                                <tr style="background:<?= @$color ?>;color: #000; font-weight: 600;">
                                    <td>11STAR</td>

                                    <td>25 Cr</td>
                                    <td>11 Cr</td>

                                    <td>&#8377; 1.5Cr / Villa + World Tour</td>
                                    <td><?= @$status ?> </td>


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
