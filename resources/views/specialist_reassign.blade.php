
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
                        <h2>Reassign ticket #{{ $ticketID }}</h2>
                        <h4 class="turquoise">{{  $desc }}</h4>
                    </div>

                    <div class="content-box-row">
                        <p>Choose the specialist to assign to:</p>
                    </div>
                    <div class="content-box-row">
                        <form class="content-form" action="">
                            <div class="form-row">
                                <div class="form-input dropdown-input">
                                    {{-- <label>Priority</label> --}}
                                    <select name="" id="">
                                        <option value="" disabled selected>Select a specialist</option>
                                        <option value="">Priority 1</option>
                                        <option value="">Priority 2</option>
                                        <option value="">Priority 3</option>
                                    </select>
                                </div>
                                <button style="width: 100%" type="submit">Submit</button>
                            </div>    
                        </form>
                    </div>
                </div>

            </div>
        
        </div>

        @endsection
