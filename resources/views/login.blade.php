
        @extends('default')

        @section('page-content')

        <a href="{{ url('employee/dashboard') }}"><h3 class="nav-item">Employee</h3></a>
        <a href="{{ url('analyst/dashboard') }}"><h3 class="nav-item">Analyst</h3></a>
        <a href="{{ url('specialist/dashboard') }}"><h3 class="nav-item">Specialist</h3></a>

        @endsection