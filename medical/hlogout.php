<?php
    
    session_start();
    
    session_destroy();
    
   header ("Location: hindex.php");
?>