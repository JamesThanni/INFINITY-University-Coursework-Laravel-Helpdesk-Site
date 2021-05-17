
        @extends('default')

        @section('page-content')

        <div class="login-box-container">
                <i class="fa fa-wrench blue fa-3x"></i>
                <h1>Make-It-All-Helpdesk</h1>
                <form method="post" action="login/user" onsubmit="return loginValidation();">
                        @csrf <!-- {{ csrf_field() }} -->
                        <input id="email" type="text" name="email" placeholder="Email">
                        <input id="password" type="password" name="password" placeholder="Password">
                        <button type="submit">Submit</button>
                </form>

                
                <div class="links">
                        {{-- <a href="{{ url('employee/dashboard') }}"><h3 class="nav-item">Employee</h3></a>
                        <a href="{{ url('analyst/dashboard') }}"><h3 class="nav-item">Analyst</h3></a>
                        <a href="{{ url('specialist/dashboard') }}"><h3 class="nav-item">Specialist</h3></a> --}}

                        <!--
                        <p>Analyst: J.Bob@makeitall.com - 1234567</p>
                        <p>Employee: M.Smith@makeitall.com - 1234567</p>
                        <p>Specialist: J.Doe@makeitall.com - 1234567</p>
                        -->
                </div>
                
               
        </div>

        @endsection