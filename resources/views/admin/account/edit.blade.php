@extends('admin.layouts.app')

@section('title', 'Account')

@section('content')
    @php($user = auth()->user())
    <form method="POST" action="{{ route('admin.account.update') }}" class="panel">
        @csrf
        @method('PUT')
        <div class="panel-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name"
                       @class(['form-control', 'is-invalid' => $errors->has('name')])>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="username"
                       @class(['form-control', 'is-invalid' => $errors->has('email')])>
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password">New password</label>
                <input type="password" id="password" name="password" autocomplete="new-password"
                       @class(['form-control', 'is-invalid' => $errors->has('password')])>
                <small class="form-text muted">Leave empty to keep the current password. At least 8 characters.</small>
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Repeat new password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password" class="form-control">
            </div>

            <div class="form-group">
                <label for="current_password">Current password</label>
                <input type="password" id="current_password" name="current_password" required autocomplete="current-password"
                       @class(['form-control', 'is-invalid' => $errors->has('current_password')])>
                @error('current_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary">Save account</button>
            </div>
        </div>
    </form>
@endsection
