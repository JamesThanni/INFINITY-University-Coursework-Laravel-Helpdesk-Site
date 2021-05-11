
        @extends('employee_page')

        @section('employee-page-content')
            
        <nav id="side-nav">
            <div class="side-nav-item">
                <i class="fa fa-plus-square green"></i>
                <a href="{{ url('employee/dashboard') }}"><h3>Clear</h3></a>
            </div>
        </nav>
        <div id="main-content" class="scroll">
            <div class="content-row">

                <h1>DASHBOARD</h1>

            </div>

            <div class="content-row">
                <div class="content-box">
                    <div class="top-row">
                        <h2>FAQ</h2>
                        <input placeholder="search FAQ" type="text" />
                    </div>
                </div>
            </div>

            <div class="content-row">

                <div class="content-box">
                    <div class="top-row">
                        <h2>New Ticket</h2>
                        <a href="{{ url('employee/dashboard') }}"><button>Clear ticket</button></a>
                    </div>

                    <div class="content-box-row">
                        <p>Please input problem details:</p>
                    </div>
                    <div class="content-box-row">
                        <form class="content-form" method="post" action="/employee/dashboard/add-ticket">
                            @csrf <!-- {{ csrf_field() }} -->

                            <div class="form-row">
                                <div class="form-input textarea-input">
                                    {{-- <label>Description of problem</label> --}}
                                    <input type="textarea" name="description" placeholder="Description of problem">
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="form-input textarea-input">
                                    {{-- <label>Description of problem</label> --}}
                                    <input type="textarea" name="reason" placeholder="Reason for logging problem">
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="form-input dropdown-input">
                                    {{-- <label>Software used</label> --}}
                                    <select name="softID" id="">
                                        <option value="" disabled selected>Select your software</option>
                                        @foreach ($software as $s)
                                            <option value="{{ $s->softID }}">{{ $s->softName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-input dropdown-input">
                                    {{-- <label>Operating system</label> --}}
                                    <select name="OSID" id="">
                                        <option value="" disabled selected>Select your OS</option>
                                        @foreach ($os as $o)
                                            <option value="{{ $o->OSID }}">{{ $o->version }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="form-input dropdown-input">
                                    {{-- <label>Hardware</label> --}}
                                    <select name="serial_no" id="">
                                        <option value="" disabled selected>Select your hardware</option>
                                        @foreach ($hardware as $h)
                                            <option value="{{ $h->serial_no }}">{{ $h->serial_no }} - {{ $h->hardType }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-input dropdown-input">
                                    {{-- <label>Priority</label> --}}
                                    <select name="priority" id="">
                                        <option value="" disabled selected>Select your priority</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>    
                            <div class="form-row">
                                <div class="form-input dropdown-input">
                                    {{-- <label>Location</label> --}}
                                    <select name="locationID" id="">
                                        <option value="" disabled selected>Select your location</option>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->locationID }}">{{ $location->country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" style="width: 100%">Submit ticket</button>
                            </div>    
                        </form>
                    </div>
                </div>

            </div>
        
        </div>

        @endsection
