
        @extends('employee_page')

        @section('employee-page-content')
            
        <nav id="side-nav">
            <div class="side-nav-item">
                <i class="fa fa-plus-square green"></i>
                <h3>Create a ticket</h3>
            </div>
            <div class="side-nav-item">
                <i class="fa fa-phone red"></i>
                <h3>Unsolved tickets </h3>
            </div>
            <div class="side-nav-item">
                <i class="fa fa-question blue"></i>
                <h3>Pending tickets</h3>
            </div>
            <div class="side-nav-item">
                <i class="fa fa-square yellow"></i>
                <h3>Solved tickets</h3>
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
                        <h2>Your tickets</h2>
                        <div>
                            <input type="text" placeholder="please enter keyword"/>
                            <button>Filter By</button>
                        </div>
                    </div>

                    <div class="content-box-row">
                        <table class="table scroll">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th>Specialist</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                </tr>
                                <tr>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                </tr>
                                <tr>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                </tr>
                                <tr>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                </tr>
                                <tr>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                </tr>
                                <tr>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                </tr>
                                <tr>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                    <td>1324</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        
        </div>

        @endsection
