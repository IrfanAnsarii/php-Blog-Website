<?php 
const base_url = 'http://localhost/blog';
//const base_url = 'http://blog.test/';


try{
    //host
$host="localhost";

//dbname
$dbname="blog";

//user
$user="root";

//pass
$pass="Test@123";

$conn=new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Connection failed".$e->getMessage();
}



// if($conn==true){
//     echo "Connection successful";
// }