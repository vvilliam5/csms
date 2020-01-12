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
                require_once 'login.php';
                $conn = new mysqli($hn, $un, $pw, $db);
                if ($conn->connect_error) die($conn->connect_error);
            ?>
        </div>
        <div class="container py-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="adminpanel.php">Admin Panel</a></li>
                      <li class="breadcrumb-item active">Activity Log</li>
                    </ol>
                </nav>
            </div>
            <div class="container">
                <h1>User's Activity Log</h1>
            </div>
            <div class="container" style="font-size:x-small">
                <table class="table table-hover table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Activity</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <?php
                        $query = "SELECT * FROM activity ORDER BY time DESC";
                        $result = $conn->query($query);
                        if(!$result) die($conn->error);
                        
                        $rows = $result->num_rows;
                        
                        for ($j = 0; $j < $rows; ++$j){
                            $result->data_seek($j);
                            $rows = $result->fetch_array(MYSQLI_ASSOC);
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $rows['user'];   ?></td>
                            <td><?php echo $rows['action']   ?></td>
                            <td><?php echo $rows['time']   ?></td>
                        </tr>
                    </tbody>
                    <?php 
                        }
                        $result->close();
                        $conn->close();
                    ?>
                </table>
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
