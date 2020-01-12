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
        <div class="container-fluid">
        <?php
                include 'headerfile.php';
                headerText();
                require_once 'login.php';
                $conn = new mysqli($hn, $un, $pw, $db);
                if ($conn->connect_error) die($conn->connect_error);
            ?>
        </div>
        <div class="container py-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="personnel.php">Personnels</a></li>
                        <li class="breadcrumb-item active">Add New</li>
                    </ol>
                </nav>
            </div>
            <div class="container">
                <h1>Add New Personnel</h1>
            </div>
                <?php
                    if(empty($_POST['name'])){
                ?>
                <div class="container">
                    <form method="post" id="formId" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <div class="form-group">
                        <div class="container">
                            <div class="form-row py-2">
                                <div class="col-sm">
                                    <label for="namel">Name:</label>
                                    <input type="text" class="form-control" id="namel" name="name" required>
                                </div>
                                <div class="col-sm">
                                    <label for="mdal">MDAs: </label>
                                    <select class="form-control" id="mdal" name="mdas" required>
<!--                                        <option value="actda">ACTDA</option>
                                        <option value="ansippa">ANSIPPA</option>-->
                                        <option value="ashia">ASHIA</option>
<!--                                        <option value="asphcda">ASPHCDA</option>
                                        <option value="basic">Basic Education</option>
                                        <option value="civil">Civil Service Commission</option>
                                        <option value="deputy">Deputy Governor's Office</option>-->
                                        <option value="diaspora">Diaspora</option>
<!--                                        <option value="economic">Economy Planning & Budget</option>
                                        <option value="environment">Environment</option>
                                        <option value="finance">Finance</option>
                                        <option value="printing">Government Printing Press</option>
                                        <option value="governor">Governor's Office</option>
                                        <option value="health">Health</option>
                                        <option value="housing">Housing</option>
                                        <option value="information">Information & Public Enlightenment</option>
                                        <option value="land">Land</option>
                                        <option value="chieftancy">Local Government & Chieftancy</option>
                                        <option value="audit">Local Government Audit</option>
                                        <option value="newspaper">Newspaper & Printing Corporation</option>
                                        <option value="pheaith">Primary Heaith Care Agency</option>
                                        <option value="ssg">SSG</option>
                                        <option value="sbs">State Bureau Statistics</option>
                                        <option value="signage">State Signage & Advertisement Agency</option>
                                        <option value="tertiary">Tertiary & Science Education</option>
                                        <option value="trade">Trade & Commerce</option>
                                        <option value="women">Women Affair & Children</option>
                                        <option value="youth">Youth Empowerment & Creative Economy</option>-->
   
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <label for="cadrel">Cadres: </label>
                                    <select class="form-control" id="cadrel" name="cadres" required>
                                        <option value="administrative">Administrative</option>
                                        <option value="executive">Executive</option>
                                        <option value="clerical">Clerical</option>
                                        <option value="messenger">Messenger</option>
                                        <option value="confidential">Confidential</option>
                                        <option value="data">Data Processing</option>
                                        <option value="store">Store Officer</option>
                                        <option value="librarian">Librarian</option>
                                        <option value="secretarial">Secretarial Assistant</option>
                                        <option value="clerical_assistant">Clerical Assistant</option>
                                        <option value="driver">Motor Driver</option>
                                        <option value="catering">Catering</option>
                                        <option value="gardener">Gardener</option>
                                        <option value="watchman">Watchman</option>
                                        <option value="account">Account</option>
                                        <option value="planning">Planning</option>
                                        <option value="work">Work</option>
                                        <option value="porter">Porter</option>
                                        <option value="craftman">Craftman</option>
                                        <option value="security">Security</option>
                                        <option value="programme_analyst">Programme Analyst</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row py-2">
                                <div class="col-sm">
                                    <label for="sgll">SGL:</label>
                                    <input type="text" class="form-control" id="sgll" name="sgl" required>
                                </div>
                                <div class="col-sm">
                                    <label for="levell">Level: </label>
                                    <select class="form-control" id="levell" name="levels" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>   
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <div class="form-row py-2">
                                        <div class="col-sm">
                                            <label for="sexl">Sex: </label>
                                            <select class="form-control" id="sexl" name="sex" required>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option> 
                                            </select>
                                        </div>
                                        <div class="col-sm">
                                            <label for="prncipall">Principal Officer: </label>
                                            <select class="form-control" id="principall" name="principal" required>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option> 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row py-2">
                                <div class="col-sm">
                                    <label for="dobl">Date Of Birth: </label></br>
                                    <input type="date" name="dob" id="dobl" required>
                                </div>
                                <div class="col-sm">
                                    <label for="dofal">Date Of 1st Appointment: </label></br>
                                    <input type="date" name="dofa" id="dofal" required>
                                </div>
                                <div class="col-sm">
                                    <label for="docal">Date Of Confirmed Appointment: </label></br>
                                    <input type="date" name="doca" id="docal" required>
                                </div>
                            </div>
                            <div class="form-row py-2">
                                <div class="col-sm">
                                    <label for="dopppal">Date Of Promotion Prior to Present Appointment: </label></br>
                                    <input type="date" name="dopppa" id="dopppal" required>
                                </div>
                                <div class="col-sm">
                                    <label for="dopal">Date Of Present Appointment: </label></br>
                                    <input type="date" name="dopa" id="dopa" required>
                                </div>
                                <div class="col-sm">
                                    <label for="edorl">Expected Date of Retirement: </label></br>
                                    <input type="date" name="eod" id="edorl" required>
                                </div>
                            </div>
                            <div class="form-row py-2">
                                <div class="col-sm">
                                    <label for="qualificationl">Qualification: </label></br>
                                    <input type="text" class="form-control" id="qualificationl" name="qualification" required>
                                </div>
                                <div class="col-sm">
                                    <label for="lgal">Local Government Area: </label></br>
                                    <input type="text" class="form-control" id="lgal" name="lga" required>
                                </div>
                                <div class="col-sm">
                                    <label for="dpl">Duty Post: </label></br>
                                    <input type="text" class="form-control" id="dpl" name="dp" required>
                                </div>
                            </div>
                            <div class="form-row py-2">
                                <div class="col-sm">
                                    <label for="phonel">Phone Number: </label></br>
                                    <input type="text" class="form-control" id="phonel" name="phone" required>
                                </div>
                                <div class="col-sm">
                                    <label for="remarkl">Remark: </label></br>
                                    <input type="text" class="form-control" id="remarkl" name="remark">
                                </div>
                            </div>
                            <div class="form-row py-2">
                                <div class="col-sm">
                                    <button id="btnsubmit" type="submit" class="btn btn-danger w-100">Add Personnel</button>
                                </div>
                            </div>
                       </div>
                    </div>
                </form>
                    <?php
                    }
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $name = test_input($_POST['name']);
                            $mda = test_input($_POST['mdas']);
                            $cadre = test_input($_POST['cadres']);
                            $sgl = test_input($_POST['sgl']);
                            $level = test_input($_POST['levels']);
                            $sex = test_input($_POST['sex']);
                            $principal = test_input($_POST['principal']);
                            $dob = test_input($_POST['dob']);
                            $dofa = test_input($_POST['dofa']);
                            $doca = test_input($_POST['doca']);
                            $dopppa = test_input($_POST['dopppa']);
                            $dopa = test_input($_POST['dopa']);
                            $eod = test_input($_POST['eod']);
                            $qualification = str_replace('.', '', test_input($_POST['qualification']));
                            $lga = test_input($_POST['lga']);
                            $dp = test_input($_POST['dp']);
                            $phone = test_input($_POST['phone']);
                            $remark = test_input($_POST['remark']);
                            
                            //find the last row in the table to be able to assign new next number
                            $query_search = "SELECT * FROM $mda ORDER BY number DESC LIMIT 1";
                            $search_result = $conn->query($query_search);
                            if(!$search_result) die($conn->error);
                            $rows = $search_result->num_rows;
                            $rows = $search_result->fetch_array(MYSQLI_ASSOC);
                            $search_row = $rows['number'];
                            $search_row += 1;
                            
                            $new_query = "INSERT into $mda(`number`, `name`, `principal`, `sex`, `sgl`, `level`, `dob`, `dofa`, `doca`, `dopppa`, `dopa`, `qualification`, `lga`, `edor`, `dp`, `phone`, `remark`, `cadre`, `history`)"
                                    . " VALUES($search_row, '$name', $principal, '$sex', '$sgl', $level, '$dob', '$dofa', '$doca', '$dopppa', '$dopa', '$qualification', '$lga', '$eod', '$dp', $phone, '', '$cadre', '')";
                            $result = $conn->query($new_query);
                            if(!$result) die ($conn->error);
                            elseif($result){
                                echo '<h2 class="text-center text-success">' . $name .  ' has been added successfully added </h2>';
                            }
                            
                        }
                        
                        function test_input($data) {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                        }
                    ?>
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
