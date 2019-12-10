<?php
session_start();

 # Init the MySQL Connection
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
     ?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<style>
  table{
    margin-top:150px;
  }
	#b{
  border: none;
  outline: none;
  height: 40px;
  background: #b80f22;
  color: #fff;
  font-size: 18px;
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
#search{
    margin-top:80px;
    margin-left:580px;
}
#p{
  margin-top:80px;
}

</style>
 
</head>
<body>
<form method="post">
<div class="form-row">
    <input type="text" class="form-control" id="p" name="pid" placeholder="Enter PID..." required>
</div>
<select class="mdb-select md-form colorful-select dropdown-primary" name="search" id="search">
<option value=" ">Search</option>
<option value="RDoctorName">Report by Doctor Name</option>
<option value="RDoctorId">Report by Doctor ID</option>
<option value="RHospitalName">Report by Hospital Name</option>
<option value="RHospitalId">Report by Hospital ID</option>
<option value="TDoctorName">Test by Doctor Name</option>
<option value="TDoctorId">Test by Doctor ID</option>
<option value="THospitalName">Test Hospital Name</option>
<option value="THospitalId">Test Hospital ID</option>
 </select>
 <br><br>
 <div class="input-group md-form form-sm form-1 pl-0">
  <div class="input-group-prepend">
    <span class="input-group-text purple lighten-3" id="basic-text1"><i class="fas fa-search text-white"
        aria-hidden="true"></i></span>
  </div>
  <input class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search" name="sos" required>
</div><br>
<input type="submit" class="btn btn-primary" id="b" name="btn" value="Search" >

