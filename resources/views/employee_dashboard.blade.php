<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Employee Dashboard</title>
    <style>

     /* https://codepen.io/GhostRider/pen/GHaFw */

    .scroll {
        overflow-y: scroll;
        overflow-x: hidden;
    }

    .scroll::-webkit-scrollbar-track
    {
        border: 1px solid #161616;
        background-color: #F5F5F5;
    }

    .scroll::-webkit-scrollbar
    {
        width: 10px;
        background-color: #F5F5F5;
    }

    .scroll::-webkit-scrollbar-thumb
    {
        background-color:  #03fcb1;	
    }

    /* blue: 4CECFF
    black: 161616
    grey: 1C1C1C */

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    h1, h2, h3, h4, h5, p, a, input, select, table, button, textarea, label {
        font-family: Arial, Helvetica, sans-serif;  
        color: white;
        font-weight: 100;
    }

    h3, h4, h5, p, a, input {
        font-weight: 100;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    button {
        color: #161616;
        background: #03fcb1;
        outline: none;
        border: none;
        padding: .5em 1em;
        border-radius: 2.5px;
    }

    input, select {
        background: #161616;
        color: grey;
        outline: none;
        border: none;
        border-radius: 2.5px;
        padding: .5em 1.5em;
        min-width: 40%;
    }

    .wrapper {
        display: grid;
        grid-template-areas:
        "top-nav top-nav"
        "side-nav main-content";
        grid-template-rows: 1fr 5fr;
        grid-template-columns: 1fr 5fr;

        width: 100vw;
        height: 100vh;

        background: #161616;
    }

    #top-nav {
        grid-area: top-nav;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 3vw;
    }

    #top-nav .left {
        display: flex;
    }

    .logo {
        display: flex;
        flex-direction: row;
        font-size: 10px;
        align-items: center;
    }

    .logo i {
        margin: 0 .75em 0 0;
        font-size: 35px;
        color: #4CECFF;
    }

    #top-nav .right {
        display: flex;
        align-items: center;
    }

    #top-nav .right .nav-item {
        padding: 0 2em;
        font-size: 16px;
    }

    #side-nav {
        grid-area: side-nav;
        display: flex;
        flex-direction: column;
        padding: 0 0 0 3vw;
    }

    #side-nav .side-nav-item {
        display: flex;
        flex-direction: row;
        margin-bottom: 2em;
    }

    .side-nav-item i {
        margin: 0 .75em 0 0;
        color: #03fcb1;
    }

    .side-nav-item h3 {
        font-size: 16px;
        opacity: .5;
    }

    #main-content {
        grid-area: main-content;
        padding: 0 3vw 0 0;
        flex-direction: column;
        overflow-y: scroll;
        overflow-x: hidden;
    }

    .content-row {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin-bottom: 2em;
        align-items: center;
    }

    .content-row h1 {
        font-size: 3.5em;
    }

    .top-row h2 {
        text-transform: uppercase;
        font-weight: bold;
    }

    .content-row .stat-box {
        display: flex;
        background: #1C1C1C;
        border-radius: 5px;
        padding: 2em;
        flex-direction: column;
        align-items: center;
    }

    .stat-box p {
        margin-bottom: 1em;
    }

    .stat-box h3 {
        font-size: 50px;
    }

    .content-row .content-box {
        display: flex;
        background: #1C1C1C;
        border-radius: 5px;
        padding: 2em;
        flex-direction: column;
        width: 100%;
    }

    .content-box .top-row {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin-bottom: 2em;
    }

    .content-box .content-box-row {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin-bottom: 2em;
    }

    .content-box-row p {
        font-weight: bold;
    }
    
    .content-form {
        width: 100%;
    }

    .content-form .form-row {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin-bottom: 1em;
    }

    .form-row .form-input {
        display: flex;
        flex-direction: column;
        min-width: 40%;
    }

    .textarea-input {
        width: 100%;
    }

    .textarea-input input {
        height: 100px;
    }

    .form-input label {
        font-size: 14px;
        margin-bottom: .5em;
        /* font-weight: 600; */
        /* color: #03fcb1; */
        /* text-transform: uppercase; */
    }

    @media (max-width: 1200px) {
        .wrapper {
            grid-template-areas:
            "top-nav"
            "side-nav"
            "main-content";
            grid-template-rows: 1fr 1fr 6fr;
            grid-template-columns: 1fr;
        }

        #top-nav {
            margin: 2em;
        }

        #side-nav {
            flex-direction: row;
            justify-content: space-between;
            background: #1c1c1c;
            padding: 0 3vw;
            margin-bottom: 2em;
        }

        #side-nav .side-nav-item {
            margin: 0;
            align-items: center;
            padding: 1em;
        }

        #main-content {
            padding: 0 2vw;
        }
    }

    </style>
