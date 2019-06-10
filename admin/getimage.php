
<?php
include("core/init.php");
if(isset($_POST["key_id"])){
    $id = $_POST["key_id"];
    $result_post =  $post->selectPostsForStudentId($id);
        $photo = $result_post[0]['photo'];
        $photo_array = explode(",",$photo);
        $photo_count = sizeof($photo_array);
        $output = "$id";
        for($i = 0 ; $i<$photo_count;$i++){
            $output .= "<div class='pt-4 pl-5 pr-5 pb-5 mySlides' style='width: 100%;height: 100%;display:block;'>
            <img src='../img/$photo_array[$i]' style='width: 100%;height:98%;'>
          </div>";
        }
        echo $output;
}
else{
    header("location: login.php");
}
?>