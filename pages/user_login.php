<?php
    session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <!-- Raleway Font -->
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <!-- Montesarrat Font -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <style>
            h1{
                font-family: raleway;
            }
            h3{
                font-family: raleway;
            }
            p{
                font-family: montserrat;
            }
        </style>
    </head>
    <body>
        <?php
            require_once 'login.php';
            $conn = new mysqli($hn, $un, $pw, $db);
            if ($conn->connect_error) die($conn->connect_error);
            
            $d_user;
            $d_pw;
            $d_level;
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $u_input = test_input($_POST['uname']);
                $p_input = test_input($_POST['pword']);
                $query = "SELECT * FROM users WHERE uname='$u_input'";
                $result = $conn->query($query);
                if(!$result) die($conn->error);
                elseif($result){
                    $rows = $result->num_rows;

                    $rows = $result->fetch_array(MYSQLI_ASSOC);
                    $d_user = $rows['uname'];
                    $d_pw = $rows['pword'];
                    $d_level = $rows['level'];
                    echo $d_level . $d_pw;
                    if(password_verify($p_input, $d_pw)){
                        $_SESSION['name'] = $u_input;
                        $_SESSION['level'] = $d_level;
                        //add to acitivity table
                        date_default_timezone_set('Africa/Lagos');
                        $time = date("Y-m-d H:i:s", time());
                        $query = "INSERT INTO activity (`user`, `action`, `time`) VALUES('$u_input', 'logged in', '$time')";
                        $result = $conn->query($query);
                        if(!$result) die($conn->error);
                        
                        header('Location: http://localhost/CSMS/index.php');
                        exit();
                    }
                    else{
                        echo "<script> alert('Incorrect username/password, try again') </script>";
                        date_default_timezone_set('Africa/Lagos');
                        $time = date("Y-m-d H:i:s", time());
                        $query = "INSERT INTO activity (`user`, `action`, `time`) VALUES('$u_input', 'failed log in attempt', '$time')";
                        $result = $conn->query($query);
                        if(!$result) die($conn->error);
                    }
                }
                
                
            }
            function test_input($data) {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
        ?>
        
        <div class="container p-5 my-5 shadow border">
            <div class="row">
                <div class="col-sm text-center">
                    <img src='../pics/anambralogo.png' alt='Anambra State'>
                </div>
                <div class="col-sm border rounded py-3">
                    <div class="container">
                        <h2>Log In</h2>
                    </div>
                    <?php 
                     ?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <div class="form-group">
                            <div class="container">
                                <div class="form-row py-2">
                                    <div class="col-sm">
                                        <label for="unamel">Username:</label>
                                        <input type="text" class="form-control" id="unamel" name="uname" required="required">
                                    </div>
                                </div>
                                <div class="form-row py-2">
                                    <div class="col-sm">
                                        <label for="pwordl">Password:</label>
                                        <input type="password" class="form-control" id="pwordl" name="pword" required="required">
                                    </div>
                                </div>
                                <div class="form-row py-2">
                                    <div class="col-sm">
                                        <button type="submit" class="btn btn-danger w-100">Login</button>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </form>
                    
                </div>
            </div>
            
        </div>
            <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>
