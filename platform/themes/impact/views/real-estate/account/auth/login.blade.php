<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card login-form">
                <div class="card-body">
                    <h4 class="text-center">تسجيل الدخول</h4>
                    <br>
                    <form method="POST" action="{{ route('public.account.login') }}">
                        @csrf
                        <div class="form-group">
                            <input id="email" type="text"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   placeholder="الاسم / الايميل"
                                   name="email" value="{{ old('email') }}" autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   placeholder="الرقم السرى" name="password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
                </span>
                            @endif
                        </div>
                        <div class="form-group"><div class="row"><div class="col-md-6"><div class="checkbox"><label><input type="checkbox" name="remember"> تذكرنى
                                        </label></div></div> <div class="col-md-6 text-md-center"><a href="{{ route('public.account.password.request') }}">
                                      نسيت الرقم السرى
                                    </a></div></div></div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-blue btn-full fw6 text-center">
                               دخول
                            </button>

                        </div>

                        <div class="form-group text-center mt-5">
                            <p class="text-center">ليس لديك حساب ؟
                                <a href="{{ route('public.account.register') }}" class="d-block d-sm-inline-block text-sm-left text-center">
                                    تسجيل حساب جديد
                                </a>
                            </p>
                        </div>

                        <div class="text-center">
                            {!! apply_filters(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM, null, \Botble\RealEstate\Models\Account::class) !!}
                        </div>
                    </form>
                </div>
                @include(Theme::getThemeNamespace() . '::views.real-estate.account.auth.includes.messages')
            </div>
        </div>
    </div>
</div>
