<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Make-It-All Helpdesk</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap');
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
        font-family: 'Nunito Sans', sans-serif;
    }

    h1, h2, h3, h4, h5, p, a, input, select, table, button, textarea, label {
        font-family: 'Nunito Sans', sans-serif;
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

    .no-style {
        all: unset;
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

    .turquoise {
        color: #03fcb1 !important;
    }

    .green {
        color: #74FB56 !important;
    }

    .red {
        color: #F50000 !important;
    }

    .blue {
        color: #03DBDA !important;
    }

    .yellow {
        color: #FFD800 !important;
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
        align-items:stretch;
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
        /* min-height: 400px; */
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

    .employee-faq {
        overflow-y: scroll;
        max-height: 150px;
    }

    .employee-faq::-webkit-scrollbar-track
    {
        border: 1px solid #161616;
        background-color: #F5F5F5;
    }

    .employee-faq::-webkit-scrollbar
    {
        width: 10px;
        background-color: #F5F5F5;
    }

    .employee-faq::-webkit-scrollbar-thumb
    {
        background-color:  #03fcb1;
    }


    .faq-box-row {
        display: flex;
        flex-direction: column;
        margin-bottom: .5em;
        border-radius: 2.5px;
        background:#161616;
        padding:1.5em 1em;
    }

    .faq-box-row h4 {
        font-weight: bold;
    }

    #divided-content {
        background-color: #161616;
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
        min-width: 50%;
        padding-right: 1em;
    }

    .checkbox-input {
        align-items: flex-start;
    }

    .faq-checkbox-input {
        align-items: center;
        flex-direction: row !important;

    }

    .button-input {
        justify-content: flex-end;
    }

    .checkbox-input input {
        min-width: 0;
        outline: 2px solid black;
        
    }

    .faq-checkbox-input label {
        order: 2;
        margin-left: 1em;
        margin-bottom: 0 !important;
    }

    .faq-checkbox-input input {
        min-width: 0;
        outline: 2px solid black;
        order: 1;
    }

    .form-row .form-input:nth-last-child(1) {
        padding: 0;
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

    .table {
        width: 100%;
        overflow-y: scroll;
        max-height: 600px;
        border-collapse: collapse;
        cursor: pointer;
    }

    .hardware-table {
        max-height: 250px !important;
    }

    .table, .table tbody, .table thead {
        display: block;
    }

    .table tr {
        display: flex;
        justify-content: space-between;
        padding: 0 .5em;
    }

    .table tbody tr:nth-child(odd) {
        background: #161616;
    }

    .table td {
        padding: 20px 10px;
        width: 100%;
        font-size: 12px;
        opacity: .75;
        display: flex;
    }

    .table td i {
        margin-right: 1em;
        font-size: 20px;
    }

    .table td:first-child {
        padding: 20px 0;
    }

    .table th {
        text-align: left;
        text-transform: uppercase;
        font-weight: 100;
        padding: 10px 0;
        width: 100%;
    }

    .login-box-container {
        width: 50vw;
        height: 50vh;
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-direction: column;
        background:#252525;
        position: absolute;
        left: 50%; top: 50%; transform: translate(-50%, -50%);
        padding: 1em;
    }

    .login-box-container form {
        display: flex;
        flex-direction: column;
    }

    .login-box-container input  {
        margin-bottom: 1em;
    }


    .links {
        display: flex;
        flex-direction: row;
    }

    .links > * {
        margin-left: 1em;
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

        .content-form .form-row {
            flex-direction: column;
            margin: 0;
        }

        .form-input {
            padding: 1em 0em !important;
        }
    }

    </style>
</head>
<body>
    <!--
    <p>User ID: {{ (session('userID')) }}</p>-->
    @yield('page-content')

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        // https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_filter_table
        function searchTable(e, index, table, input) {
            var filter, tr, td, i, txtValue;
            filter = input.value.toUpperCase();
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[index];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }
            }
        }

        function searchHardwareTable(e, index) {
            var input = e.target;
            var table = input.parentNode.parentNode.nextElementSibling.children[0];
            searchTable(e, index, table, input);
        }

        function searchEmployeeTicketsTable(e, index) {
            var input = e.target;
            var table = input.parentNode.parentNode.nextElementSibling.children[0];
            searchTable(e, index, table, input);
        }

        function submitFunc() {
            var checkbox = document.querySelector('#faq-checkbox')
            
            if(checkbox.checked) {
                return confirm('Are you sure you want to submit this ticket?')
            } else {
                alert('Confirm you have read');
                return false
            }
        }

        function loginValidation() {
            var emailInput = document.querySelector("#email");
            var passwordInput = document.querySelector("#password");

            // check if empty
            if (emailInput.value == "" || passwordInput.value == "") {
                alert("Email or password is blank");
                return false;
            }
          
        }
        
        // Code for graphs i   n analyst page //
        
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(compareQueryStatuses);
        google.charts.setOnLoadCallback(showEquipmentStats);
        google.charts.setOnLoadCallback(compareTodayYesterday);
        google.charts.setOnLoadCallback(averageTicketCompletionTime);
        // Replace with function that calls all the graph functions at once

        function showEquipmentStats(){
            // Shows the most faulty software in a bar chart then places the graph
            // inside a div on the analyst page
            var data = google.visualization.arrayToDataTable([
                ['Software', 'Number of queries in the last week'],
                ['Microsoft Word', 10],
                ['Microsoft Excel', 8],
                ['Microsoft Powerpoint', 5],
                ['PhpStorm', 2,],
                ['Microsoft Teams', 19],
            ]);

            var options = {
                'hAxis': {
                    'title': 'Software',
                    'titleTextStyle': {
                        'color': '#FFFFFF',
                        'fontSize': 20,
                        'fontName': 'Arial',
                        'italic': false
                    },
                    'textStyle': {
                        color: '#FFFFFF'
                    },
                },
                'vAxis': {
                    'title': 'Number of queries',
                    'titleTextStyle': {
                        'color': '#FFFFFF',
                        'fontSize': 20,
                        'fontName': 'Arial',
                        'italic': false
                    },
                    'textStyle': {
                        color: '#FFFFFF'
                    },
                },
                'colors' : ['#4CECFF'],
                'width':'75%',
                'height':500,
                'backgroundColor': '#1C1C1C',
                'bar': {
                    'groupWidth': "70%"
                }
            }

            chart = new google.visualization.BarChart(document.getElementById('most-faulty-software'));
            chart.draw(data, options);
        }

        function compareQueryStatuses() {
            // Used to show how many problems have been solved, are still
            // waiting assignment or waiting for a solution from a specialist
            // in a pie chart
            var data = google.visualization.arrayToDataTable([
                ['Status', 'Number'],
                ['Solved', 24],
                ['Pending', 30],
                ['Unsolved', 16],
            ]);

            // Set chart options
            var options = {'text':['Status of queries', 'In the last week'],
                'subtitle':'In the last week',
                'colors': ['#A7FD91', '#FFF385', '#FA7577'],
                'backgroundColor': '#1C1C1C',
                'width':'75%',
                'height':'100%',
                'legend': 'none',
            };

            // Will instantiate the chart
            chart = new google.visualization.PieChart(document.getElementById('live-problem-status'));
            // Draws the graph while passing in the options
            chart.draw(data, options);
        }

        function compareTodayYesterday() {
            // Used to show the number of queries solved by analysts on
            // the current day compared to the number solved yesterday
            var data = google.visualization.arrayToDataTable([
                ['Days', 'Number'],
                ['17/05', 24],
                ['18/05', 30],
            ]);

            // Set chart options
            var options = {
                'hAxis': {
                    'title': 'Days',
                    'titleTextStyle': {
                        'color': '#FFFFFF',
                        'fontSize': 20,
                        'fontName': 'Arial',
                        'italic': false
                    },
                    'textStyle': {
                        color: '#FFFFFF'
                    },
                },
                'vAxis': {
                    'title': 'Number of solved queries',
                    'titleTextStyle': {
                        'color': '#FFFFFF',
                        'fontSize': 20,
                        'fontName': 'Arial',
                        'italic': false,
                    },
                    'textStyle': {
                        color: '#FFFFFF'
                    },
                    'minValue': 0
                },
                'colors' : ['#A7FD91'],
                'width':'80%',
                'height':'80%',
                'backgroundColor': '#1C1C1C',
                'bar': {
                    'groupWidth': "70%"
                }
            }

            chart = new google.visualization.ColumnChart(document.getElementById('today-vs-yesterday'));
            chart.draw(data, options);
        }
        
        function averageTicketCompletionTime(){
					// Shows the average time taken by each specialist to
					// complete a ticket compared to the average time
					var data = google.visualization.arrayToDataTable([
						['Specialists', 'Average time to solve a ticket (hours)'],
						['Average', 6.5],
						['1 - Grayson', 4.3],
						['3 - Doe', 7.0],
						['458271 - Thatcher', 9.1],
						['432897 - Mann', 8.2],
						['573828 - Sato', 4.8],
						['98491 - Heria', 5.6]
					]);
					var options = {
						'legend': 'none',
						'hAxis': {
							'title': 'Average time to solve a ticket (hours)',
							'titleTextStyle': {
								'color': '#FFFFFF',
								'fontSize': 20,
								'fontName': 'Arial',
								'italic': false
							},
							'textStyle': {
								color: '#FFFFFF'
							},
						},
						'vAxis': {
							'title': 'Specialists',
							'titleTextStyle': {
								'color': '#FFFFFF',
								'fontSize': 20,
								'fontName': 'Arial',
								'italic': false
							},
							'textStyle': {
								color: '#FFFFFF'
							},
						},
						'colors' : ['#4CECFF'],
						'width':'75%',
						'height':500,
						'backgroundColor': '#1C1C1C',
						'bar': {
							'groupWidth': "70%"
						}
					}
					chart = new google.visualization.BarChart(document.getElementById('solving-tickets'));
					chart.draw(data, options);
				}

    </script>

</body>
</html>
