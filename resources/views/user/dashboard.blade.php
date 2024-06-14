<!-- main -->
<div class="container-fluid">
    <div class="main row" id="firebase-app">

        @if (Auth::user()->active_status == 'Pending')
            <div class="col-12">
                <div class="bd-callout bd-callout-primary alert d-flex justify-content-between align-items-start"
                    role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fal fa-info-circle me-2"></i> Do not miss any incomes activate your account to get
                        profit.
                        <a href="{{ route('user.invest') }}" class="btn btn-sm btn-primary mx-3"
                            id="allow-notification">Activate
                            Now</a>
                    </div>

                </div>
            </div>
        @endif



        <div class="col-12" v-if="notificationPermission == 'denied' && !is_notification_skipped" v-cloak>
            <div class="bd-callout bd-callout-warning alert d-flex justify-content-between align-items-start"
                role="alert">
                <div class="d-flex align-items-center">
                    <i class="fal fa-info-circle me-2"></i> Please allow your browser to get instant
                    push notification.
                    Allow it from
                    notification setting.
                </div>
                <button class="close-btn pt-1" @click.prevent="skipNotification"><i class="fa fa-times text-white"></i>
                </button>
            </div>
        </div>
        <div class="col-12">
            <div class="row g-4">
                <!-- card boxes -->
                <div class="col-12">
                    <div class="row g-4">
                        <div class="col-xl-3 col-lg-3 col-md-12">
                            <div class="card-box">
                                <div class="d-flex justify-content-between">
                                    <h4>{{ currency() }} {{ number_format(Auth::user()->available_balance(), 2) }}
                                    </h4>
                                    <i class="fal fa-dollar-sign"></i>
                                </div>
                                <p class="mb-0">Main Balance</p>
                            </div>
                        </div>
                        <!-- <div class="col-xl-3 col-lg-3 col-md-12">
                            <div class="card-box">
                                <div class="d-flex justify-content-between">
                                    <h4>{{ currency() }}
                                        {{ number_format(Auth::user()->dailyIncentive->sum('comm'), 2) }}</h4>
                                    <i class="fal fa-hand-holding-usd"></i>
                                </div>
                                <p class="mb-0">Roi Income</p>
                            </div>
                        </div> -->
                        <div class="col-xl-3 col-lg-4 col-md-12">
                            <div class="card-box">
                                <div class="d-flex justify-content-between">
                                    <h4>{{ currency() }}
                                        {{ number_format(Auth::user()->investment->sum('amount'), 2) }}</h4>
                                    <i class="fal fa-box-usd"></i>
                                </div>
                                <p class="mb-0">Total Deposit</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-12">
                            <div class="card-box">
                                <div class="d-flex justify-content-between">
                                    <h4>{{ currency() }}
                                        {{ number_format(Auth::user()->level_bonus->sum('comm'), 2) }}</h4>
                                    <i class="fal fa-envelope-open-dollar"></i>
                                </div>
                                <p class="mb-0">Direct Income</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-md-12">
                            <div class="card-box">
                                <div class="d-flex justify-content-between">
                                    <h4>{{ currency() }}
                                        {{ number_format(Auth::user()->sponsorship_bonus->sum('comm'), 2) }}</h4>
                                    <i class="fal fa-envelope-open-dollar"></i>
                                </div>
                                <p class="mb-0">Level Income</p>
                            </div>
                        </div>
                        <!-- <div class="col-xl-3 col-lg-4 col-md-12">
                            <div class="card-box">
                                <div class="d-flex justify-content-between">
                                    <h4>{{ currency() }}
                                        {{ number_format(Auth::user()->leadership_bonus->sum('comm'), 2) }}</h4>
                                    <i class="fal fa-funnel-dollar"></i>
                                </div>
                                <p class="mb-0">Leadership Income</p>
                            </div>
                        </div> -->
                        <div class="col-xl-3 col-lg-4 col-md-12">
                            <div class="card-box">
                                <div class="d-flex justify-content-between">
                                    <h4>{{ currency() }}
                                        {{ number_format(Auth::user()->withdrawal->sum('amount'), 2) }}</h4>
                                    <i class="fal fa-money-check-alt"></i>
                                </div>
                                <p class="mb-0">Total Withdrawal </p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-12">
                            <div class="card-box">
                                <div class="d-flex justify-content-between">
                                    <h4>{{ $total_team }}</h4>
                                    <i class="fal fa-ticket"></i>
                                </div>
                                <p class="mb-0">My Partners</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-12">
                            <div class="card-box">
                                <div class="d-flex justify-content-between">
                                    <h4>{{ currency() }}{{ number_format($totalIncome, 2) }} </h4>
                                    <i class="fal fa-usd-circle"></i>
                                </div>
                                <p class="mb-0">total Earned</p>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                    <div class="card-box refferal-box">
                        <h5>Your refferal link</h5>
                        <div class="input-group">
                            <input type="text" class="form-control"
                                value="{{ asset('') }}register?ref={{ Auth::user()->username }}" id="sponsorURL"
                                disabled="" />
                            <button id="copyBtn" onclick="copyText('sponsorURL')" class="btn text-white">
                                Copy Link </button>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
</div>


</div>
</div>
</div>
