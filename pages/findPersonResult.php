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
        <?php
            require_once 'login.php';
            $conn = new mysqli($hn, $un, $pw, $db);
            if ($conn->connect_error) die($conn->connect_error);
        ?>
            <div class="container-fluid">
                <?php
                include 'headerfile.php';
                headerText();
            ?>
            <div class="container py-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="personnel.php">Personnel</a></li>
                        <li class="breadcrumb-item active" aria-current="page"">Find Personnel</li>
                    </ol>
                </nav>
            </div>
            <div class="container">
                <h1>Find Personnel</h1>
            </div>
                <div class="mx-auto"><h3 class="text-center text-uppercase"></h3></div>
                <div class="container-fluid" style="font-size:xx-small">
                <table class="table table-hover table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Sex</th>
                            <th>SGL</th>
                            <th>Level</th>
                            <th>Date Of Birth</th>
                            <th>Date of 1st App.</th>
                            <th>Date of Confirmed App.</th>
                            <th>Date of Prom. Prior to Present Appt.</th>
                            <th>Date of Present Appt.</th>
                            <th>Qualification</th>
                            <th>LGA</th>
                            <th>Expected Date of Retirement</th>
                            <th>Duty Post</th>
                            <th>Phone</th>
                            <th>Remark</th>
                            <th>Cadre</th>
                            <th>History</th>
                            <th>View</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <?php
                        $mda_find = test_input($_POST['mdas']);
                        $name_find = test_input($_POST['name']);
                        $query_find = "SELECT * FROM $mda_find WHERE name LIKE '%$name_find%'";
                        $result_find = $conn->query($query_find);
                        if(!$result_find) die($conn->error);
                        $rows = $result_find->num_rows;
                        
                        for ($j = 0; $j < $rows; ++$j){
                            $result_find->data_seek($j);
                            $rows = $result_find->fetch_array(MYSQLI_ASSOC);
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $j + 1;?></td>
                            <td><?php echo $rows['name'];   ?></td>
                            <td><?php echo $rows['sex']   ?></td>
                            <td><?php echo $rows['sgl']   ?></td>
                            <td><?php echo $rows['level']   ?></td>
                            <td><?php echo $rows['dob']   ?></td>
                            <td><?php echo $rows['dofa']   ?></td>
                            <td><?php echo $rows['doca']   ?></td>
                            <td><?php echo $rows['dopppa']   ?></td>
                            <td><?php echo $rows['dopa']   ?></td>
                            <td><?php echo $rows['qualification']   ?></td>
                            <td><?php echo $rows['lga']   ?></td>
                            <td><?php echo $rows['edor']   ?></td>
                            <td><?php echo $rows['dp']   ?></td>
                            <td><?php echo $rows['phone']   ?></td>
                            <td><?php echo $rows['remark']   ?></td>
                            <td><?php echo $rows['cadre']   ?></td>
                            <td><?php echo $rows['history']   ?></td>
                            <td><a href="viewperson.php?<?php echo $rows['number'] . $mda_find;?>">View</a></td>
                            <td><a href="editperson.php?<?php echo $rows['number'] . $mda_find;?>">Edit</a></td>
                        </tr>
                    </tbody>
                    <?php 
                        }
                        $result_find->close();
                        $conn->close();
                        
                        function test_input($data) {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                        }
                    ?>
                </table>
            </div>
            <nav class="navbar navbar-expand-sm bg-light navbar-dark shadow-sm border ">
                <p class="mx-auto">© Copyright 2018. Head Of Service, Anambra State Government.</p>
            </nav>
        </div>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>
