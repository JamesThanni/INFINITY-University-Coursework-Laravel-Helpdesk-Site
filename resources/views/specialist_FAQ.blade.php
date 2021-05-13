
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

                <h1>FAQ</h1>

            </div>

            <div class="scroll">
                <div class="content-row">

                    <div class="context-box">
                    
                        <div class="top-row">
                            <h2>Common Problems</h2>
                            <div>
                                <button>Add to FAQ</button>
                            </div>
                        </div>
                        
                        @foreach ($faq as $commonSolution)
                        <div class="context-box-row">
                            <p class="faq-problem" style="color:aquamarine">{{$commonSolution->problem}}</p>
                        </div>
                        <div class="context-box-row">
                            <p class="faq-solution">{{$commonSolution->solution}}</p>
                            <br/>
                        </div>
                        @endforeach
                            
                    </div>
                </div>
            </div>
            @yield('faq-page-content')

        </div>
        

        @endsection
