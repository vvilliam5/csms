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
        <script>
            var mda = parent.document.URL.substring(parent.document.URL.indexOf('?'), parent.document.URL.length);
            mda = mda.substring(1);
        </script>
    </head>
    <body>
        <?php
            require_once 'login.php';
            $conn = new mysqli($hn, $un, $pw, $db);
            if ($conn->connect_error) die($conn->connect_error);
            $word_mda = $_SERVER['QUERY_STRING'];
            $word_mda = substr($word_mda, 9);
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
                        <li class="breadcrumb-item"><a href="mdas.php">MDAs</a></li>
                        <li class="breadcrumb-item"><a href="mdas.php" id="mdaprev"></a></li>
                      <li class="breadcrumb-item active" aria-current="page" id="breadc"></li>
                    </ol>
                </nav>
            </div>
            <div class="container">
                <h1></h1>
            </div>
            <div class="container-fluid" style="font-size:x-small">
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
                        $query = "SELECT * FROM $word_mda WHERE principal = '1' ORDER BY number";
                        $result = $conn->query($query);
                        if(!$result) die($conn->error);
                        
                        $rows = $result->num_rows;
                        
                        for ($j = 0; $j < $rows; ++$j){
                            $result->data_seek($j);
                            $rows = $result->fetch_array(MYSQLI_ASSOC);
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $j + 1; ?></td>
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
                            <td><a class="editLinkC" href="viewperson.php?<?php echo $rows['number'];?>">View</a></td>
                            <td><a class="editLinkC" id="editLink" href="editperson.php?<?php echo $rows['number'];?>">Edit</a></td>
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
        </div>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
        <script>
            const mdaref = document.querySelector('#breadc');
            const headref = document.querySelector('h1');
            //reference the mda breadcrumb
            const mdaprev = document.querySelector('#mdaprev');
            //reference to editlink
            const editLink = document.getElementsByClassName('editLinkC');
            
            headref.textContent = mda.slice(0, 9);
            headref.textContent += " Officers";
            mdaref.textContent = mda.slice(0, 9);
            mdaprev.textContent = mda.substring(9);
            for(let i = 0; i < editLink.length; i += 1){
                editLink[i].href += mda.substring(9);
            }
            
        </script>
    </body>
</html>
