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
//        var mda = parent.document.URL.substring(parent.document.URL.indexOf('?'), parent.document.URL.length);
//        mda = mda.substring(1);
//        var numMda = mda.replace(/\D/g,'');
//        var letMda = mda.replace( /[^a-zA-Z]/, "");
//        alert(letMda);
        </script>
    </head>

    <body>
        <?php
            require_once 'login.php';
            $conn = new mysqli($hn, $un, $pw, $db);
            if ($conn->connect_error) die($conn->connect_error);
            
                $word = $_SERVER['QUERY_STRING'];
                $mda_db = preg_replace('/[0-9]+/', '', $word);
                $num = preg_replace('/\D/', '', $word);
            
        ?>
        <div class="container-fluid">
            <?php
                include 'headerfile.php';
                headerText();
                restrict(2);
            ?>
            <div class="container py-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                      <li class="breadcrumb-item"><a href="personnel.php">Personnels</a></li>
                      <li class="breadcrumb-item active"">Edit</li>
                    </ol>
                </nav>
            </div>
            <div class="container">
                <h1>Edit Personnels</h1>
            </div>
            <div class="container">
                <?php
                    $name;
                    $principal;
                    $sex;
                    $cadre;
                    $sgl;
                    $level;
                    $dob;
                    $dofa;
                    $doca;
                    $dopppa;
                    $dopa;
                    $eod;
                    $qualification;
                    $lga;
                    $dp;
                    $phone;
                    $history;
                    
                    if(!empty($mda_db) && !empty($num)){
                    $query = "SELECT * FROM $mda_db WHERE number = $num";
                    $result = $conn->query($query);
                    if(!$result) die($conn->error);

                    $rows = $result->num_rows;
                        $rows = $result->fetch_array(MYSQLI_ASSOC);
                        $name = $rows['name'];
                        $principal = $rows['principal'];
                        $sex = $rows['sex'];
                        $cadre = $rows['cadre'];
                        $sgl = $rows['sgl'];
                        $level = $rows['level'];
                        $dob = $rows['dob'];
                        $dofa = $rows['dofa'];
                        $doca = $rows['doca'];
                        $dopppa = $rows['dopppa'];
                        $dopa = $rows['dopa'];
                        $eod = $rows['edor'];
                        $qualification = $rows['qualification'];
                        $lga = $rows['lga'];
                        $dp = $rows['dp'];
                        $phone = $rows['phone'];
                        $history = $rows['history'];
                        
                    
                ?>
                <div class="mx-auto"><h3 class="text-center text-uppercase"><?php echo $name;?></h3></div>
                <form class="shadow" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <div class="form-group">
                        <div class="container">
                            <div class="form-row py-2">
                                <div class="col-sm">
                                    <label for="mdal">MDAs: </label>
                                    <select class="form-control" id="mdal" name="mda">
                                        <option value="ashia" id="mda_opt1">ASHIA</option>
                                        <option value="diaspora" id="mda_opt2">Diaspora</option>
                                    </select>
                                </div>
                                <input type="hidden" id="custId" name="mda_db" value="<?php echo htmlspecialchars($mda_db); ?>">
                                <input type="hidden" id="num_md" name="num_db" value="<?php echo htmlspecialchars($num); ?>">
                                <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
                                <input type="hidden" name="dob" value="<?php echo htmlspecialchars($dob); ?>">
                                <input type="hidden" name="dofa" value="<?php echo htmlspecialchars($dofa); ?>">
                                <input type="hidden" name="doca" value="<?php echo htmlspecialchars($doca); ?>">
                                <input type="hidden" name="dopppa" value="<?php echo htmlspecialchars($dopppa); ?>">
                                <input type="hidden" name="dopa" value="<?php echo htmlspecialchars($dopa); ?>">
                                <input type="hidden" name="eod" value="<?php echo htmlspecialchars($eod); ?>">
                                <input type="hidden" name="qualification" value="<?php echo htmlspecialchars($qualification); ?>">
                                <input type="hidden" name="lga" value="<?php echo htmlspecialchars($lga); ?>">
                                <input type="hidden" name="history" value="<?php echo htmlspecialchars($history); ?>">
                                
                                <div class="col-sm">
                                    <label for="cadrel">Cadres: </label>
                                    <input type="text" class="form-control" name="cadres" value="<?php echo htmlspecialchars($cadre); ?>">
                                </div>
                                <div class="col-sm">
                                    <label for="pol">Principal Officer: </label>
                                    <select class="form-control" id="pol" name="po">
                                        <option value="no" id="opt1">No</option>
                                        <option value="yes" id="opt2">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row py-2">
                                <div class="col-sm">
                                    <label for="sgll">SGL:</label>
                                    <input type="text" class="form-control" id="sgll" name="sgl" value="<?php echo htmlspecialchars($sgl); ?>">
                                </div>
                                <div class="col-sm">
                                    <label for="levell">Level: </label>
                                    <input type="text" class="form-control" id="levell" name="levels" value="<?php echo htmlspecialchars($level); ?>">
                                </div>
                                <div class="col-sm">
                                    <label for="sexl">Sex: </label>
                                    <input type="text" class="form-control" name="sex" value="<?php echo htmlspecialchars($sex); ?>">
                                </div>
                            </div>
                            <div class="form-row py-2">
                                <div class="col-sm">
                                    <label for="phonel">Phone: </label></br>
                                    <input type="text" class="form-control" id="phonel" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
                                </div>
                                <div class="col-sm">
                                    <label for="dpl">Duty Post: </label></br>
                                    <input type="text" class="form-control" id="dpl" name="dp" value="<?php echo htmlspecialchars($dp); ?>" >
                                </div>
                            </div>
                            <div class="form-row py-2">
                                <div class="col-sm">
                                    <button type="submit" class="btn btn-danger w-100">Update</button>
                                </div>
                            </div>
                       </div>
                    </div>
                </form>
                <?php
                    }
                    $new_mda;
                    //any variables declared outside must also be declared in this if statement
                    if(isset($_POST['mda']) && isset($_POST['cadres']) && isset($_POST['sex']) && isset($_POST['sgl']) && isset($_POST['levels']) && isset($_POST['phone']) && isset($_POST['dp'])){
                        $new_mda = test_input($_POST['mda']);
                        $name = test_input($_POST['name']);
                        $sex = test_input($_POST['sex']);
                        $cadre = test_input($_POST['cadres']);
                        $sgl = test_input($_POST['sgl']);
                        $level = test_input($_POST['levels']);
                        $dp = test_input($_POST['dp']);
                        $phone = test_input($_POST['phone']);
                        $old_mda = test_input($_POST['mda_db']);
                        $old_num = test_input($_POST['num_db']);
                        $dob = test_input($_POST['dob']);
                        $dofa = test_input($_POST['dofa']);
                        $doca = test_input($_POST['doca']);
                        $dopppa = test_input($_POST['dopppa']);
                        $dopa = test_input($_POST['dopa']);
                        $eod = test_input($_POST['eod']);
                        $qualification = test_input($_POST['qualification']);
                        $lga = test_input($_POST['lga']);
                        $history = test_input($_POST['history']);
                        if($_POST['po'] == 'no'){
                            $principal = 0;
                        }
                        else{
                            $principal = 1;
                        }
                        $search_row;
                        if($new_mda == $old_mda){
                            $new_query = "UPDATE $new_mda SET principal = '$principal', cadre = '$cadre', sex = '$sex', sgl = '$sgl', level = $level, dp = '$dp', phone = '$phone' WHERE number = '$old_num'";
                            $result = $conn->query($new_query);
                            if(!$result) die ($conn->error);
                            elseif($result){
                                //add to acitivity table
                                date_default_timezone_set('Africa/Lagos');
                                $u_input = $_SESSION['name'];
                                $time = date("Y-m-d H:i:s", time());
                                $query = "INSERT INTO activity (`user`, `action`, `time`) VALUES('$u_input', 'updated $name nominal row', '$time')";
                                $result = $conn->query($query);
                                if(!$result) die($conn->error);
                                
                                echo '<h2 class="text-center text-success"> Your changes have been saved </h2>';
                        }
                        }
                        
                        else{
                            $query_search = "SELECT * FROM $new_mda ORDER BY number DESC LIMIT 1";
                            $search_result = $conn->query($query_search);
                            if(!$search_result) die($conn->error);
                                
                            
                            $rows = $search_result->num_rows;

                            $rows = $search_result->fetch_array(MYSQLI_ASSOC);
                            $search_row = $rows['number'];
                            $search_row += 1;
                            
                            $new_query = "INSERT into $new_mda(`number`, `name`, `principal`, `sex`, `sgl`, `level`, `dob`, `dofa`, `doca`, `dopppa`, `dopa`, `qualification`, `lga`, `edor`, `dp`, `phone`, `remark`, `cadre`, `history`)"
                                    . " VALUES($search_row, '$name', $principal, '$sex', '$sgl', $level, '$dob', '$dofa', '$doca', '$dopppa', '$dopa', '$qualification', '$lga', '$eod', '$dp', $phone, '', '$cadre', '$history')";
                            $result = $conn->query($new_query);
                            if(!$result) die ($conn->error);
                            elseif($result){
                                
                                $sec_query = "DELETE from $old_mda WHERE number = '$old_num'";
                                $sec_result = $conn->query($sec_query);
                                if(!$sec_result) die ($conn->error);
                                else{
                                    //update the history value and add to the database
                                    $date = date("Y-m-d");
                                    $new_insert = " $old_mda to $new_mda on $date,";
                                    $history .= $new_insert;
                                    $h_query = "UPDATE $new_mda SET history = '$history' WHERE number = '$search_row'";
                                    $h_result = $conn->query($h_query);
                                    if(!$result) die($conn->error);
                                    //add to acitivity table
                                    date_default_timezone_set('Africa/Lagos');
                                    $u_input = $_SESSION['name'];
                                    $time = date("Y-m-d H:i:s", time());
                                    $query = "INSERT INTO activity (`user`, `action`, `time`) VALUES('$u_input', 'transfered $name from $old_mda to $new_mda ', '$time')";
                                    $result = $conn->query($query);
                                    if(!$result) die($conn->error);
                                    
                                    echo '<h2 class="text-center text-success"> Your changes have been saved </h2>';
                                }
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
            </div>
            <?php if(isset($principal)){ ?><div class="principal_div">
                <?php echo $principal; }?>
            </div>
            <div class="mda_div">
                <?php echo $mda_db; ?>
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
            //set the default value for principal offocer
            let principal_div = document.querySelector('.principal_div');
            let option_a = document.querySelector('#opt1');
            let option_b = document.querySelector('#opt2');
            //set the default value for principal offocer
            let mda_div = document.querySelector('.mda_div');
            let mdaoption_a = document.querySelector('#mda_opt1');
            let mdaoption_b = document.querySelector('#mda_opt2');
            if(principal_div.innerText == 0){
               option_a.setAttribute('selected', 'selected');
            }
            else if(principal_div.innerText == 1){
                option_b.setAttribute('selected', 'selected');
            }
            if(mda_div.innerText == 'Ashia'){
               mdaoption_a.setAttribute('selected', 'selected');
            }
            else if(mda_div.innerText == 'Diaspora'){
                mdaoption_b.setAttribute('selected', 'selected');
            }
        </script>
        
    </body>
</html>
