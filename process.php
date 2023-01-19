<?php
session_start();
	include('db.php'); 
   
    // if(isset($_POST["login"])) 
    $UName = $_POST['username'];
    $Password = $_POST['Password'];

    $sql = "SELECT * FROM users WHERE  Password = '$Password' AND UName = '$UName'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) 
      {
        $_SESSION['UName'] = $UName;
        
        header("location: index.php");
      }
    } else {
        // echo "invalid credentials";
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    $conn->close();

