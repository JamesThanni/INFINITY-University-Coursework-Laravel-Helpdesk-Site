
        @extends('default')

        @section('page-content')

        <div class="login-box-container">
                <h1>Make-It-All-Helpdesk</h1>
                <form method="post" action="login/user">
                        @csrf <!-- {{ csrf_field() }} -->
                        <input type="text" name="email" placeholder="Email">
                        <input type="text" name="password" placeholder="Password">
                        <button type="submit">Submit</button>
                </form>

                
                <div class="links">
                        {{-- <a href="{{ url('employee/dashboard') }}"><h3 class="nav-item">Employee</h3></a>
                        <a href="{{ url('analyst/dashboard') }}"><h3 class="nav-item">Analyst</h3></a>
                        <a href="{{ url('specialist/dashboard') }}"><h3 class="nav-item">Specialist</h3></a> --}}
                        <p>Analyst: J.Bob@makeitall.com - 1234567</p>
                        <p>Employee: M.Smith@makeitall.com - 1234567</p>
                        <p>Specialist: J.Doe@makeitall.com - 1234567</p>
                </div>

                @foreach( $users as $user ) 
                        <p>{{ $user->userType }}</p>
                        <p>{{ $user->email }}</p>
                        <p>{{ $user->password }}</p>
                @endforeach
        </div>

        @endsection