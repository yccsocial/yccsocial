<?php
session_start();
include('core/init.php');
if($_GET['tok']==$_SESSION['token']){
    $id=$_GET['tid'];
    $token=$_GET['tok'];
    $teach_id=$_GET['teach_id'];
    $res=$post->deleteTeach($teach_id);
    echo $res;
    if($res > 0){
        echo $res;
        header("location:edit.php?tok=$token&&tch_id=$id");
    }
}

?>