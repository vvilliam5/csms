
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $( function() {
              $( "#dialog" ).dialog();
            } );
        </script>
    </head>
    <body>
        <?php
            session_start();
            
            if (empty($_SESSION['name'])){
                echo "<div id='dialog' title='Login Required'><p>You need to be Logged In to view this page</p></div>";
                header('Refresh: 4; Url= https://ohos-csms.herokuapp.com/pages/user_login.php');
                exit();
            }
        ?>
        <?php
            function restrict($i){
                if($_SESSION['level'] < $i){
                    echo '<script>alert("You are not authorised to view this page, please contact the admin")</script>';
                    header('Refresh: 0.1; Url= https://ohos-csms.herokuapp.com/index.php');
                    exit();
                }
            }
            function log_login(){
                require_once 'login.php';
                $conn = new mysqli($hn, $un, $pw, $db);
                if ($conn->connect_error) die($conn->connect_error);
                $name = $_SESSION['name'];
                $time = date("Y-m-d H:i:s", time());
                $query = "INSERT INTO activity (`user`, `action`, `time`) VALUES('$name', 'logged in', '$time')";
                $result = $conn->query($query);
                if(!$result) die($conn->error);
            }
        
            $logged;
            if(empty($_SESSION['name'])){
                $logged = "<a href='user_login.php' class='btn btn-outline-danger ml-auto' role='button'>Log In</a>";
            }
            elseif (isset($_SESSION['name'])){
                $logged = "<span class='ml-auto px-4'>Logged in as " . $_SESSION['name'] . "</span>" . "<a href='logout.php' class='btn btn-outline-danger' role='button'>Log Out</a>";
            }
            function headerText(){
            $date = date('l, d F Y');
            $headText = "<nav class='navbar navbar-expand-sm bg-light navbar-dark shadow-sm'><span class='pr-4'><small>$date</small></span>" .
            "<p class='m-0 bg-danger p-2 text-white'><small>Latest Update</small></p><p class='m-0 p-2'><small>You can now check Nominal Rows on the Personnels Page</small></p>" .
            $GLOBALS['logged'] . "</nav><div class='container'><div class='row'><div class='col-md-3 p-4'>" .
            "<img src='../pics/anambralogo.png' alt='Anambra State' style='width: 220px;'></div><div class='col-md-9 p-4'><img src='../pics/anambra-bg.png' alt='Anambra State' style='width: 820px;'>" .
            "</div></div></div><div class='container'><nav class='navbar navbar-expand-sm bg-dark navbar-dark sticky-top'><ul class='navbar-nav'><li class='nav-item'>" .
            "<a class='nav-link' href='../index.php'>Home</a></li><li class='nav-item'><a class='nav-link' href='personnel.php'>Personnels</a></li><li class='nav-item'>" .
            "<a class='nav-link' href='mdas.php'>MDAs</a></li><li class='nav-item'><a class='nav-link' href='adminpanel.php'>Admin Panel</a></li><li class='nav-item'>" . 
            "<a class='nav-link' href='comingsoon.php'>News</a></li><li class='nav-item'><a class='nav-link' href='contact.php'>Contact</a></li></ul>" .
            "<form class='form-inline ml-auto' action='/action_page.php'><input class='form-control mr-sm-2' type='text' placeholder='Search'>" .
            "<button class='btn btn-danger' type='submit'>Search</button></form></nav> </div>";        
            echo $headText;
        }
        ?>
    </body>
</html>