</form>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">DID</th>
      <th scope="col">DNAME</th>
      <th scope="col">HID</th>
      <th scope="col">HNAME</th>
	    <th scope="col">ADDRESS</th>
      <th scope="col">DATE</th>
      <th scope="col">TYPE</th>
      <th scope="col">NAME</th>
      <th scope="col">DESCRIPTION</th>
      
	  
      
	  
    </tr>
  </thead>
  <tbody>
  <?php
    if(isset($_POST['btn']))
     { 
      if(!empty($_POST['pid']))
      {
        
        $selected = $_POST['search'];
    
         
       if($selected=="RDoctorId")
      {
            $id=$_POST['pid'];
            $var=$_POST['sos'];
          $sql="SELECT d.did,d.name as dname,h.hid,h.name as hname,hd.address,report_type,report_name,report_description,date from patient as p, doctor as d,hospital as h,hos_location as hd,report_paper as rp where d.did=$var and h.hid=d.hid and h.hid=hd.hid and p.pid=$id and p.pid=rp.pid and d.did=rp.did";
          $selectRes=mysqli_query($conn,$sql);
          if( mysqli_num_rows( $selectRes )==0 )
          {
              echo '<tr><td colspan="4">No Data Found</td></tr>';
          }
          else{
              while( $row = mysqli_fetch_assoc( $selectRes ) )
              {
                echo "<tr><td>{$row['did']}</td><td>{$row['dname']}</td><td>{$row['hid']}</td><td>{$row['hname']}</td><td>{$row['address']}</td><td>{$row['date']}</td><td>{$row['report_type']}</td><td>{$row['report_name']}</td><td>{$row['report_description']}</td></tr>\n";
              }
        }
      }
     elseif($selected=="RDoctorName")
     {
           $id=$_POST['pid'];
           $var=$_POST['sos'];
         $sql="SELECT d.did,d.name as dname,h.hid,h.name as hname,hd.address,report_type,report_name,report_description,date from patient as p, doctor as d,hospital as h,hos_location as hd,report_paper as rp where d.name like '%$var%' and h.hid=d.hid and h.hid=hd.hid and p.pid=$id and p.pid=rp.pid and d.did=rp.did";
         $selectRes=mysqli_query($conn,$sql);
         if( mysqli_num_rows( $selectRes )==0 )
         {
             echo '<tr><td colspan="4">No Data Found</td></tr>';
         }
         else{
             while( $row = mysqli_fetch_assoc( $selectRes ) )
             {
               echo "<tr><td>{$row['did']}</td><td>{$row['dname']}</td><td>{$row['hid']}</td><td>{$row['hname']}</td><td>{$row['address']}</td><td>{$row['date']}</td><td>{$row['report_type']}</td><td>{$row['report_name']}</td><td>{$row['report_description']}</td></tr>\n";
             }
       }
    }
    elseif($selected=="RHospitalName")
    {
          $id=$_POST['pid'];
          $var=$_POST['sos'];
        $sql="SELECT d.did,d.name as dname,h.hid,h.name as hname,hd.address,report_type,report_name,report_description,date from patient as p, doctor as d,hospital as h,hos_location as hd,report_paper as rp where h.name like '%$var%' and h.hid=d.hid and h.hid=hd.hid and p.pid=$id and p.pid=rp.pid and d.did=rp.did";
        $selectRes=mysqli_query($conn,$sql);
        if( mysqli_num_rows( $selectRes )==0 )
        {
            echo '<tr><td colspan="4">No Data Found</td></tr>';
        }
        else{
            while( $row = mysqli_fetch_assoc( $selectRes ) )
            {
              echo "<tr><td>{$row['did']}</td><td>{$row['dname']}</td><td>{$row['hid']}</td><td>{$row['hname']}</td><td>{$row['address']}</td><td>{$row['date']}</td><td>{$row['report_type']}</td><td>{$row['report_name']}</td><td>{$row['report_description']}</td></tr>\n";
            }
      }
     }
   elseif($selected=="RHospitalId")
   {
         $id=$_POST['pid'];
         $var=$_POST['sos'];
       $sql="SELECT d.did,d.name as dname,h.hid,h.name as hname,hd.address,report_type,report_name,report_description,date from patient as p, doctor as d,hospital as h,hos_location as hd,report_paper as rp where h.hid=$var and h.hid=d.hid and h.hid=hd.hid and p.pid=$id and p.pid=rp.pid and d.did=rp.did";
       $selectRes=mysqli_query($conn,$sql);
       if( mysqli_num_rows( $selectRes )==0 )
       {
           echo '<tr><td colspan="4">No Data Found</td></tr>';
       }
       else{
           while( $row = mysqli_fetch_assoc( $selectRes ) )
           {
             echo "<tr><td>{$row['did']}</td><td>{$row['dname']}</td><td>{$row['hid']}</td><td>{$row['hname']}</td><td>{$row['address']}</td><td>{$row['date']}</td><td>{$row['report_type']}</td><td>{$row['report_name']}</td><td>{$row['report_description']}</td></tr>\n";
           }
       }
     } 
  elseif($selected=="TDoctorName")
  {
        $id=$_POST['pid'];
        $var=$_POST['sos'];
      $sql="SELECT d.did,d.name as dname,h.hid,h.name as hname,hd.address,test_type,test_name,test_description,date from patient as p, doctor as d,hospital as h,hos_location as hd,test as rp where d.name like '%$var%' and h.hid=d.hid and h.hid=hd.hid and p.pid=$id and p.pid=rp.pid and d.did=rp.did;";
      $selectRes=mysqli_query($conn,$sql);
      if( mysqli_num_rows( $selectRes )==0 )
      {
          echo '<tr><td colspan="4">No Data Found</td></tr>';
      }
      else{
          while( $row = mysqli_fetch_assoc( $selectRes ) )
          {
            echo "<tr><td>{$row['did']}</td><td>{$row['dname']}</td><td>{$row['hid']}</td><td>{$row['hname']}</td><td>{$row['address']}</td><td>{$row['date']}</td><td>{$row['test_type']}</td><td>{$row['test_name']}</td><td>{$row['test_description']}</td></tr>\n";
          }
    }
 }
 elseif($selected=="TDoctorId")
 {
       $id=$_POST['pid'];
       $var=$_POST['sos'];
     $sql="SELECT d.did,d.name as dname,h.hid,h.name as hname,hd.address,test_type,test_name,test_description,date from patient as p, doctor as d,hospital as h,hos_location as hd,test as rp where d.did=$var and h.hid=d.hid and h.hid=hd.hid and p.pid=$id and p.pid=rp.pid and d.did=rp.did;";
     $selectRes=mysqli_query($conn,$sql);
     if( mysqli_num_rows( $selectRes )==0 )
     {
         echo '<tr><td colspan="4">No Data Found</td></tr>';
     }
     else{
         while( $row = mysqli_fetch_assoc( $selectRes ) )
         {
          echo "<tr><td>{$row['did']}</td><td>{$row['dname']}</td><td>{$row['hid']}</td><td>{$row['hname']}</td><td>{$row['address']}</td><td>{$row['date']}</td><td>{$row['test_type']}</td><td>{$row['test_name']}</td><td>{$row['test_description']}</td></tr>\n";
         }
   }
}
elseif($selected=="THospitalName")
{
      $id=$_POST['pid'];
      $var=$_POST['sos'];
    $sql="SELECT d.did,d.name as dname,h.hid,h.name as hname,hd.address,test_type,test_name,test_description,date from patient as p, doctor as d,hospital as h,hos_location as hd,test as rp where h.name like '%$var%' and h.hid=d.hid and h.hid=hd.hid and p.pid=$id and p.pid=rp.pid and d.did=rp.did;";
    $selectRes=mysqli_query($conn,$sql);
    if( mysqli_num_rows( $selectRes )==0 )
    {
        echo '<tr><td colspan="4">No Data Found</td></tr>';
    }
    else{
        while( $row = mysqli_fetch_assoc( $selectRes ) )
        {
          echo "<tr><td>{$row['did']}</td><td>{$row['dname']}</td><td>{$row['hid']}</td><td>{$row['hname']}</td><td>{$row['address']}</td><td>{$row['date']}</td><td>{$row['test_type']}</td><td>{$row['test_name']}</td><td>{$row['test_description']}</td></tr>\n";
        }
  }
}
elseif($selected=="THospitalId")
{
     $id=$_POST['pid'];
     $var=$_POST['sos'];
   $sql="SELECT d.did,d.name as dname,h.hid,h.name as hname,hd.address,test_type,test_name,test_description,date from patient as p, doctor as d,hospital as h,hos_location as hd,test as rp where h.hid=$var and h.hid=d.hid and h.hid=hd.hid and p.pid=$id and p.pid=rp.pid and d.did=rp.did;";
   $selectRes=mysqli_query($conn,$sql);
   if( mysqli_num_rows( $selectRes )==0 )
   {
       echo '<tr><td colspan="4">No Data Found</td></tr>';
   }
   else{
       while( $row = mysqli_fetch_assoc( $selectRes ) )
       {
         echo "<tr><td>{$row['did']}</td><td>{$row['dname']}</td><td>{$row['hid']}</td><td>{$row['hname']}</td><td>{$row['address']}</td><td>{$row['date']}</td><td>{$row['test_type']}</td><td>{$row['test_name']}</td><td>{$row['test_description']}</td></tr>\n";
       }
 }
}
}
  }
?>
  </tbody>
  </table>
</body>
</html>
