
        @extends('specialist_page')

        @section('specialist-page-content')
            
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

                <h1>Edit</h1>

            </div>

            <div class="content-row">

                <div class="content-box">
                    <div class="top-row">
                        <h2>New Hardware</h2>
                    </div>

                    <div class="content-box-row">
                        <p>Please enter hardware details:</p>
                    </div>
                    <div class="content-box-row">
                        <form class="content-form" method="post" action="edit/add-hardware">
                            @csrf <!-- {{ csrf_field() }} -->

                            <div class="form-row">
                                <div class="form-input num-input">
                                    <label>Serial Number</label>
                                    <input type="number" name="serial_no">
                                </div>
                                <div class="form-input text-input">
                                    <label>Type</label>
                                    <input type="text" name="hardType">
                                </div>
                            </div>   
                            
                            <div class="form-row">
                                <div class="form-input text-input">
                                    <label>Make</label>
                                    <input type="text" name="make">
                                </div>
                                <div class="form-input button-input">
                                    <button type="submit" style="width:100%">Add hardware</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>

                <div class="content-box">
                    <div class="top-row">
                        <h2></h2>
                        <div>
                            <input type="text" placeholder="please enter keyword" onkeyup="searchHardwareTable(event, 1)"/>
                            <button>Filter By</button>
                        </div>
                    </div>
                    <div class="content-box-row">
                        <table class="table hardware-table scroll">
                            <thead>
                                <tr>
                                    <th>Serial Number</th>
                                    <th>Type</th>
                                    <th>Make</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $hardware as $h ) 
                                    <tr>
                                        <td>{{ $h->serial_no }}</td>
                                        <td>{{ $h->hardType }}</td>
                                        <td>{{ $h->make }}</td>
                                        <td>
                                            {{-- <i class="fa fa-edit yellow"></i> --}}
                                            <form method="post" action="edit/remove-hardware">
                                                @csrf <!-- {{ csrf_field() }} -->

                                                <input type="text" name='serial_no' value={{ $h->serial_no }} hidden>
                                                <button class="no-style" type="submit"><i class="fa fa-minus-circle" style="color:rgb(255, 58, 58)"></i></button>
                                            
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="content-row">

                <div class="content-box">
                    <div class="top-row">
                        <h2>New Software</h2>
                    </div>

                    <div class="content-box-row">
                        <p>Please enter software details:</p>
                    </div>
                    <div class="content-box-row">
                        <form class="content-form" method="post" action="edit/add-software">
                            @csrf <!-- {{ csrf_field() }} -->

                            <div class="form-row">
                                <div class="form-input num-input">
                                    <label>Software Name</label>
                                    <input type="text" name="softName">
                                </div>
                                <div class="form-input checkbox-input">
                                    <label>Licensed</label>
                                    <input type="checkbox" name="licensed">
                                </div>
                            </div>   
                            
                            <div class="form-row">
                                <div class="form-input checkbox-input">
                                    <label>Supported</label>
                                    <input type="checkbox" name="supported">
                                </div>
                                <div class="form-input button-input">
                                    <button type="submit" style="width:100%">Add software</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>

                <div class="content-box">
                    <div class="top-row">
                        <h2></h2>
                        <div>
                            <input type="text" placeholder="please enter keyword" onkeyup="searchSoftwareTable(event, 1)"/>
                            <button>Filter By</button>
                        </div>
                    </div>
                    <div class="content-box-row">
                        <table class="table hardware-table scroll">
                            <thead>
                                <tr>
                                    <th>Software Name</th>
                                    <th>Licensed</th>
                                    <th>Supported</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $software as $s ) 
                                    <tr>
                                        <td>{{ $s->softName }}</td>
                                        <td>{{ $s->licensed }}</td>
                                        <td>{{ $s->supported }}</td>
                                        <td>
                                            {{-- <i class="fa fa-edit" style="color:#03fcb1"></i> --}}
                                            <form>
                                                @csrf <!-- {{ csrf_field() }} -->

                                                <input type="text" name='softID' value={{ $s->softID }} hidden>
                                                <button class="no-style" type="submit"><i class="fa fa-minus-circle" style="color:rgb(255, 58, 58)"></i></button>
                                            
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="content-row">

                <div class="content-box">
                    <div class="top-row">
                        <h2>New Operating System</h2>
                    </div>

                    <div class="content-box-row">
                        <p>Please enter OS details:</p>
                    </div>
                    <div class="content-box-row">
                        <form class="content-form" method="post" action="edit/add-os">
                            @csrf <!-- {{ csrf_field() }} -->

                            <div class="form-row">
                                <div class="form-input num-input">
                                    <label>OS Version</label>
                                    <input type="text" name="version">
                                </div>
                                <div class="form-input checkbox-input">
                                    <label>Licensed</label>
                                    <input type="checkbox" name="licensed">
                                </div>
                            </div>   
                            
                            <div class="form-row">
                                <div class="form-input checkbox-input">
                                    <label>Supported</label>
                                    <input type="checkbox" name="supported">
                                </div>
                                <div class="form-input button-input">
                                    <button type="submit" style="width:100%">Add OS</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>

                <div class="content-box">
                    <div class="top-row">
                        <h2></h2>
                        <div>
                            <input type="text" placeholder="please enter keyword" onkeyup="searchSoftwareTable(event, 1)"/>
                            <button>Filter By</button>
                        </div>
                    </div>
                    <div class="content-box-row">
                        <table class="table hardware-table scroll">
                            <thead>
                                <tr>
                                    <th>OS Version</th>
                                    <th>Licensed</th>
                                    <th>Supported</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $os as $o ) 
                                <tr>
                                    <td>{{ $o->version }}</td>
                                    <td>{{ $o->licensed }}</td>
                                    <td>{{ $o->supported }}</td>
                                    <td>
                                        {{-- <i class="fa fa-edit" style="color:#03fcb1"></i> --}}
                                        <form>
                                            @csrf <!-- {{ csrf_field() }} -->

                                            <input type="text" name='OSID' value={{ $o->OSID }} hidden>
                                            <button class="no-style" type="submit"><i class="fa fa-minus-circle" style="color:rgb(255, 58, 58)"></i></button>
                                        
                                        </form>
                                    </td>
                                </tr>
                             @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="content-row">

                <div class="content-box">
                    <div class="top-row">
                        <h2>New FAQ</h2>
                    </div>

                    <div class="content-box-row">
                        <p>Please enter FAQ details:</p>
                    </div>
                    <div class="content-box-row">
                        <form class="content-form" method="post" action="edit/add-faq">
                            @csrf <!-- {{ csrf_field() }} -->

                            <div class="form-row">
                                <div class="form-input date-input">
                                    <label>Date solved</label>
                                    <input type="date" name="dateSolved">
                                </div>
                                <div class="form-input time-input">
                                    <label>Time solved</label>
                                    <input type="time" name="timeSolved">
                                </div>
                            </div>   
                            
                            <div class="form-row">
                                <div class="form-input textarea-input">
                                    <label>Solution</label>
                                    <input type="textarea" name="solution">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-input text-input">
                                    <label>Problem</label>
                                    <input type="text" name="problem">
                                </div>
                                <div class="form-input button-input">
                                    <button type="submit" style="width:100%">Add FAQ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="content-box">
                    <div class="top-row">
                        <h2></h2>
                        <div>
                            <input type="text" placeholder="please enter keyword" onkeyup="searchSoftwareTable(event, 1)"/>
                            <button>Filter By</button>
                        </div>
                    </div>
                    <div class="content-box-row">
                        <table class="table hardware-table scroll">
                            <thead>
                                <tr>
                                    <th>Problem</th>
                                    <th>Solution</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $faqs as $faq ) 
                                <tr>
                                    <td>{{ $faq->problem }}</td>
                                    <td>{{ $faq->solution }}</td>
                                    <td>
                                        <form method="post" action="edit/remove-faq">
                                            @csrf <!-- {{ csrf_field() }} -->

                                            <input type="text" name='faqID' value={{ $faq->faqID }} hidden>
                                            <button class="no-style" type="submit"><i class="fa fa-minus-circle" style="color:rgb(255, 58, 58)"></i></button>
                                        
                                        </form>
                                    </td>
                                </tr>
                             @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>


        
        </div>

        @endsection
