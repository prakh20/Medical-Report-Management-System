<?php
session_start();
 # Init the MySQL Connection
 $host="localhost";
 $user="root";
 $password="";
 $error="";
 $db="medical_report";

 $conn=mysqli_connect($host,$user,$password,$db);
?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<style>
#b{
  border: none;
  outline: none;
  height: 40px;
  background: #b80f22;
  color: #fff;
  font-size: 18px;
  border-radius: 20px;
  width:100%;
}

#b:hover {
  cursor: pointer;
  background: #ffc107;
  color: #000;
}

a {
  text-decoration: none;
  font-size: 12px;
  line-height: 20px;
  color: blue;
  font-size:large;
}

a:hover {
  color: red;
}
	</style>
 
</head>
<body>

<h2><center>UPDATE DETAILS!!!</center></h2><br>
<form id="a" action="" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label >Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter new email..." required>
    </div>
    <div class="form-group col-md-6">
      <label>Phone</label>
      <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter new phone number..." required>
    </div>
  </div>
  <button type="submit" class="btn btn-primary" id="b" name="btn" value="update" >UPDATE</button>


  <a href="hindex.php"><center>Dont want to update!</center></a><br>
</form>
</body>
</html>
<?php
 if(isset($_POST['btn'])) 
 {

   if(! $conn ) 
   {
      die('Could not connect: ' . mysql_error());
   } 
   if((!empty($_POST['email'])) && (!empty($_POST['phone'])))
   {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $id=$_SESSION['hid'];

   
    $sql = "UPDATE hospital SET email = '$email',phone = '$phone' WHERE hid=$id" ;
   
    $retval = mysqli_query( $conn,$sql);
   
    if(! $retval ) 
    {
     echo '<script type="text/JavaScript">  
     alert("Not Updated!") 
     </script>' ;
    }
    else{

    
     header('location:hdetails.php');
     }
    }
}
?>
 