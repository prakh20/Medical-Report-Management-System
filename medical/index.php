<?php 
    $connection=mysqli_connect("localhost","root","","medical_report");

    session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Medical Record Management System</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
     <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./slick/slick.css">
    <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css"> 
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="style.css">
    

 
</head> 
<style>
    
.parallax {
    
    background-image: url("doct.jpg");
    
    height: 100%;
    width:1365px;
    min-height: 800px; 
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size:auto;
    
    }
    
.parallax1 {
    
    background-image: url("doct.jpeg");
    height: 100%;
    width:100%;
    min-height: 600px; 
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    
    } 
  .navbar-fixed-top.scrolled {
       background-color: ghostwhite;
      transition: background-color 200ms linear;
    }

</style>
<body > 
  <div class="parallax foo">
       <?php include 'navbar.php';?>
    
        <div  style="font-size:50px text-align: center; position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: black;">
           
            <h1 class="animated rubberBand" >MY MEDICAL REPORT</h1>
            <p>A management system where you can easily manage record</p>
            
            <?php if(isset($_SESSION['pid'])==true)
             { 
            ?>
               <a class="btn btn-success" style="text-align: center" href="viewpatientdetails.php">View Your Record</a>
            <?php 
             } 
             else
             { 
            ?>
               <a class="btn btn-success" style="text-align: center" href="login.php">Login To View Data</a> 
            <?php 
             } 
            ?>
            
        </div>
  </div>                 
  </body>
</html>