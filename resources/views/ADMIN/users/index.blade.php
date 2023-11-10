<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <title>The Avengers Pvt Ltd</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .w3-sidebar a {
            font-family: "Roboto", sans-serif
        }

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .w3-wide {
            font-family: "Montserrat", sans-serif;
        }
    </style>
</head>

<body class="w3-content" style="max-width:1200px">

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
        <div class="w3-container w3-display-container w3-padding-16">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
            <h3 class="w3-wide"><b>Transport Managment System</b></h3>
        </div>
        <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
            <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align"
                id="myBtn">
                Buses <i class="fa fa-caret-down"></i>
            </a>
            <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                <a href="{{ url('/bus') }}" class="w3-bar-item w3-button w3-light-grey"><i
                        class="fa fa-caret-right w3-margin-right"></i> Buses List</a>
                <a href="{{ url('/bus/create') }}" class="w3-bar-item w3-button">Add Buses</a>
            </div>
            <a onclick="myAccFunc2()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align"
                id="myBtn2">
                Routes <i class="fa fa-caret-down"></i>
            </a>
            <div id="demoAcc2" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                <a href="{{ url('/route') }}" class="w3-bar-item w3-button"> Routes List</a>
                <a href="{{ url('/route/create') }}" class="w3-bar-item w3-button">Add Routes</a>
            </div>
            <a href="{{ url('/shedule') }}" class="w3-bar-item w3-button">Shedule</a>
            <a href="{{ url('/bus_shedule') }}" class="w3-bar-item w3-button">Bus Shedule</a>
            <a href="{{ url('/driver') }}" class="w3-bar-item w3-button">Drivers List</a>
            @if (Auth()->user()->user_role == 'admin')
                <a href="{{ url('/users') }}" class="w3-bar-item w3-button">Users List</a>
            @endif
        </div>

    </nav>

    <!-- Top menu on small screens -->
    <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
        <div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i
                class="fa fa-bars"></i></a>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu"
        id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:250px">

        <!-- Push down content on small screens -->
        <div class="w3-hide-large" style="margin-top:83px"></div>

        <!-- Top header -->
        <header class="w3-container w3-xlarge">
            <p class="w3-left">Admin</p>
            <p class="w3-right">
                <a href="/logout"><i class="fa fa-sign-out"></i></a>
            </p>
        </header>



        <!-- Subscribe section -->
        <div class="w3-container w3-gray w3-padding-32">
            <div class="w3-row-padding">
                <div class="w3-col s12">
                    <a href="{{ url('/users/create') }}" class="w3-button w3-green"><em class="fas fa-plus-circle"></em>
                        Add New Users</a>
                    <p> Registered Users</p>
                    <table>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <!-- Footer -->

        <div class="w3-black w3-center w3-padding-24">Transport Managment System</div>

        <!-- End page content -->
    </div>

    <!-- Newsletter Modal -->
    <div id="newsletter" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
            <div class="w3-container w3-white w3-center">
                <i onclick="document.getElementById('newsletter').style.display='none'"
                    class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
                <h2 class="w3-wide">NEWSLETTER</h2>
                <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
                <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
                <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom"
                    onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
            </div>
        </div>
    </div>

    <script>
        // Accordion
        function myAccFunc() {
            var x = document.getElementById("demoAcc");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }

        // Click on the "Jeans" link on page load to open the accordion for demo purposes
        document.getElementById("myBtn").click();


        // Open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
    </script>
    <script>
        // Accordion
        function myAccFunc2() {
            var x = document.getElementById("demoAcc2");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }

        // Click on the "Jeans" link on page load to open the accordion for demo purposes
        document.getElementById("myBtn2").click();


        // Open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
    </script>
</body>

</html>
