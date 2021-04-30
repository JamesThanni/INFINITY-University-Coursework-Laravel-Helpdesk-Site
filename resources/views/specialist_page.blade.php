@extends('default')

@section('page-content')

<div class="wrapper">
    <nav id="top-nav">
        <div class="left">
            <div class="logo">
                <i class="fa fa-list"></i>
                <h2>Make-It-All<br/>Helpdesk</h2>
            </div>
        </div>
        <div class="right">
            <a href="{{ url('specialist/dashboard') }}"><h3 class="nav-item">Dashboard</h3></a>
            <a href="{{ url('specialist/FAQ') }}"><h3 class="nav-item">FAQ</h3></a>
            <a href="{{ url('specialist/edit') }}"><h3 class="nav-item">Edit</h3></a>
            <a href="{{ url('login') }}"><h3 class="nav-item fancy-nav-item">Log Out</h3></a>
        </div>
    </nav>
    @yield('specialist-page-content')

</div>

@endsection
