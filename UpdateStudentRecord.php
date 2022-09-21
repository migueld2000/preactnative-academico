<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

include 'DBConfig.php';
 
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
$json = file_get_contents('php://input');
 
$obj = json_decode($json,true);
 
$S_ID = $obj['student_id'];
 
$S_Name = $obj['student_name'];
 
$S_Class = $obj['student_class'];
 
$S_Phone_Num = $obj['student_phone_num'];
 
$S_Email = $obj['student_email'];

 
$Sql_Query = "UPDATE StudentDetailsTable SET student_name= '$S_Name', student_class = '$S_Class', student_phone_num = '$S_Phone_Num', student_email = '$S_Email'WHERE student_id = $S_ID";
 
 if(mysqli_query($con,$Sql_Query)){
 
$MSG = 'El estudiante ha sido actualizado correctamente ...' ;
  
 }
 else{
 
$MSG = 'Inténtelo de nuevo';
 
 }
 $json = json_encode($MSG);
 echo $json ;
 mysqli_close($con);
?>