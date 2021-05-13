
        @extends('employee_page')

        @section('employee-page-content')
            
        <nav id="side-nav">
            <div class="side-nav-item">
                <i class="fa fa-plus-square green"></i>
                <a href="{{ url('employee/dashboard') }}"><h3>Create a ticket</h3></a>
            </div>
            <div class="side-nav-item">
                <i class="fa fa-phone red"></i>
                <a href="{{ url('employee/tickets/unsolved') }}"><h3>Unsolved tickets </h3></a>
            </div>
            <div class="side-nav-item">
                <i class="fa fa-question blue"></i>
                <a href="{{ url('employee/tickets/pending') }}"><h3>Pending tickets</h3></a>
            </div>
            <div class="side-nav-item">
                <i class="fa fa-square yellow"></i>
                <a href="{{ url('employee/tickets/solved') }}"><h3>Solved tickets</h3></a>
            </div>
        </nav>
        
        <div id="main-content" class="scroll">
            <div class="content-row">

                <h1>My Tickets</h1>

            </div>
            <div class="content-row">

                <div class="stat-box">
                    <p>Calls made:</p>
                    <h3>6</h3>
                </div>

                <div class="stat-box">
                    <p>Unsolved tickets:</p>
                    <h3>2</h3>
                </div>

            </div>

            <div class="content-row">
                <div class="content-box">
                    <div class="top-row">
                        <h2>{{ $title }}</h2>
                        <div>
                            <input type="text" placeholder="please enter keywords" onkeyup="searchEmployeeTicketsTable(event, 2)"/>
                            <button>Filter By</button>
                        </div>
                    </div>

                    <div class="content-box-row">
                        <table class="table scroll">
                            <thead>
                                <tr>
                                    @foreach ($fields as $field)
                                        <th>{{ $field }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        @foreach ($ticket as $info)
                                            <td>{{ $info }}</td>
                                        @endforeach
                                        
                                        @if ($type == 'pending')
                                            <td>
                                                <form method="post" action="pending/accept">
                                                    @csrf <!-- {{ csrf_field() }} -->

                                                    <input type="text" name='ticketID' value={{ $ticket[0] }} hidden>
                                                    <button class="no-style" type="submit"><i class="fa fa-check-circle green"></i></button>
                                                
                                                </form>
                                                <form method="post" action="pending/deny">
                                                    @csrf <!-- {{ csrf_field() }} -->

                                                    <input type="text" name='ticketID' value={{ $ticket[0] }} hidden>
                                                    <button class="no-style" type="submit"><i class="fa fa-minus-circle" style="color:rgb(255, 58, 58)"></i></button>
                                                
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        
        </div>

        @endsection
