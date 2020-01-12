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
        <?php
            require_once 'login.php';
            $conn = new mysqli($hn, $un, $pw, $db);
            if ($conn->connect_error) die($conn->connect_error);
            
            $word = $_SERVER['QUERY_STRING'];
            $mda_db = preg_replace('/[0-9]+/', '', $word);
            $num = preg_replace('/\D/', '', $word);
            
            
        ?>
        
        <?php
                    if(isset($_POST['mdas']) && isset($_POST['cadres']) && isset($_POST['sex']) && isset($_POST['sgl']) && isset($_POST['levels']) && isset($_POST['phone']) && isset($_POST['dp'])){
                        
                        $sex = $_POST['sex'];
                        $cadre = $_POST['cadres'];
                        $sgl = $_POST['sgl'];
                        $level = $_POST['levels'];
                        $dp = $_POST['dp'];
                        $phone = $_POST['phone'];
                        $new_query;
                        
                        echo $sex . $cadre;
                        if($_POST['mda'] == $mda_db){
                            $new_query = "UPDATE $mda_db SET name = $name, cadre = $cadre, sex = $sex, sgl = $sgl, level = $level, dp = $dp, phone = $phone WHERE number = $num";
                        }
                        else{
                            $new_query = "INSERT into $mda_db(`number`, `name`, `sex`, `sgl`, `level`, `dob`, `dofa`, `doca`, `dopppa`, `dopa`, `qualification`, `lga`, `edor`, `dp`, `phone`, `remark`, `cadre`, `history`)"
                                    . "VALUES('$num', '$name', '$sex', '$sgl', '$level', '$dob', '$dofa', '$doca', '$dopppa', '$dopa', '$qualification', '$lga', '$eod', '$dp', '$phone', '', '$cadre', '')";
                        }
                        $result = $conn->query($new_query);
                        if(!result) die ($conn->connect_error);
                        
                        elseif(result){
                            echo '<h2> Success </h2>';
                        }
                    }
                    else{
                        echo 'something is wrong';
                    }
                ?>
    </body>
</html>
