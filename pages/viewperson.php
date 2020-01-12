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
            ?>
            <div class="container py-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                      <li class="breadcrumb-item"><a href="personnel.php">Personnels</a></li>
                      <li class="breadcrumb-item active"">View</li>
                    </ol>
                </nav>
            </div>
            <div class="container">
                <h1>View Personnels</h1>
            </div>
            <div class="container">
                <?php
                    $name;
                    $sex;
                    $cadre;
                    $principal;
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
                    $remark;
                    $history;
                    
                    
                    $query = "SELECT * FROM $mda_db WHERE number = $num";
                    $result = $conn->query($query);
                    if(!$result) die($conn->error);

                    $rows = $result->num_rows;
                        $rows = $result->fetch_array(MYSQLI_ASSOC);
                        $name = $rows['name'];
                        $sex = $rows['sex'];
                        $cadre = $rows['cadre'];
                        $principal = $rows['principal'];
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
                        $remark = $rows['remark'];
                        $history = $rows['history'];
                        $hist = explode(',', $history);
                    
                ?>
                <div class="container">
                    <div class="row">
                        <div class="mx-auto text-center">
                        <?php if ($sex == 'M'){ echo "<img src='../pics/man.png'> ";} else{ echo "<img src='../pics/girl.png'>";} ?>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-sm border">
                            <h6>Name:</h6>
                            <h5><?php echo $name; ?></h5>
                        </div>
                        <div class="col-sm border">
                            <h6>MDA:</h6>
                            <h5><?php echo $mda_db; ?></h5>
                        </div>
                        <div class="col-sm border">
                            <h6>Cadre:</h6>
                            <h5><?php echo $cadre; ?></h5>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-sm border">
                            <h6>Principal Officer:</h6>
                            <h5><?php if($principal = 1){ echo 'YES';} else{ echo 'NO';} ?></h5>
                        </div>
                        <div class="col-sm border">
                            <h6>Sex:</h6>
                            <h5><?php echo $sex; ?></h5>
                        </div>
                        <div class="col-sm border">
                            <h6>SGL:</h6>
                            <h5><?php echo $sgl; ?></h5>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-sm border">
                            <h6>Level:</h6>
                            <h5><?php echo $level ?></h5>
                        </div>
                        <div class="col-sm border">
                            <h6>Date Of Birth:</h6>
                            <h5><?php echo $dob; ?></h5>
                        </div>
                        <div class="col-sm border">
                            <h6>Date Of First Appointment:</h6>
                            <h5><?php echo $dofa; ?></h5>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-sm border">
                            <h6>Date Of Confirmed Appointment:</h6>
                            <h5><?php echo $doca; ?></h5>
                        </div>
                        <div class="col-sm border">
                            <h6>Date Of Promotion Prior to Present Appointment:</h6>
                            <h5><?php echo $dopppa; ?></h5>
                        </div>
                        <div class="col-sm border">
                            <h6>Date Of Present Appointment:</h6>
                            <h5><?php echo $dopa; ?></h5>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-sm border">
                            <h6>Qualification:</h6>
                            <h5><?php echo $qualification; ?></h5>
                        </div>
                        <div class="col-sm border">
                            <h6>Local Government Area:</h6>
                            <h5><?php echo $lga; ?></h5>
                        </div>
                        <div class="col-sm border">
                            <h6>Expected Date Of Retirement:</h6>
                            <h5><?php echo $eod; ?></h5>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-sm border">
                            <h6>Duty Post:</h6>
                            <h5><?php echo $dp; ?></h5>
                        </div>
                        <div class="col-sm border">
                            <h6>Phone Number:</h6>
                            <h5><?php echo '0' . $phone; ?></h5>
                        </div>
                        <div class="col-sm border">
                            <h6>Remarks:</h6>
                            <h5><?php echo $remark; ?></h5>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-sm border text-center">
                            <h6>History</h6>
                            <?php for($x = 0; $x < count($hist) - 1; $x++){
                                echo "<h5> Transfered from " . $hist[$x] . "</h5>";
                            } ?>
                        </div>
                    </div>
                </div>
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
