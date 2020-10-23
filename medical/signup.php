<?php
    $host="localhost";
    $user="root";
    $password="";
    $db="medical_report";

    $conn=mysqli_connect($host,$user,$password,$db);
    if(!$conn){
        echo mysqli_error_list();
    }

?>

<!DOCTYPE html>


<html>

<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}


input.invalid {
  background-color: #ffdddd;
}


.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}


.step.finish {
  background-color: #4CAF50;
}
</style>
<body>

<form id="regForm" action="" method="POST">
  <h1>Sign Up:</h1>
  
  <div class="tab">Personal Info:
    <p><input type="text" placeholder="Enter Your Name..." oninput="this.className = ''" name="name" autofocus></p>
    <p><input type="text" placeholder="Gender..." oninput="this.className = ''" name="gender"></p>
    <p><input type="text" placeholder="Address..." oninput="this.className = ''" name="address" ></p>
  </div>
  <div class="tab">
    <p><input type="text" placeholder="yyyy-mm-dd" oninput="this.className = ''" name="dob" ></p>
    <p><input type="text" placeholder="Blood Group..." oninput="this.className = ''" name="bloodgroup"></p>
  </div>
  <div class="tab">Contact Info:
    <p><input type="email" placeholder="E-mail..." oninput="this.className = ''" name="email" ></p>
    <p><input type="tel" placeholder="Phone..." oninput="this.className = ''" name="phone" ></p>
  </div>
 
  <div class="tab">Login Info:
    <p><input type="text"placeholder="PID.." pattern=[0-9]{12} oninput="this.className = ''" name="pid" ></p>
    <p><input type="password" placeholder="Password..." oninput="this.className = ''" name="pass" ></p>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>

    </div>
  </div>
 
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
  <a href="login.php"><center>Already have an account?</center></a><br>
</form>

<script>
var currentTab = 0;
showTab(currentTab); 
function showTab(n) {
  
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
    

  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  
  fixStepIndicator(n)
}

function nextPrev(n) {
 
  var x = document.getElementsByClassName("tab");
 
  if (n == 1 && !validateForm()) return false;
  
  x[currentTab].style.display = "none";
  
  currentTab = currentTab + n;
  
  if (currentTab >= x.length) {
    
    document.getElementById("regForm").submit();
    return false;
  }
  
  showTab(currentTab);
}

function validateForm() {
  
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  
  for (i = 0; i < y.length; i++) {
    
    if (y[i].value == "") {
      
      y[i].className += " invalid";
     
      valid = false;
    }
  }
  
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid;
}

function fixStepIndicator(n) {
  
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  
  x[n].className += " active";
}
</script>

</body>
</html>
<?php
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['dob'])&& isset($_POST['address'])&& isset($_POST['phone'])&& isset($_POST['pid'])&& isset($_POST['bloodgroup'])&& isset($_POST['gender']))
{
    
        $n= $_POST['name'];
        $e= $_POST['email'];
        $pa= $_POST['pass'];
        $d= $_POST['dob'];
        $a=$_POST['address'];
        $p=$_POST['pid'];
        $pho=$_POST['phone'];
        $b=$_POST['bloodgroup'];
        $g=$_POST['gender'];
        sum='';
foreach($pa as $item){
   $sum += str(ord($item));
}
    $pa=$sum;
        $sq="INSERT INTO patient (pid, password, name, email, phone, address, dob, gender, bloodgroup) VALUES ('$p','$pa','$n','$e','$pho','$a','$d','$g','$b')";
        $res=$conn->query($sq);
        $result = mysqli_query($conn, "CALL 	determineAge('$d','$p')");
        
        

        
        
        
}


?>
