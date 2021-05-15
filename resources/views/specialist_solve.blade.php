
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
                        <h2>Solution to ticket #{{ $ticketID }}</h2>
                        <h4 class="turquoise">{{  $desc }}</h4>
                    </div>

                    <div class="content-box-row">
                        <p>Input Solution Below:</p>
                    </div>
                    <div class="content-box-row">
                        <form class="content-form" method="post" action="/specialist/solve/submit">
                            @csrf

                            <div class="form-row">
                                <div class="form-input textarea-input">
                                    {{-- <label>Description of problem</label> --}}
                                    <input type="textarea" name="solution" value={{ $solution }} placeholder="Problem solution">
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="form-input textarea-input">
                                    {{-- <label>Description of problem</label> --}}
                                    <input type="textarea" value="{{ $desc }}" placeholder="Problem description" disabled />
                                    <input type="textarea" value="{{ $desc }}" name="description" placeholder="Problem description" hidden />
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="form-input text-input">
                                    <label>Software used</label>
                                    <input type="text" value="{{ $softName }}" disabled/>
                                </div>
                                <div class="form-input text-input">
                                    <label>Operating system</label>
                                    <input type="text" value="{{ $osVersion }}" disabled/>
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="form-input text-input">
                                    <label>Hardware</label>
                                    <input type="text" value="{{ $hardType }}" disabled/>
                                </div>
                                <div class="form-input faq-checkbox-input">
                                    <label>Add this solution to FAQs</label>
                                    <input type="checkbox" name="add-to-faq">
                                </div>
                            </div>    
                            <div class="form-row">
                                <input type="text" value="{{ $ticketID }}" name="ticketID" hidden/>
                                <button style="width: 100%" type="submit">Submit</button>
                            </div>   
                        </form>
                    </div>
                </div>

            </div>
        
        </div>

        @endsection
