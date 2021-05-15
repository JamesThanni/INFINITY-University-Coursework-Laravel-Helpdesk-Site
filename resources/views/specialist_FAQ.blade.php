
        @extends('specialist_page')

        @section('specialist-page-content')
            
        <nav id="side-nav">
            <div class="side-nav-item">
                <i class="fa fa-list"></i>
                <h3>Sort by Type</h3>
            </div>
            <div class="side-nav-item">
                <i class="fa fa-list"></i>
                <h3>Sort by Most Recent</h3>
            </div>
        </nav>

        <div id="main-content" class="scroll">
            <div class="content-row">
                <h1>FAQ</h1>
            </div>
            <div class="content-row">
            
                <div class="content-box">
                    <div class="top-row">
                        <h3>Find common problems</h3>
                    </div>

                    
                    
                        @foreach ($faq as $commonSolution)
                        <div class="faq-box-row">
                            <h4 class="turquoise">{{$commonSolution->problem}}</h4>
                            <p>{{$commonSolution->solution}}</p>
                        </div>
                        @endforeach
                        
                   
                </div>

            </div>
        <!--
            <div class="content-row">

                
            </div>
  
            
            <div class="content-row">
                <div class="context-box">
                    <div class="top-row">
                        
                    </div>
                    
                    <div class="content-box-row">
                    @foreach ($faq as $commonSolution)
                        
                        <h4 class="turquoise">{{$commonSolution->problem}}</h4>
                        <p>{{$commonSolution->solution}}</p>
                    
                    
                    @endforeach
                    </div>
                        
                </div>
            </div>
        -->
        </div>
        

        @endsection
