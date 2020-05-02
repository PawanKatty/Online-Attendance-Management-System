<?php 
include("../action.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Attandence</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        html,body {
            margin: 0 0 0 0;
            padding: 0;
            height: 100%;
            background-color: #E5E7E9;
        }

        #container {
            min-height: 100%;
        }
        #main {
            overflow: auto;
            padding-bottom: 100px;
            background-color: #E5E7E9;
        }
        
        #titleBackground {
            width: 200px;
            height: 40px;
            background: #D64444;
            border-radius: 9px 9px 9px 9px;
            float: left;
        }

        #titleBackground p {
            margin: 0;
            padding: 0;
            font-size: 1.3em;
            position: relative;
            top: 50%;
            left: 50%;
            text-align: center;
            transform: translateX(-50%) translateY(-50%);
        }
        .login span{
            text-align: center;
            font-size: 1em;
        }
        .loginDiv{
            margin-top: 10px; margin-left: auto; margin-right: auto; padding: 0;
            height: 37px;width:350px ;background-color: aqua;
        }
        #loginOut{
            margin-top: 10px; margin-left: auto; margin-right: auto; 
            padding: 0 2px 0 2px;
            height: 37px;
            position: relative;
            left: 25%;
            background: #0F0F0F;
            border-radius: 7px;
            color: antiquewhite;
            font-size: 0.8em;
        }
        .card{
            top: 50%;
            left: 50%;
            text-align: center;
            transform: translateX(-50%) translateY(10%);
        }
        .card-header{
            text-align: center;
        }
        .card-body{
            text-align: center;
        }
        .border{
            position: relative;
            width: 323px;
            height: 380px;
            background-color: crimson;
            border: 3px solid #000000;
            box-sizing: border-box;
            border-radius: 14px;
            float: left;
            margin-top: 65px;
/*
            top: 50%;
            left: 50%;
            text-align: center;
            transform: translateX(-50%) translateY(-50%);
*/
        }
        .border p {
            text-align: center;
            font-size: 18px;
        }
        
        .border form{
            text-align: center;
        }
        .status{
            position: relative;
            width: 323px;
            height: 380px;
            background-color: aqua;
            border: 3px solid #000000;
            box-sizing: border-box;
            border-radius: 14px;
            margin: 65px auto auto auto;
        }
        .statusBar{
            position:relative;
            width: 179px;
            background: #26D322;
            border-radius: 13px;
            margin: 0 auto;
            line-height: 2.3em;
            text-align: center;
        }
        .status h4{
            text-align: center;
        }
        .status img{
        width: 114px;
        height: 114px;
        background: #C4C4C4 ;
        border-radius: 14px;
        display: block;
        margin: 0 auto;
        }
        #student-image{
            width: 120px;
            height: 120px;
            background: #C4C4C4 ;
            border-radius: 14px;
            display: block;
            margin: 0 auto;
        }
        .fillStatus {
            width: 200px;
            height: 75px;
            float: right;
            background: #7BC1A8;
            padding: 0;
            border-radius: 0px 0px 0px 10px;
            line-height: 0.6;
            padding-left: 1em;
        }
        .submitView{
        position: absolute;
        width: 110px;
        height: 38px;
        background: #63E3EB;
        border: 1px solid #606277;
        box-sizing: border-box;
        border-radius: 10px;
        font-family: Raavi;
        font-size: 24px;
        line-height: 43px;
        text-align: center;
        bottom: 30px;
        }
        #error{
            text-align: center;
        }
        footer {
            background-color: #1C2833;
            height: 19px;
            margin-top: -19px;
            clear: both;

        } 
        @media only screen and (max-width: 575px) {
          .space{
            height: 5px;
          }
        }

    </style>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
      <div id="container">
          <div id="main">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a href="../index.php">
              <div id="titleBackground">
                  <p style="color:black">Online Attendance<p>
                 </div ></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    
                    <?php if($_SESSION['id']){ ?>
                    <a href="../?functions=logout"><button class="btn btn-outline-success my-2 my-sm-0 mr-2 " value="Logout" name="login" type="submit">Logout</button></a>
                    <a href="admin.php"><button class="btn btn-outline-success my-2 my-sm-0" value="Admin Page" name="login" type="submit">Admin Page</button></a>
              <?php } else if($_SESSION['id']=="") { ?>
                   
                    <form class="form-inline my-2 my-lg-0" method="post">
                        <input class="form-control mr-sm-2 " name="idd" placeholder="admin-id">
                        <div class="space"></div>
                        <input class="form-control mr-sm-2 " type="password" name="password" placeholder="password">
                        <button class="btn btn-outline-success my-2 my-sm-0" value="Admin Login" name="login" type="submit">Admin Login</button>
                    </form>
                    <?php } ?>
                </div>
            </nav>