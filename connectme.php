<?php

$name = filter_input(INPUT_POST,'name');
$email = filter_input(INPUT_POST,'email');
$message = filter_input(INPUT_POST,'message');
if(!empty($name)){
    if(!empty($email)){
        if(!empty($message)){
            $host = 'localhost';
            $dbusername = 'root';
            $dbpassword = '';
            $dbname = 'connect';

            //Create a connection
            $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

            if(mysqli_connect_error()){
                die('Connection Error('.mysqli_connect_errno().')'
                .mysqli_connect_error());
            }
            else{
                $sql = "INSERT INTO portfolio (name, email, message)
                values ('$name','$email','$message')";
                if($conn->query($sql)){
                    header("Location: post.html");
                    exit;
                }
                else{
                    echo "Error: ".$sql ."<br>".$conn->error;
                }
                $conn->close();
            }
        }
        else{
           echo "Error: ".$sql ."<br>".$conn->error;
        }
    }
    else{
       echo "Error: ".$sql ."<br>".$conn->error;
    }
}
else{
   echo "Error: ".$sql ."<br>".$conn->error;
}