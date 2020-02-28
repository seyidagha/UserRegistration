<?php
        $rest_json = file_get_contents("php://input");
        $_POST = json_decode($rest_json, true);

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
        //Select all users
        $sql = "SELECT * from user";
        $result = $conn->query($sql);
        echo json_encode ($result->fetch_all());
//            echo $_FILES["fileToUpload"]["tmp_name"]."<br>";
//            echo '<img src="upload/' .$image. '">';
        
 

        $conn->close();
?>
