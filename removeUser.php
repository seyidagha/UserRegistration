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


    //DELETE PERSON
    $id = $_POST['id'];
    $sql = "DELETE FROM user WHERE id = '$id' ";
    //echo $sql . "<br>";
    if ($conn->query($sql) === TRUE) {
    echo "OK";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
           
    $conn->close();

?>
