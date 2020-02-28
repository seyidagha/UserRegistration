<html>

<head>
    <title>
        Users Page
    </title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <style>
        body {
            background-image: url(bg.jpg);
            background-size: cover;
        }

        img {
            width: 100%;

        }

        #users>div {
            margin: 20px;
            background-color: #e9ecef;
            padding: 10px;
            width: 200px;
            text-align: center;
            font-size: 18px;
            font-style: oblique;
        }

        #search {
            margin-top: 40px;
        }

        .jumbotron {
            padding: 30px;
        }

    </style>
</head>

<body>
    <div class="">
        <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">Users App</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="register.html">Registration Page </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="users.php">Users Page<span class="sr-only">(current)</span></a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>
    <div class="container jumbotron text-center">
        <div class="h2 display-2">All Users List</div>
        <label for="search">Filter By Name:</label>
        <input id="search" name="search" type="text" placeholder="search name" onkeyup="filterUsers()">
    </div>

    <div class="container">
        <div style="display:flex; flex-wrap:wrap" id="users">
        </div>

    </div>

    <script>
        window.onload = function() {
            var req = new XMLHttpRequest();
            req.open("POST", "allUsers.php", true);
            req.setRequestHeader("Content-type", "application/json");
            req.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    var resp = JSON.parse(this.responseText);

                    //                    var p = document.createElement("p");
                    for (var i = 0; i < resp.length; i++) {
                        var p1 = document.createElement("p");
                        p1.appendChild(document.createTextNode("ID: " + resp[i][0]));

                        var p2 = document.createElement("p");
                        p2.appendChild(document.createTextNode("Name: " + resp[i][1]));
                        var p3 = document.createElement("p");
                        p3.appendChild(document.createTextNode("Email: " + resp[i][2]));
                        var p4 = document.createElement("p");
                        p4.appendChild(document.createTextNode("Phone: " + resp[i][3]));
                        var p5 = document.createElement("p");
                        p5.appendChild(document.createTextNode("Job Title: " + resp[i][4]));
                        var p6 = document.createElement("p");
                        var img = document.createElement("img");
                        if (resp[i][6] == "")
                            resp[i][6] = "anonim.png";
                        img.setAttribute("src", "upload/" + resp[i][6]);
                        p6.appendChild(document.createTextNode("Image: "));
                        var p7 = document.createElement("p");
                        p7.appendChild(img);
                        var div = document.createElement("div");
                        div.appendChild(p1);
                        div.appendChild(p2);
                        div.appendChild(p3);
                        div.appendChild(p4);
                        div.appendChild(p5);
                        div.appendChild(p6);
                        div.appendChild(p7);
                        div.setAttribute("id", resp[i][0]);
                        var button = document.createElement("input");
                        button.setAttribute("id", "button");
                        button.setAttribute("type", "button");
                        button.setAttribute("value", "Remove User");
                        button.setAttribute("onclick", "removeUser(" + resp[i][0] + ")");
                        div.appendChild(button);
                        document.getElementById("users").appendChild(div);
                    }

                    console.log(this.responseText);
                }
            }
            req.send();
        }

        function removeUser(id) {
            var ok = confirm("Silinsin ?");
            if (ok) {
                var req = new XMLHttpRequest();
                req.open("POST", "removeUser.php", true);
                req.setRequestHeader("Content-type", "application/json");
                req.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        //var resp = JSON.parse(this.responseText);
                        console.log(this.responseText);
                        if (this.responseText == "OK") {
                            var elem = document.getElementById(id);
                            elem.parentNode.removeChild(elem);
                        }
                    }

                }
                req.send(JSON.stringify({
                    'id': id
                }));
            }
        }

        function filterUsers() {
            var key = document.getElementById("search").value;
            var req = new XMLHttpRequest();
            req.open("POST", "filterUsers.php", true);
            req.setRequestHeader("Content-type", "application/json");
            req.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    var resp = JSON.parse(this.responseText);

                    //                    var p = document.createElement("p");
                    document.getElementById("users").innerHTML = '';
                    for (var i = 0; i < resp.length; i++) {
                        var p1 = document.createElement("p");
                        p1.appendChild(document.createTextNode("ID: " + resp[i][0]));

                        var p2 = document.createElement("p");
                        p2.appendChild(document.createTextNode("Name: " + resp[i][1]));
                        var p3 = document.createElement("p");
                        p3.appendChild(document.createTextNode("Email: " + resp[i][2]));
                        var p4 = document.createElement("p");
                        p4.appendChild(document.createTextNode("Phone: " + resp[i][3]));
                        var p5 = document.createElement("p");
                        p5.appendChild(document.createTextNode("Job Title: " + resp[i][4]));
                        var p6 = document.createElement("p");
                        var img = document.createElement("img");
                        if (resp[i][6] == "")
                            resp[i][6] = "anonim.png";
                        img.setAttribute("src", "upload/" + resp[i][6]);
                        p6.appendChild(document.createTextNode("Image: "));
                        var p7 = document.createElement("p");
                        p7.appendChild(img);
                        var div = document.createElement("div");
                        div.appendChild(p1);
                        div.appendChild(p2);
                        div.appendChild(p3);
                        div.appendChild(p4);
                        div.appendChild(p5);
                        div.appendChild(p6);
                        div.appendChild(p7);
                        div.setAttribute("id", resp[i][0]);
                        var button = document.createElement("input");
                        button.setAttribute("id", "button");
                        button.setAttribute("type", "button");
                        button.setAttribute("value", "Remove User");
                        button.setAttribute("onclick", "removeUser(" + resp[i][0] + ")");
                        div.appendChild(button);
                        document.getElementById("users").appendChild(div);
                    }

                    console.log(this.responseText);
                }
            }
            req.send(JSON.stringify({
                'name': key
            }));

        }

    </script>
</body>


</html>
