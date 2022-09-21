<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
// Importar la conexion
include 'DBConfig.php';
 
// Conectar a la base de datos
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 // Obteniendo los datos en la variable $json.
 $json = file_get_contents('php://input');
 
 // Decodificando los datos en formato JSON en la variables $obj.
 $obj = json_decode($json,true);
 
 // Crear variables por cada campo.
 $S_Name = $obj['student_name'];
 
 $S_Class = $obj['student_class'];
 
 $S_Phone_Num = $obj['student_phone_num'];
 
 $S_Email = $obj['student_email'];
 
 // Instrucción SQL para agregar el estudiante.
 $Sql_Query = "insert into StudentDetailsTable (student_name,student_class,student_phone_num,student_email ) values ('$S_Name','$S_Class','$S_Phone_Num','$S_Email')";
 
 
 if(mysqli_query($con,$Sql_Query)){
 
$MSG = 'Estudiante registrado correctamente...' ;
 
//$json = json_encode($MSG);
 

 //echo $json ;
 
 }
 else{
 
$MSG='Inténtelo de nuevo...';
 
 }
 $json = json_encode($MSG);
 echo $json;
 mysqli_close($con);
?>