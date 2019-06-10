<?php
session_start();
include('core/init.php');
if(isset($_POST['submit']) && $_POST['tok'] == $_SESSION['token']) {
    $newPwd=$_POST['new_pwd'];
    $rePwd=$_POST['retype_pwd'];
    $name=$_POST['name'];
    if($newPwd==$rePwd){ 
        $pass_sha = hash("sha512", $newPwd);
        if (strpos($name, '-') !== false) {
            $table = substr($name,0,1)."student";
            $result=$post->updatePassword($table,$name,"roll_no",$pass_sha);
            if($result>0){
                session_destroy();
                header("location:login.php");  
            }
            else{
                header('Location: forgot_pass.php');
            }
        }
        else{ 
            $result=$post->updatePassword("teacher",$name,"email",$pass_sha);
           if($result>0){
                session_destroy();
               header("location:login.php");  
           }
           else{
            header('Location: forgot_pass.php');
        }
        }
       
    }
    else{
        header("location:new_password.php?tok=$_POST[tok]");
    }
    
    
    
    
}
else{
   
}