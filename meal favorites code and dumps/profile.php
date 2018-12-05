<?php
include 'DB.php';
 
$conn = OpenCon();
 
echo "Connected Successfully";
 
CloseCon($conn);
 
?>