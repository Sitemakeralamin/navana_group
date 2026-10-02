<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title') | Nanova Groups admin</title>
    <link rel="icon" href="{{ asset('assets/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminlte/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/admin.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">Menu</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('/') }}" class="nav-link" target="_blank" rel="noopener">View site</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{ route('admin.account.edit') }}" class="nav-link">{{ auth()->user()->name }}</a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link">Log out</button>
                </form>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary">
        <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <span class="brand-text">Nanova Groups</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" @class(['nav-link', 'active' => request()->routeIs('admin.dashboard')])>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-header">Pages</li>
                    @foreach (config('cms.pages') as $pageKey => $pageItem)
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.show', $pageKey) }}" @class(['nav-link', 'active' => ($currentPage ?? null) === $pageKey])>
                                <p>{{ $pageItem['label'] }}</p>
                            </a>
                        </li>
                    @endforeach
                    <li class="nav-header">Settings</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.account.edit') }}" @class(['nav-link', 'active' => request()->routeIs('admin.account.*')])>
                            <p>Account</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                @hasSection('breadcrumb')
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">@yield('breadcrumb')</ol>
                    </nav>
                @endif
                <div class="page-heading">
                    <h1>@yield('title')</h1>
                    @yield('actions')
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                @if (session('status'))
                    <div class="alert alert-success" role="status">{{ session('status') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">Some fields need fixing. See the messages below.</div>
                @endif

                @yield('content')
            </div>
        </section>
    </div>
</div>

<script src="{{ asset('assets/adminlte/jquery.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/adminlte.min.js') }}"></script>
</body>
</html>
