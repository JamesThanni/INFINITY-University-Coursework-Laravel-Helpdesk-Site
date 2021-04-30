
        @extends('specialist_page')

        @section('specialist-page-content')
            
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

                <h1>Edit</h1>

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
                                <button type="submit">Add software</button>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="content-box">
                    <div class="top-row">
                        <h2>Software</h2>
                        <div>
                            <input type="text" placeholder="please enter keyword" />
                            <button>Filter By</button>
                        </div>
                    </div>
                </div>

            </div>
        
        </div>

        @endsection
