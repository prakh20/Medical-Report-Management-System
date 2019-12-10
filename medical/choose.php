<html>
<head>
<title>Selection</title>
<style>
body {
  background-image: url("b.jpg");
  margin-top:250px ;
  margin-left: 250px;
  padding:50px;
  background-size: cover;
  font-family: sans-serif;
  height: 100vh;
}
.login-box a input[type="submit"] {
  border: none;
  outline: none;
  width:250px;
  height: 60px;
  background: #b80f22;
  color: #fff;
  font-size: 18px;
  border-radius: 20px;
 

}

.login-box input[value="PATIENT"]:hover {
  
  cursor: pointer;
  background: #205BE5;
  color: #000;
}
.login-box input[value="DOCTOR"]:hover {
  
  cursor: pointer;
  background: #ffc107;
  color: #000;
}
.login-box input[value="ADMIN"]:hover {
  
  cursor: pointer;
  background: #1C9D29;;
  color: #000;
}
.aa{
  margin-top:50px;
  margin-left: 340px;
}
.dot {
  height: 25px;
  width: 25px;
  background-color: #205BE5;
  border-radius: 50%;
  display: inline-block;
}
.dot1 {
  height: 25px;
  width: 25px;
  background-color:#FEFE01;
  border-radius: 50%;
  display: inline-block; 
}
.dot2 {
  height: 25px;
  width: 25px;
  background-color: #1C9D29;
  border-radius: 50%;
  display: inline-block; 
}
</style>
</head>
<body>
<div class="login-box">
  <a href="login.php"><input type="submit" value="PATIENT"></a> 
  <a href="dlogin.php"><input type="submit" value="DOCTOR"></a>
  <a href="hlogin.php"><input type="submit" value="ADMIN"> </a>
</div>
<div class="aa">
  <span class="dot"></span>
  <span class="dot1"></span>
  <span class="dot2"></span>
</div>
</body>
</html>