<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>{{$title}}</title>
</head>

<body>
    <div class="login">
        @if (isset($error))
        <div class="alert alert-danger text-center" role="alert">
            {{$error}}
        </div>
        @endif
        <h1 class="text-center">Welcome</h1>
        <form class="needs-validate" action="{{ route('post_login') }}" method="post">
            @csrf
            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" value="{{ old('username') }}" required>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-check-input" type="checkbox" name="remember">
                <label class="form-check-label"for="checkbox">Remember Me</label>
            </div>
            <input class="btn btn-success w-100" type="submit" value="Login">
        </form>

        <div class="mt-3 text-center">
            <p>Belum punya akun? <a class="text-decoration-none" href="{{ route('register') }}">Daftar</a></p>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>