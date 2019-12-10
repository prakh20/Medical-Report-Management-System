<?php
    $host="localhost";
    $user="root";
    $password="";
    $error="";
    $db="medical_report";

    $conn=mysqli_connect($host,$user,$password,$db);
    if(!$conn)
    {
        echo mysqli_error_list();
    }
    if(isset($_POST['login']))
    {
      if((!empty($_POST['hid'])) && (!empty($_POST['password'])) && (!empty($_POST['did'])))
      {
          $did=$_POST['did'];
        $hid=$_POST['hid'];
        $pass=$_POST['password'];
        
        $query=mysqli_query($conn,"select * from doctor d,hospital h where d.did='".$did."' and h.hid='".$hid."' and h.password='".$pass."' and h.hid=d.hid") ;
        $res=mysqli_fetch_row($query);
        if($res)
        {
          session_start(); 
         $_SESSION['did']=$did;
         header('location:dindex.php');
         exit();
        }
        else
        {
          echo '<script type="text/JavaScript">  
          alert("Invalid DID or HID or Password!") 
          </script>' ;
        }
      }
      
      
     
    }
      
?>



<!DOCTYPE html>
<html>


  <head>
<style>
body {
  margin: 0;
  padding: 0;
  background: url("f.jpg") no-repeat center top;
  background-size: cover;
  font-family: sans-serif;
  height: 100vh;
}

.login-box {
  width: 320px;
  height: 450px;
  background: #000;
  color: #fff;
  top: 50%;
  left: 80%;
  position: absolute;
  transform: translate(-50%, -50%);
  box-sizing: border-box;
  border-radius: 15px 50px 30px;
  padding: 50px 30px;
  border-color:white;
}


.login-box h1 {
  margin:0;
  padding: 0 0 10px;
  text-align: center;
  font-size: 22px;
}

.login-box label {
  margin:0 ;
  padding: 0;
  font-weight: bold;
  display: block;
}

.login-box input {
  width: 100%;
  margin-bottom: 20px;
}

.login-box input[type="tel"], .login-box input[type="password"] {
  border: none;
  border-bottom: 1px solid #fff;
  background: transparent;
  outline: none;
  height: 40px;
  color: #fff;
  font-size: 16px;
}

.login-box input[type="submit"] {
  border: none;
  outline: none;
  height: 40px;
  background: #b80f22;
  color: #fff;
  font-size: 18px;
  border-radius: 20px;
}

.login-box input[type="submit"]:hover {
  cursor: pointer;
  background: #ffc107;
  color: #000;
}

.login-box a {
  text-decoration: none;
  font-size: 12px;
  line-height: 20px;
  color: darkgrey;
}

.login-box a:hover {
  color: #fff;
}

</style>
<script>

</script>
    
    
  </head>
  <body>

    <div class="login-box">
      
      <h1>Login Here</h1><br>
      
      <form action="" method="POST">

      <p><input type="tel"placeholder="Enter Your DID.." pattern=[0-9]{4} oninput="this.className = ''" name="did" required></p>
      <p><input type="tel"placeholder="Enter Your HID.." pattern=[0-9]{4} oninput="this.className = ''" name="hid" required></p>
    <p><input type="password" placeholder="Password..." oninput="this.className = ''" name="password" required> </p>
        <input type="submit" value="Log In" name="login">
        
	   
        
      </form>
    </div>
  </body>
</html>


