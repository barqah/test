<?php

	   $dbhost = 'localhost'; 
$dbuser = 'root';     // ini berlaku di xampp
$dbpass = '';         // ini berlaku di xampp
$dbname = 'testbarqah';
// melakukan koneksi ke database
$connect = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

	   $username = $_POST['username']; 
	   $confirmpassword = $_POST['confirmpassword']; 
       $created = date('Y-m-d H:i:s');
       $updated = date('Y-m-d H:i:s');
       $salt = getSalt();
	   $password=$_POST['password'];
	   $passwordmd5 = md5($password . $salt);
       
  
       if(!empty($username) and (!empty($password))){ 
            $sql="INSERT INTO users (username,password,salt,is_active,created,updated) VALUES ('$username','$passwordmd5','$salt','1','$created','$updated')";
              
           if (mysqli_query($connect, $sql)) {
               echo "New record created successfully";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($connect);
            }
       }
  
function getSalt() {
     $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
     $randStringLen = 5;

     $randString = "";
     for ($i = 0; $i < $randStringLen; $i++) {
         $randString .= $charset[mt_rand(0, strlen($charset) - 1)];
     }

     return $randString;
}
?>