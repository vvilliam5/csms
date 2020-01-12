<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
        session_start();
    ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Office of the Head Of Service</title>
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
        function headerText(){
            $headText = "<div class='container'><div class='row'><div class='col-md-3 p-4'>" .
            "<img src='pics/anambralogo.png' alt='Anambra State' style='width: 220px;'></div><div class='col-md-9 p-4'><img src='pics/anambra-bg.png' alt='Anambra State' style='width: 820px;'>" .
            "</div></div></div><div class='container'><nav class='navbar navbar-expand-sm bg-dark navbar-dark sticky-top'><ul class='navbar-nav'><li class='nav-item active'>" .
            "<a class='nav-link' href=''>Home</a></li><li class='nav-item'><a class='nav-link' href='pages/personnel.php'>Personnels</a></li><li class='nav-item'>" .
            "<a class='nav-link' href='pages/mdas.php'>MDAs</a></li><li class='nav-item'><a class='nav-link' href='pages/adminpanel.php'>Admin Panel</a></li><li class='nav-item'>" . 
            "<a class='nav-link' href='pages/comingsoon.php'>News</a></li><li class='nav-item'><a class='nav-link' href='pages/contact.php'>Contact</a></li></ul>" .
            "<form class='form-inline ml-auto' action='/action_page.php'><input class='form-control mr-sm-2' type='text' placeholder='Search'>" .
            "<button class='btn btn-danger' type='submit'>Search</button></form></nav> </div>";        
            echo $headText;
        }
        ?>
        <div class="container-fluid">
            <nav class='navbar navbar-expand-sm bg-light navbar-dark shadow-sm'>
                <span class='pr-4'><small><?php echo date('l, d F Y'); ?></small></span>
                <p class='m-0 bg-danger p-2 text-white'><small>Latest Updates</small></p>
                <p class='m-0 p-2'><small>You can now check Nominal Rows on the Personnels Page</small></p>
                <?php if(empty($_SESSION['name'])){ ?>
                <a href="pages/user_login.php" class='btn btn-outline-danger ml-auto' role="button">Log In</a>
                <?php } elseif (isset($_SESSION['name'])) { ?>
                <span class='ml-auto px-4  ml-auto text-success'><?php echo 'Welcome Back ' . $_SESSION['name']; ?></span><a href="pages/logout.php" class='btn btn-outline-danger' role="button">Log Out</a>
                <?php }  ?>
            </nav>
            <?php headerText(); ?>
            <div class="container py-2">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                      <li data-target="#demo" data-slide-to="0" class="active"></li>
                      <li data-target="#demo" data-slide-to="1"></li>
                      <li data-target="#demo" data-slide-to="2"></li>
                    </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="pics/carousel/popstarsrt.png" alt="Anambra State" width="1100" height="500">
                        <div class="carousel-caption">
                            <h3>SEARCH THROUGH THOUSANDS OF NOMINAL ROWS RECORDS</h3>
                            <p>Browse our extensive and comprehensive records of all civil servants in anambra state</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="pics/carousel/bridgert.png" alt="Anambra State" width="1100" height="500">
                        <div class="carousel-caption">
                            <h3>EXECUTIVE SUMMARY</h3>
                            <p>Get an executive summary of all civil servants filtered by cadre, ministry, etc to generate a report</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="pics/carousel/obiort.png" alt="Anambra State" width="1100" height="500">
                        <div class="carousel-caption">
                            <h3>TRANSFER LOG</h3>
                            <p>View transfer activities of personnels and ministries, for back-tracking and auditing</p>
                        </div>
                    </div>
                </div>

                      <!-- Left and right controls -->
                      <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                      </a>
                      <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                      </a>
                </div>
            </div>
            <div class="container">
                <div class="jumbotron">
                    <h1>Our Vision</h1>      
                    <blockquote><q>To be a well coordinated, disciplined proactive, motivated and productive Public Service through effective Leadership.</q></blockquote>
                    <h1>Our Mission</h1>      
                    <blockquote><q>To promote efficient service delivery through continuous Improvement,Resourcefulness, Professionalism, Discipline and Human Resource Management</q></blockquote>
                </div>
            </div>
            <div class="container">
                <div class="row py-2">
                    <div class="col-sm-6 shadow-sm">
                        <a href="pages/mdas.php" class="btn btn-outline-danger w-100" role="button">View All MDAs</a>
                    </div>
                    <div class="col-sm-6 shadow-sm">
                        <a href="pages/transfer.php" class="btn btn-outline-danger w-100" role="button">View Transfer Log</a>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-sm-6 shadow-sm">
                        <a href="pages/findPerson.php" class="btn btn-outline-danger w-100" role="button">Find a Personnel</a>
                    </div>
                    <div class="col-sm-6 shadow-sm">
                        <a href="pages/asearch.php" class="btn btn-outline-danger w-100" role="button">Advanced Search</a>
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
