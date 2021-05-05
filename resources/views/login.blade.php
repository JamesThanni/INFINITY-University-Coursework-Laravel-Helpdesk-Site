
        @extends('default')

        @section('page-content')

        <div class="login-box-container">
                <h1>Make-It-All-Helpdesk</h1>
                <form action="">
                        <input type="text" placeholder="Username">
                        <input type="text" placeholder="Password">
                        <button type="submit">Submit</button>
                </form>

                
                <div class="links">
                        <a href="{{ url('employee/dashboard') }}"><h3 class="nav-item">Employee</h3></a>
                        <a href="{{ url('analyst/dashboard') }}"><h3 class="nav-item">Analyst</h3></a>
                        <a href="{{ url('specialist/dashboard') }}"><h3 class="nav-item">Specialist</h3></a>
                </div>
        </div>

        @endsection