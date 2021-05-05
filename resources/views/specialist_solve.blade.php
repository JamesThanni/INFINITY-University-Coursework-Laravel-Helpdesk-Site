
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

                <div class="content-box">
                    <div class="top-row">
                        <h2>Solution to ticket #101</h2>
                        <h4 class="turquoise">Windows wont boot after installing Intel HD graphics Drivers</h4>
                    </div>

                    <div class="content-box-row">
                        <p>Please input problem details:</p>
                    </div>
                    <div class="content-box-row">
                        <form class="content-form" action="">
                            <div class="form-row">
                                <div class="form-input textarea-input">
                                    {{-- <label>Description of problem</label> --}}
                                    <input type="textarea" placeholder="Solution Name">
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="form-input textarea-input">
                                    {{-- <label>Description of problem</label> --}}
                                    <input type="textarea" placeholder="Description">
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
                            <div class="form-row">
                                <button style="width: 100%" type="submit">Submit</button>
                            </div>   
                        </form>
                    </div>
                </div>

            </div>
        
        </div>

        @endsection
