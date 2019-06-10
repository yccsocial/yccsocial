<?php
session_start();
include('core/init.php');
if($_GET['tok']==$_SESSION['token']){
    $id=$_GET['tch_id'];
    $token=$_GET['tok'];
    echo $id;
    $res=$post->deleteDepTch($id);
    var_dump($res);
    if($res>0){
        deleteTeachWithTchId($id);
        header("location:hod_user.php?id=$_POST[tok]&&sdt");
    }
    else{
        echo "error";
    }
}