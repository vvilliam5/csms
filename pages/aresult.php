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
                        <li class="breadcrumb-item"><a href="asearch.php">Advanced Search</a></li>
                      <li class="breadcrumb-item active" aria-current="page"">Search Result</li>
                    </ol>
                </nav>
            </div>
            <div class="container">
                <h1>Search Result</h1>
            </div>
            <div class="container-fluid" style="font-size:xx-small">
                <?php
                    
                    $mda = array();
                    $cadre = array();
                    $sgl;
                    $level = array();
                    $dob;
                    $dofa;
                    $doca;
                    $dopppa;
                    $dopa;
                    $eod;
                    $qualification = array();;
                    $lga;
                    $dp;
                    $counter = 0; 
                    $counter2 = 0;
                    $counter3 = 0;
                    $counter4 = 0;
                    
                    
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        if(!empty($_POST['mdas'])){
                            foreach ($_POST['mdas'] as $option){
                                $mda[$counter] = test_input($option);
                                $counter++;
                                }
                        }
                        if(!empty($_POST['cadres'])){
                            foreach ($_POST['cadres'] as $option){
                                $cadre[$counter2] = test_input($option);
                                $counter2++;
                                }
                        }
                        if(!empty($_POST['sgl'])){
                            $sgl = test_input($_POST['sgl']);
                        }
                        if(!empty($_POST['levels'])){
                            foreach ($_POST['levels'] as $option){
                                $level[$counter3] = test_input($option);
                                $counter3++;
                                }
                        }
                        if(!empty($_POST['dob'])){
                            $dob = test_input($_POST['dob']);
                        }
                        if(!empty($_POST['dofa'])){
                            $dofa = test_input($_POST['dofa']);
                        }
                        if(!empty($_POST['doca'])){
                            $doca = test_input($_POST['doca']);
                        }
                        if(!empty($_POST['dopppa'])){
                            $dopppa = test_input($_POST['dopppa']);
                        }
                        if(!empty($_POST['dopa'])){
                            $dopa = test_input($_POST['dopa']);
                        }
                        if(!empty($_POST['eod'])){
                            $eod = test_input($_POST['eod']);
                        }
                        if(!empty($_POST['qualifications'])){
                            foreach ($_POST['qualifications'] as $option){
                                $qualification[$counter4] = test_input($option);
                                $counter4++;
                                }
                        }
                        if(!empty($_POST['lga'])){
                            $lga = test_input($_POST['lga']);
                        }
                        if(!empty($_POST['dp'])){
                            $dp = test_input($_POST['dp']);
                        }
                    }

                    function test_input($data) {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
                    function returnCadre($arr){
                        if(count($arr) > 0);{
                        $query = "(cadre = '$arr[0]'";
                            if(count($arr) > 1){
                                $counter = count($arr);
                                for($i = 1; $i < $counter; $i++){
                                    $query .= " OR cadre = '$arr[$i]'";
                                }
                            }
                            $query .= ")";
                            return $query;
                        }   
                    }
                    function returnMDA($arr){
                        if(count($arr) > 0);{
                        $query = "mda = '$arr[0]'";
                            if(count($arr) > 1){
                                $counter = count($arr);
                                for($i = 1; $i < $counter; $i++){
                                    $query .= " OR mda = '$arr[$i]'";
                                }
                            }
                            return $query;
                        }   
                    }
                    function returnLevel($arr){
                        if(count($arr) > 0);{
                        $query = "(level = '$arr[0]'";
                            if(count($arr) > 1){
                                $counter = count($arr);
                                for($i = 1; $i < $counter; $i++){
                                    $query .= " OR level = '$arr[$i]'";
                                }
                            }
                            $query .= ")";
                            return $query;
                        }   
                    }
                    function returnQual($arr){
                        if(count($arr) > 0);{
                        $query = "qualification LIKE '%$arr[0]%'";
                            if(count($arr) > 1){
                                $counter = count($arr);
                                for($i = 1; $i < $counter; $i++){
                                    $query .= " OR qualification LIKE '%$arr[$i]%'";
                                }
                            }
                            return $query;
                        }   
                    }
                    
                
                    
//                    
//                    echo "SELECT * FROM diaspora where ";
//                    echo returnCadre($cadre);
//                    echo ' AND ';
//                    echo returnMDA($mda);
                ?>
                <?php
                    for($i = 0; $i < count($mda); $i++){
                    $query = "SELECT * FROM $mda[$i] ";
                ?>
                <div class="mx-auto"><h3 class="text-center text-uppercase"><?php echo $mda[$i];?></h3></div>
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
          
                       
                        if(!empty($mda) || !empty($cadre) || !empty($sgl) || !empty($level) || !empty($dob) || !empty($dofa) || !empty($doca) || !empty($dopppa) || !empty($dopa) || !empty($eod) || !empty($qualification)
                        || !empty($lga) || !empty($dp)){
                            $query .= ' WHERE ';
                            if(!empty($cadre)){
                            $query .= returnCadre($cadre);
                        }
                            else{
                                $query .= "( cadre LIKE '%%')";
                            }
                        }
                        
                        if(!empty($sgl)){
                            $query .= ' AND ';
                            $query .= "( sgl LIKE '%$sgl%' )" ;
                        }

                        if(!empty($level)) {
                            $query .= ' AND ';
                            $query .= returnLevel($level);
                        }
                        if(!empty($dob)){
                            $query .= ' AND ';
                            $query .= "( dob = '$dob')";
                        }
                        if(!empty($dofa)){
                            $query .= ' AND ';
                            $query .= "( dofa = '$dofa')";
                        }
                        if(!empty($doca)){
                            $query .= ' AND ';
                            $query .= "( doca = '$doca')";
                        }
                        if(!empty($dopppa)){
                            $query .= ' AND ';
                            $query .= "( dopppa = '$dopppa')";
                        }
                        if(!empty($dopa)){
                            $query .= ' AND ';
                            $query .= "( dopa = '$dopa')";
                        }
                        if(!empty($qualification)){
                            $query .= ' AND ';
                            $query .= returnQual($qualification);
                        }
// fpr trouble shooting                        echo $query;
                        $query .= " ORDER BY number" ;
                        $result = $conn->query($query);
                        if(!$result) die($conn->error);
                        
                        $rows = $result->num_rows;
                        
                        for ($j = 0; $j < $rows; ++$j){
                            $result->data_seek($j);
                            $rows = $result->fetch_array(MYSQLI_ASSOC);
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
                            <td><a href="viewperson.php?<?php echo $rows['number'] . $mda[$i];?>">View</a></td>
                            <td><a href="editperson.php?<?php echo $rows['number'] . $mda[$i];?>">Edit</a></td>
                        </tr>
                    </tbody>
                    <?php 
                        }
                    ?>
                </table>
                <?php
                    }
                    $result->close();
                    $conn->close();
                ?>
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
