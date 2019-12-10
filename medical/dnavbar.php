<?php
     $host="localhost";
     $user="root";
     $password="";
     $error="";
     $db="medical_report";
 
     $conn=mysqli_connect($host,$user,$password,$db);
    if(isset($_SESSION['did'])==false) {
        
?>  
  
  <div class="container">
      
         <nav class="navbar navbar-inverse navbar-fixed-top gabanav">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>

            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav gabali">
                <li><a href="dindex.php">Home</a></li>
                
                
              </ul>
              <ul class="nav navbar-nav navbar-right">
                
                <li><a href="dlogin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
              </ul>
            </div> 

            </div>   
        </nav>
             
      
       
  </div>
   
       
    <?php } else { ?> 
    <div class="container">
       <nav class="navbar navbar-inverse navbar-fixed-top gabanav">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>

            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav gabali">
                <li><a href="dindex.php">Home</a></li>
                
                <li><a href="ddetail.php?id=<?php echo $_SESSION['did']; ?>">My Account</a></li>
               

              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="dlogout.php"><span class="glyphicon glyphicon-user"></span> Log Out</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Welcome 
                <?php 
                $id=$_SESSION['did'];
                $query=mysqli_query($conn,"select name from doctor where did='".$id."'") ;
                $user = mysqli_fetch_assoc($query);
                print_r($user['name']);
              
                
        ?></a></li>
              
              </ul>
            </div> 

        </div> 
      
    </nav> 
    </div>
    
    
    <?php } ?> 
    
    
    
    
   
    
    