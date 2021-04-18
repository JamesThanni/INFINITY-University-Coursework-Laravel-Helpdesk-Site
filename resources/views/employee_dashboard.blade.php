<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Employee Dashboard</title>
    <style>

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
        <div id="main-content">
        
        </div>
    </div>

</body>
</html>