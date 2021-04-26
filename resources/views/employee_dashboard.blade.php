
        @extends('employee_page')

        @section('employee-page-content')
            
        <nav id="side-nav">
            <div class="side-nav-item">
                <i class="fa fa-list"></i>
                <h3>Option 1</h3>
            </div>
            <div class="side-nav-item">
                <i class="fa fa-list"></i>
                <h3>Option 2</h3>
            </div>
            <div class="side-nav-item">
                <i class="fa fa-list"></i>
                <h3>Option 3</h3>
            </div>
            <div class="side-nav-item">
                <i class="fa fa-list"></i>
                <h3>Option 4</h3>
            </div>
        </nav>
        <div id="main-content" class="scroll">
            <div class="content-row">

                <h1>DASHBOARD</h1>

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
                        <h2>New Ticket</h2>
                        <button>Submit ticket</button>
                    </div>

                    <div class="content-box-row">
                        <p>Please input problem details:</p>
                    </div>
                    <div class="content-box-row">
                        <form class="content-form" action="">
                            <div class="form-row">
                                <div class="form-input date-input">
                                    {{-- <label>Date of problem</label> --}}
                                    <input type="date">
                                </div>
                                <div class="form-input time-input">
                                    {{-- <label>Date of problem</label> --}}
                                    <input type="time">
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="form-input textarea-input">
                                    {{-- <label>Description of problem</label> --}}
                                    <input type="textarea">
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="form-input dropdown-input">
                                    {{-- <label>Software used</label> --}}
                                    <select name="" id="">
                                        <option value="" disabled selected>Select your software</option>
                                        <option value="">Software 1</option>
                                        <option value="">Software 2</option>
                                        <option value="">Software 3</option>
                                    </select>
                                </div>
                                <div class="form-input dropdown-input">
                                    {{-- <label>Operating system</label> --}}
                                    <select name="" id="">
                                        <option value="" disabled selected>Select your OS</option>
                                        <option value="">OS 1</option>
                                        <option value="">OS 2</option>
                                        <option value="">OS 3</option>
                                    </select>
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="form-input dropdown-input">
                                    {{-- <label>Problem type</label> --}}
                                    <select name="" id="">
                                        <option value="" disabled selected>Select your problem type</option>
                                        <option value="">Problem Type 1</option>
                                        <option value="">Problem Type 2</option>
                                        <option value="">Problem Type 3</option>
                                    </select>
                                </div>
                                <div class="form-input dropdown-input">
                                    {{-- <label>Priority</label> --}}
                                    <select name="" id="">
                                        <option value="" disabled selected>Select your priority</option>
                                        <option value="">Priority 1</option>
                                        <option value="">Priority 2</option>
                                        <option value="">Priority 3</option>
                                    </select>
                                </div>
                            </div>    
                        </form>
                    </div>
                </div>

            </div>
        
        </div>

        @endsection
