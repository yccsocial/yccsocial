<?php
session_start();
include('core/init.php');
$token=$_GET['tok'];
if($_GET['tok'] == $_SESSION['token']) {
    $name=$_GET['username'];
    $email=$_GET['email'];
    $dep_id=$_GET['dep_id'];
    $position=$_GET['position'];
    $phone=$_GET['phone'];
    $res = $post -> create('teacher',array(
        'name' => $name,
        'position' => $position,
        'email' => $email,
        'phone_no' => $phone,
        'department_id'=>$dep_id));
    
    var_dump($res) ;
    
    /*if($res){
        header("location:hod_index.php?id=$token&&sd");
    }
    else{
        header("location:hod_index.php?id=$token&&fd");
    }*/
}
?>