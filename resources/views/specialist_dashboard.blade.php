
        @extends('specialist_page')

        @section('specialist-page-content')
            
        <nav id="side-nav">
            <div class="side-nav-item">
                <i class="fa fa-phone red"></i>
                <a href="{{ url('specialist/dashboard/unsolved') }}"><h3>Unsolved tickets </h3></a>
            </div>
            <div class="side-nav-item">
                <i class="fa fa-question blue"></i>
                <a href="{{ url('specialist/dashboard/pending') }}"><h3>Pending tickets</h3></a>
            </div>
            <div class="side-nav-item">
                <i class="fa fa-square yellow"></i>
                <a href="{{ url('specialist/dashboard/solved') }}"><h3>Solved tickets</h3></a>
            </div>
        </nav>

        <div id="main-content" class="scroll">
            <div class="content-row">

                <h1>My Tickets</h1>

            </div>
            
            @if ($type == 'all')
                <div class="content-row">

                    <div class="stat-box">
                        <p>Assigned Tickets</p>
                        <h3>{{ count($tickets) }}</h3>
                    </div>

                    <div class="stat-box">
                        <p>Solved Tickets</p>
                        <h3>{{ count($tickets) - count($unsolved) }}</h3>
                    </div>

                </div>
            @endif

            <div class="content-row">
                <div class="content-box">
                    <div class="top-row">
                        <h2>{{ $title }}</h2>
                        <div>
                            <input type="text" placeholder="please enter keyword"/>
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
                                    @if ($type == "unsolved" || $type == "all")
                                        <th>Interaction</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        @foreach ($ticket as $info)                                    
                                        <td>{{ $info }}</td>                                        
                                        @endforeach
                                        @if ($type == "unsolved" || $type == "all")
                                            @if (strtolower(end($ticket)) == 'unsolved')
                                                <td>
                                                    <form class="content-form" method="post" action="solve">
                                                        @csrf
                                                            
                                                        <input name="ticketID" value={{ $ticket[0] }} hidden>
                                                        <!-- <a href=" {{ url('specialist/solve') }}">Solve</a>  change form method and route method to get-->
                                                        <button type="submit">Solve</button>
                                                    </form>

                                                    <form class="content-form" method="post" action="reassign">
                                                        @csrf
                                                            
                                                        <input name="ticketID" value={{ $ticket[0] }} hidden>
                                                        <!-- <a href=" {{ url('specialist/reassign') }}">Solve</a>  change form method and route method to get-->
                                                        <button type="submit">Reassign</button>
                                                    </form>
                                                </td>
                                                
                                                @else
                                                    <td></td>
                                                @endif
                                            @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    

                </div>
            </div>

        
        </div>

        @endsection
