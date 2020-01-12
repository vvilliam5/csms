<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
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
        <div class="container-fluid">
        <?php
                include 'headerfile.php';
                headerText();
                restrict(3);
            ?>
        </div>
        <div class="container py-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="adminpanel.php">Admin Panel</a></li>
                      <li class="breadcrumb-item active">New User</li>
                    </ol>
                </nav>
            </div>
            <div class="container">
                <h1>Add New User/Admin</h1>
            </div>
            <div class="container">
                <?php
                require_once 'login.php';
                $conn = new mysqli($hn, $un, $pw, $db);
                if ($conn->connect_error) die($conn->connect_error);

                $u_input;
                $p_input;
                $p_level;
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $u_input = test_input($_POST['uname']);
                    $p_input = test_input($_POST['pword']);
                    $p_level = test_input($_POST['level']);
                    $hash = password_hash($p_input, PASSWORD_DEFAULT);
                    $query = "INSERT INTO users (`uname`, `pword`, `level`) VALUES('$u_input', '$hash', $p_level)";
                    $result = $conn->query($query);
                    if(!$result) die($conn->error);
                    elseif($result){
                        echo "<h2 class='text-center text-success'>" . $u_input .  " has been created successfully with password " . $p_input . "</h2>";
                    }


                }
                function test_input($data) {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }
            ?>
                <?php if (empty($u_input)){ ?><form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
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
                                        <label for="levell">Level: </label>
                                        <select class="form-control" id="levell" name="level">
                                              <option value="1">Guest</option>
                                              <option value="2">Member</option>
                                              <option value="3">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row py-2">
                                    <div class="col-sm">
                                        <button type="submit" class="btn btn-danger w-100">CREATE USER</button>
                                    </div>
                                </div>
                           </div>
                        </div>
                </form>
                <?php } ?>
            </div>
        <nav class="navbar navbar-expand-sm bg-light navbar-dark shadow-sm border ">
                <p class="mx-auto">© Copyright 2018. Head Of Service, Anambra State Government.</p>
        </nav>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    </body>
</html>
