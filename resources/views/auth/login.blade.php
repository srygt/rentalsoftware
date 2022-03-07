@extends('admin.authentication.master')
@section('title', 'Giriş Paneli')


@push('css')
@endpush

@section('content')
    <section>
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-xl-7 order-1"><img class="bg-img-cover bg-center" src="{{ asset('assets/images/login/back_erp.jpg') }}" alt="ofiserp" /></div>
	            <div class="col-xl-5 p-0">
	                <div class="login-card">
                        <form class="theme-form login-form needs-validation" method="post" action="{{route('Login.post')}}">
                            @csrf
                            <div class="mb-3">
                                <p><img class="bg-img-cover bg-center" src="{{ asset('assets/images/login/logo.png') }}" alt="ofiserp" /></p>
                            </div>
                            <div class="mb-3">
                                <p class="lead"><i class="fa fa-sign-in"></i> <strong>Oturum Alanı</strong></p>
                            </div>
                            <div class="form-group">
                                <label  class="control-label sr-only">Kullanıcı Adı</label>
                                <input type="text" name='username' class="form-control round"  required="" id="signin-email"  placeholder="Kullanıcı Adı">
                            </div>
                            <div class="form-group">
                                <label for="signin-password" class="control-label sr-only">Password</label>
                                <input type="password" name="password"  class="form-control round" id="signin-password"  placeholder="Şifre">
                                <div class="show-hide"><span class="show"> </span></div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="fancy-checkbox element-left">
                                    <input type="checkbox">
                                    <span>Beni Hatırla</span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-round btn-block">Giriş Yap</button>
                        </form>
                        @if($errors->any())
                            <div class="col-lg-6 col-md-12">
                                <div class="alert alert-danger">
                                    {{$errors->first()}}
                                </div>
                            </div>
                            @endif   
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<script>
	    (function () {
	        "use strict";
	        window.addEventListener(
	            "load",
	            function () {
	                // Fetch all the forms we want to apply custom Bootstrap validation styles to
	                var forms = document.getElementsByClassName("needs-validation");
	                // Loop over them and prevent submission
	                var validation = Array.prototype.filter.call(forms, function (form) {
	                    form.addEventListener(
	                        "submit",
	                        function (event) {
	                            if (form.checkValidity() === false) {
	                                event.preventDefault();
	                                event.stopPropagation();
	                            }
	                            form.classList.add("was-validated");
	                        },
	                        false
	                    );
	                });
	            },
	            false
	        );
	    })();
	</script>


    @push('scripts')
    @endpush

@endsection