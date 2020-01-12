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
                      <li class="breadcrumb-item active" aria-current="page" id="breadc"></li>
                    </ol>
                </nav>
            </div>
            <div class="container">
                <h1></h1>
            </div>
            <div class="container">
                <div class="row py-2">
                    <div class="col-sm-12 shadow-sm">
                        <a id="checklink" href="viewmda.php?Principal" class="btn btn-outline-danger w-100 btn-lg" role="button">PRINCIPAL OFFICERS</a>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-sm-12 shadow-sm">
                        <a id="checklink2" href="viewmda2.php?Non-Principal" class="btn btn-outline-danger w-100" role="button">NON PRINCIPAL OFFICERS</a>
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
        
        <script>
            
            //reference to active breadcrumb
            const mdaref = document.querySelector('#breadc');
            //reference to header title
            const headref = document.querySelector('h1');
            //refernce to the link
            var checklink = document.getElementById('checklink');
            
            var checklink2 = document.getElementById('checklink2');
            
            headref.textContent = mda;
            mdaref.textContent = mda;
            checklink.href += mda;
            checklink2.href += mda;
        </script>
    </body>
</html>