</head>
<body>
    
    <div class="wrapper">
        <nav id="top-nav">
            <div class="left">
                <div class="logo">
                    <i class="fa fa-list"></i>
                    <h2>Make-It-All<br/>Helpdesk</h2>
                </div>
            </div>
            <div class="right">
                <h3 class="nav-item">Dashboard</h3>
                <h3 class="nav-item">FAQ</h3>
                <h3 class="nav-item">Log Book</h3>
                <h3 class="nav-item">Log Out</h3>
            </div>
        </nav>
        <nav id="side-nav">
            <div class="side-nav-item">
                <i class="fa fa-list"></i>
                <h3>Submit Ticket</h3>
            </div>
            <div class="side-nav-item">
                <i class="fa fa-list"></i>
                <h3>Log a Call</h3>
            </div>
            <div class="side-nav-item">
                <i class="fa fa-list"></i>
                <h3>Add to FAQ</h3>
            </div>
            <div class="side-nav-item">
                <i class="fa fa-list"></i>
                <h3>Dummy Option</h3>
            </div>
        </nav>
        <div id="main-content" class="scroll">
            <div class="content-row">

                <h1>Big Chungus</h1>

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
                        <h2>New Ticket</h2>
                        <button>Submit ticket</button>
                    </div>

                    <div class="content-box-row">
                        <p>Please input problem details:</p>
                    </div>
                    <div class="content-box-row">
                        <form class="content-form" action="">
                            <div class="form-row">
                                <div class="form-input date-input">
                                    <label>Date of problem</label>
                                    <input type="date">
                                </div>
                                <div class="form-input time-input">
                                    <label>Date of problem</label>
                                    <input type="time">
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="form-input textarea-input">
                                    <label>Description of problem</label>
                                    <input type="textarea">
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="form-input dropdown-input">
                                    <label>Software used</label>
                                    <select name="" id="">
                                        <option value="" disabled selected>Select your software</option>
                                        <option value="">Software 1</option>
                                        <option value="">Software 2</option>
                                        <option value="">Software 3</option>
                                    </select>
                                </div>
                                <div class="form-input dropdown-input">
                                    <label>Operating system</label>
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
                                    <label>Problem type</label>
                                    <select name="" id="">
                                        <option value="" disabled selected>Select your problem type</option>
                                        <option value="">Problem Type 1</option>
                                        <option value="">Problem Type 2</option>
                                        <option value="">Problem Type 3</option>
                                    </select>
                                </div>
                                <div class="form-input dropdown-input">
                                    <label>Priority</label>
                                    <select name="" id="">
                                        <option value="" disabled selected>Select your priority</option>
                                        <option value="">Priority 1</option>
                                        <option value="">Priority 2</option>
                                        <option value="">Priority 3</option>
                                    </select>
                                </div>
                            </div>    
                        </form>
                    </div>
                </div>

            </div>

            <div class="content-row">
                <div class="content-box">
                    <div class="top-row">
                        <h2>Call Logs</h2>
                    </div>
                    <div class="content-box-row">
                    
                    </div>
                </div>
            </div>
        
        </div>
    </div>

</body>
</html>