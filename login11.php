<?php

$servername = "localhost:3310";
    $username = "root";
    $password = "";
    $finalPassword1 = '';
    $conn = mysqli_connect($servername , $username , $password);
    if (!$conn) {
        die("connection failed!<br>" . mysqli_connect_error());
       } 
       echo "<br>connected successfully";
       $sql1 = "USE wp_login";
       mysqli_query($conn, $sql1);
       echo "<br>db wp_login is used";


if(isset($_POST['signup'])){
            echo "<hr><hr><hr>hi";
            // header("Location: /mann/wpProject/signup.html");
            if(isset($_POST["name"]) && isset($_POST['paswd']) && isset($_POST['c_paswd'])){
                $uname = $_POST["name"];
                echo "<br>uname received from form: {$uname}";
                $upaswd = $_POST['paswd'];
                echo "<br>password received from form: {$upaswd}";
                $u_cpaswd = $_POST['c_paswd'];
                echo "<br>c_password received from form: {$u_cpaswd}";
                // INSERT INTO `user_info` (`username`, `password`) VALUES ('admin', 'admin123');

                if($u_cpaswd != $upaswd){
                    echo "<br><h2>password and confirm password doesnot match</h2>";
                }else{
                    echo "what u want";
                    $db_passwd2 = mysqli_query($conn,"INSERT INTO user_info (username, password) VALUES ('$uname', '$upaswd');");
                    if($db_passwd2) {
                        if($row = mysqli_fetch_array($db_passwd2)){
                            $finalPassword1 = $row['password'];
                            echo "<br><br>fetched passwd: {$finalPassword1}";
                            echo "<br><h2>Account Created Successfully<br>Now please login</h2>";
                        }
                    }
                }
                // header("Location: /mann/wpProject/login.html");    
                }
        }
    ?>