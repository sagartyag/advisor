
            <div class="cab-content">
                <div class="container">
                    <div class="cab-tabs">
                        <a class="cab-tabs__item" href="{{route('user.profile')}}" style="text-decoration: none;">Account settings</a>
                        <a class="cab-tabs__item" href="{{route('user.wallets')}}" style="text-decoration: none;">Wallets
                            settings</a>
                        <a class="cab-tabs__item active" href="{{route('user.ChangePass')}}" style="text-decoration: none;">Change
                            password</a>
                     
                    </div>
                    <form method="post" action="{{ route('user.edit-password') }}" >
                        {{ csrf_field() }}
                        <div class="cab-inputs"><label class="cab-input">
                                <p>Old password</p><input type="password" name="old_password"><svg>
                                    <use xlink:href="assets/img/sprite.svg#pass"></use>
                                </svg>
                            </label><label class="cab-input">
                                <p>New password</p><input type="password" name="password"><svg>
                                    <use xlink:href="assets/img/sprite.svg#pass"></use>
                                </svg>
                            </label><label class="cab-input">
                                <p>Confirm new password</p><input type="password" name="password_confirmation"><svg>
                                    <use xlink:href="assets/img/sprite.svg#pass"></use>
                                </svg>
                            </label></div><input name="__Cert" value="44b7be27" type="hidden"><button
                            name="account/change_pass_frm_btn"
                            class="main-btn main-btn_orange main-btn_m">save</button>
                    </form>
                </div>
            </div>
         