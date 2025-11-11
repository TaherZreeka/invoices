@extends('layouts.master2')
@section('title')
تسجيل دخول يرنامج فواتير
@endsection
@section('css')
<!-- Sidemenu-responsive-tabs css -->
<link href="{{ URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
    rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
            <div class="row wd-100p mx-auto text-center">
                <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                    <img src="{{ URL::asset('assets/img/brand/profile-pic1.png') }}"
                        class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                </div>
            </div>
        </div>

        <!-- The content half -->
        <div class="col-md-6 col-lg-6 col-xl-5 bg-white" dir="rtl">
            <div class="login d-flex align-items-center py-2">
                <div class="container p-0">
                    <div class="row">
                        <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                            <div class="card-sigin">
                                <div class="mb-5 d-flex justify-content-center">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ URL::asset('assets/img/brand/login.png') }}" class=" ht-60"
                                            alt="logo">
                                    </a>
                                    <h1 class="main-logo1 ml-30 mr-0 my-auto tx-28">Ta<span>he</span>rWebs</h1>
                                </div>

                                <div class="card-sigin">
                                    <div class="main-signup-header">
                                        <h2>مرحبًا بعودتك!</h2>
                                        <h5 class="font-weight-semibold mb-4">يرجى تسجيل الدخول للمتابعة.</h5>

                                        <!-- ✅ Login Form -->
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <!-- Email -->
                                            <div class="form-group">
                                                <label for="email">البريد الإلكتروني</label>
                                                <input id="email" type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="أدخل بريدك الإلكتروني" value="{{ old('email') }}"
                                                    required autofocus>
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Password -->
                                            <div class="form-group">
                                                <label for="password">كلمة المرور</label>
                                                <input id="password" type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="أدخل كلمة المرور" required>
                                                @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>



                                            <!-- Submit -->
                                            <button class="btn btn-main-primary btn-block">تسجيل الدخول</button>
                                        </form>




                                    </div>
                                </div>
                            </div><!-- card-sigin -->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- content half -->
    </div>
</div>
@endsection

@section('js')
@endsection