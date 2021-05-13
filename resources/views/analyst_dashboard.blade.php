
        @extends('analyst_page')

        @section('analyst-page-content')
            
        {{-- <nav id="side-nav">
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
        </nav> --}}
        <div id="main-content" class="scroll">
            <div class="content-row">

                <h1>DASHBOARD</h1>

            </div>

            <div class="content-row">

                <div class="content-box">
                    <div class="top-row">
                        <h2>Most Faulty Software</h2>
                    </div>
                    <div class="content-box-row" id="most-faulty-software">
                        
                    </div> 
                </div>

                <div class="content-box">
                    <div class="top-row">
                        <h2>Solving Tickets</h2>
                    </div>
                    <div class="content-box-row" id="solving-tickets">
                        
                    </div> 
                </div>

            </div>
            <div class="content-row">

                <div class="content-box">
                    <div class="top-row">
                        <h2>Today vs Yesterday</h2>
                    </div>
                    <div class="content-box-row" id="today-vs-yesterday">
                        
                    </div> 
                </div>

                <div class="content-box">
                    <div class="top-row">
                        <h2>Live Problem Status</h2>
                    </div>
                    <div class="content-box-row" id="live-problem-status">
                        
                    </div> 
                </div>
                <div class="content-box">
                    <div class="top-row">
                        <h2>Test</h2>
                    </div>
                    <div class="content-box-row" id="test">
                        
                    </div> 
                </div>

            </div>
        
        </div>

        @endsection
