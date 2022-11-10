@extends("layouts.app")
@section("title")Login @endsection

@section("content")
    <div class="auth-wrapper">
        <div class="register-form">
            <form action="{{ route("login") }}" method="post">
                @csrf
                <div class="mb-2">
                    <label style="color:#ffffff" for="email" class="form-label">Email</label>
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

                <button class="btn btn-primary">Login</button>
            </form>
            <p class="mt-2" style="color:#ffffff;">Account Not Created? <a href="{{ route("register-view") }}">Create Account</a></p>
        </div>
    </div>
@endsection
