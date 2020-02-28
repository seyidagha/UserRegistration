<html>

<head>
    <title>
        Registration Complete
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
                    <li class="nav-item">
                        <a class="nav-link" href="users.php">Users Page</a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>
    <div class="container jumbotron text-center">
        <div class="h2 display-2">Registration Complete</div>
    </div>

    <?php
        echo "<div class='container'>";
        //Connect to Database
        $servername = "localhost";
        $username = "root";
        $password = "";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        //echo "Connected successfully <br>";
        mysqli_select_db($conn,"finalapp");
        //*****************************
    
    
    
        //Check and Insert New User to Database
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['prefix'].$_POST['phone'];
        $job_title = $_POST['job_title'];
        $password = $_POST['password'];
        //$picture = $_POST['fileToUpload'];
        if ($name != ''){            
            // Get image name
            $image = $_FILES['fileToUpload']['name'];

            // image file directory
            $target_dir = "upload/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                 // Upload file
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_dir.$image);
            $sql = "INSERT INTO user values ('NULL','$name', '$email', '$phone', '$job_title', '$password', '$image')";
            echo "<h4>";
            echo $sql . "<br>";
            if ($conn->query($sql) === TRUE) {
            echo "New record created successfully <br>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    }
            echo "</h4>";
//            echo $_FILES["fileToUpload"]["tmp_name"]."<br>";
//            echo '<img src="upload/' .$image. '">';
        }
 


    
        echo "</div>";
    ?>

    <div class="container jumbotron text-center">
        <div class="h4 display-4"><a href="users.php">Go to All Users Page</a></div>

    </div>


</body>



</html>
