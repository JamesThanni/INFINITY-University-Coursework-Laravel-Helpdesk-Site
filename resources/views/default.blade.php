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

    /* https://stackoverflow.com/questions/62162645/change-color-of-chromes-calendar-icon-in-html-date-input */
    ::-webkit-calendar-picker-indicator {
        filter: invert(1);
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
        cursor: pointer;
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

    body {
        background: #161616;
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
        color: #03fcb1;
    }

    #top-nav .right {
        display: flex;
        align-items: center;
    }

    #top-nav .right .nav-item {
        padding: 0 2em;
        font-size: 16px;
    }

    #top-nav .right .fancy-nav-item {
        background: #03fcb1;
        color: black;
        margin: .5em 1em;
        padding: .5em 1em;
        border-radius: 2.5px;
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
        cursor: pointer;
    }

    .side-nav-item i {
        margin: 0 .75em 0 0;
        color: #03fcb1;
    }

    .side-nav-item h3 {
        font-size: 16px;
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
        font-size: 50px;
        color: #03fcb1;
    }

    .top-row h2 {
        text-transform: uppercase;
        font-weight: bold;
    }

    .content-row .stat-box {
        display: flex;
        background: #252525;
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
        background: #252525;
        border-radius: 5px;
        padding: 2em;
        flex-direction: column;
        width: 100%;
        margin: .25em;
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
        min-width: 49%;
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

        .content-row {
            flex-direction: column;
        }
    }

    </style>
</head>
<body>
    
    @yield('page-content')

</body>
</html>