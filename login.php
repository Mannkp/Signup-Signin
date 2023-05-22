<?php
    $servername = "localhost:3310";
    $username = "root";
    $password = "";
    $finalPassword = '';
    $conn = mysqli_connect($servername , $username , $password);
    if (!$conn) {
        die("connection failed!<br>" . mysqli_connect_error());
       } 
       echo "<br>connected successfully";
       $sql1 = "USE wp_login";
       mysqli_query($conn, $sql1);
       echo "<br>db wp_login is used";


    if(isset($_POST["login"])){
        echo "<br>received form info";
        if(isset($_POST["name"]) && isset($_POST['paswd'])){
            $uname = $_POST["name"];
            echo "<br>uname received from form: {$uname}";
            $upaswd = $_POST['paswd'];
            echo "<br>password received from form: {$upaswd}";
            // INSERT INTO `user_info` (`username`, `password`) VALUES ('admin', 'admin123');
            $db_passwd = mysqli_query($conn,"SELECT password FROM user_info WHERE username = '$uname';");
            if($row = mysqli_fetch_array($db_passwd)){
                $finalPassword = $row['password'];
                echo "<br><br>fetched passwd: {$finalPassword}";
            }
            if(isset($finalPassword)){
                if($upaswd == $finalPassword){
                    echo "<br><hr><h2>passwd: {$finalPassword} is correct</h2><hr><br>";
                    // header("Location: /mann/wpProject/success.html");
                }
                else{
                    echo("<br><h2>invalid username / password!</h2><br>");
                }
            }
        }
        else{
            echo "<br><h2>Enter proper Username / Password!</h2>";
        }
    }
    else{
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
                    if($db_passwd2 === false) {
                        die("Database query failed");
                    } else {
                        // use mysqli_fetch_row() here.
                        if($row1 = mysqli_fetch_array($db_passwd2)){
                            $finalPassword1 = $row1['password'];
                            echo "<br><br>fetched passwd: {$finalPassword1}";
                            echo "<br><h2>Account Created Successfully<br>Now please login</h2>";
                        }
                    }
                }
                // header("Location: /mann/wpProject/login.html");    
                }
        }
    }
    
?>
<!-- INSERT INTO `userifo` (`UserName`, `password`) VALUES ('admin', 'admin'); -->