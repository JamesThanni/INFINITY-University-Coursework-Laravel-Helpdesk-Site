@extends('default')

@section('page-content')
<p>Emp ID: {{ (session('empID')) }}</p>

<div class="wrapper">
    <nav id="top-nav">
        <div class="left">
            <div class="logo">
                <i class="fa fa-list"></i>
                <h2>Make-It-All<br/>Helpdesk</h2>
            </div>
        </div>
        <div class="right">
            <a href="{{ url('analyst/dashboard') }}"><h3 class="nav-item">Dashboard</h3></a>
            <a href="{{ url('logout') }}"><h3 class="nav-item fancy-nav-item">Log Out</h3></a>
        </div>
    </nav>
    @yield('analyst-page-content')

</div>

@endsection
