
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
                            </div>
                            <div class="form-row">
                                <button type="submit">Add hardware</button>
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
                                            {{-- <i class="fa fa-edit" style="color:#03fcb1"></i> --}}
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
        
        </div>

        @endsection
