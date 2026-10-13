<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Log in | Nanova Commercial admin</title>
    <link rel="icon" href="{{ asset('assets/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminlte/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/admin.css') }}?v={{ filemtime(base_path('assets/admin/admin.css')) }}">
</head>
<body class="auth">
<main class="auth-layout">
    <section class="auth-panel">
        <a href="{{ url('/') }}" class="auth-logo">
            <img src="{{ $logo }}" alt="Nanova Commercial">
        </a>

        <form method="POST" action="{{ route('admin.login.attempt') }}" class="auth-form">
            @csrf
            <h1>Admin login</h1>

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

            <div class="custom-control custom-checkbox auth-remember">
                <input type="checkbox" class="custom-control-input" id="remember" name="remember" value="1">
                <label class="custom-control-label" for="remember">Keep me logged in</label>
            </div>

            <button type="submit" class="btn btn-primary btn-block auth-submit">Log in</button>
        </form>

        <a href="{{ url('/') }}" class="auth-back">Back to nanovagroups.com</a>
    </section>

    @if ($photo)
        <div class="auth-photo">
            <img src="{{ $photo }}" alt="">
        </div>
    @endif
</main>
</body>
</html>
