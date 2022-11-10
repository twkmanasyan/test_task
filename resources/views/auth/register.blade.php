@extends("layouts.app")
@section("title")Register @endsection
@section("page-scripts")
    <script src="{{ asset("dist/js/jquery.maskedinput.js") }}"></script>
@endsection
@section("content")
    <div class="auth-wrapper">
        <div class="register-form">
            <form action="{{ route("register") }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label style="color:white" for="first_name" class="form-label">First Name</label>
                            <input
                                type="text"
                                class="form-control @error('first_name') is-invalid @enderror"
                                id="first_name"
                                name="first_name"
                                placeholder="John"
                            >

                            @if($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label style="color:white" for="last_name" class="form-label">Last Name</label>
                            <input
                                type="text"
                                class="form-control @error('last_name') is-invalid @enderror"
                                id="last_name"
                                name="last_name"
                                placeholder="Smith"
                            >

                            @if($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label style="color:white" for="birth_date" class="form-label">Birth Date</label>
                            <input
                                type="text"
                                class="form-control @error('birth_date') is-invalid @enderror"
                                id="birth_date"
                                name="birth_date"
                                placeholder="01/01/1995"
                            >

                            @if($errors->has('birth_date'))
                                <span class="text-danger">{{ $errors->first('birth_date') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label style="color:white" for="phone" class="form-label">Phone</label>
                            <input
                                type="tel"
                                class="form-control @error('phone') is-invalid @enderror"
                                id="phone"
                                name="phone"
                                placeholder="(991)-222-3333"
                            >

                            @if($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                placeholder="example@mai.ru"
                            >

                            @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label style="color:white" for="password" class="form-label">Password</label>
                            <input
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password"
                                name="password"
                                placeholder="****"
                            >

                            @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label style="color:white" for="confirm_password" class="form-label">Confirm Password</label>
                            <input
                                type="password"
                                class="form-control @error('confirm_password') is-invalid @enderror"
                                id="confirm_password"
                                name="confirm_password"
                                placeholder="****"
                            >

                            @if($errors->has('confirm_password'))
                                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-2">
                            <input type="checkbox" class="form-check-input" name="sport_favorite">
                            <label style="color: #ffffff" class="form-check-label">Favorite Sport</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success">Register</button>
            </form>
            <p class="mt-2" style="color:#ffffff;">Account Exists? <a href="{{ route("index") }}">Sign In</a></p>

        </div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            $("#phone").mask("(999)-999-9999");
            $("#birth_date").mask("99/99/9999");
        })
    </script>
@endsection
