<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Log in | Nanova Groups admin</title>
    <link rel="icon" href="{{ asset('assets/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminlte/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/admin.css') }}">
</head>
<body class="hold-transition login-page">
<main class="login-box">
    <div class="login-logo">Nanova Groups</div>

    <div class="panel">
        <form method="POST" action="{{ route('admin.login.attempt') }}" class="panel-body">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" autocomplete="username" required autofocus
                       @class(['form-control', 'is-invalid' => $errors->has('email')])>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" autocomplete="current-password" required class="form-control">
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary">Log in</button>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="remember" name="remember" value="1">
                    <label class="custom-control-label font-weight-normal" for="remember">Keep me logged in</label>
                </div>
            </div>
        </form>
    </div>
</main>
</body>
</html>
