<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);
    //add to acitivity table
    date_default_timezone_set('Africa/Lagos');
    $time = date("Y-m-d H:i:s", time());
    $u_input = $_SESSION['name'];
    $query = "INSERT INTO activity (`user`, `action`, `time`) VALUES('$u_input', 'logged out', '$time')";
    $result = $conn->query($query);
    if(!$result) die($conn->error);
    session_unset(); 
    session_destroy(); 
    
    header('Location: http://localhost/CSMS/index.php');
    exit();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
