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
            <div class="container">
                <form method="post" action="<?php echo htmlspecialchars('findPersonResult.php'); ?>">
                    <div class="form-group">
                        <div class="container">
                            <div class="form-row py-2">
                                <div class="col-sm">
                                    <label for="mdal">MDAs: </label>
                                    <select class="form-control" id="mdal" name="mdas">
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
                                    <label for="sgll">Name:</label>
                                    <input type="text" class="form-control" id="namel" name="name">
                                </div>
                            </div>
                            
                            <div class="form-row py-2">
                                <div class="col-sm">
                                    <button type="submit" class="btn btn-danger w-100">Search</button>
                                </div>
                            </div>
                       </div>
                    </div>
                </form>
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
