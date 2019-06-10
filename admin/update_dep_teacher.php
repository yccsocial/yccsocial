<?php
session_start();
include('core/init.php');
if(isset($_POST['insert'])){
    $name = htmlspecialchars($_POST["name"],ENT_QUOTES); 
    $position= htmlspecialchars($_POST["position"],ENT_QUOTES); 
    $email=htmlspecialchars($_POST["email"],ENT_QUOTES);
    $phone_no=htmlspecialchars($_POST["phone_no"],ENT_QUOTES); 
    $family_for=htmlspecialchars($_POST["family_for"],ENT_QUOTES);
    $coordinator_for=htmlspecialchars($_POST["coordinator"],ENT_QUOTES);
    $class_count=htmlspecialchars($_POST["class_count"],ENT_QUOTES);
    $count=0;
    $id = htmlspecialchars($_POST["id"],ENT_QUOTES); 
    $token = htmlspecialchars($_POST["tok"],ENT_QUOTES); 
    $res=$post->updateDepTeacher($id,$name,$position,$email,$phone_no,$family_for,$coordinator_for);
    echo $res;
    /*if($res==0){
        $fail_family= "t";
        header("location:update_dep_teacher.php?tok=$token&&tch_id=$id&&fail_family=$fail_family"); 
        exit();
    }*/
    for($i=0;$i<$class_count;$i++){  
        $class=htmlspecialchars($_POST["class".$i],ENT_QUOTES);
        $subject=htmlspecialchars($_POST["subject".$i],ENT_QUOTES);
        $code=htmlspecialchars($_POST["code".$i],ENT_QUOTES);
        $teach_id=htmlspecialchars($_POST["teach_id".$i],ENT_QUOTES);
        $sub_id_org= htmlspecialchars($_POST["subject_id_org".$i],ENT_QUOTES);
        $class_id_org= htmlspecialchars($_POST["class_id_org".$i],ENT_QUOTES);
        $class_id_res=$post->selectClassId($class);
        if($class_id_res>0){
           $sub_code_res=$post->selectCodeId($code);
            echo $sub_code_res."ha";
            if($sub_code_res>0){
                $res=$post->updateClass($id,$class,$class_id_org,$teach_id);
                $res1=$post->updateCode($id,$code,$sub_id_org,$teach_id);
                $count++;
               
            }
            else{
                $fail_code="t"; 
                header("location:update_dep_teacher.php?tok=$token&&tch_id=$id&&fail_code=$fail_code");
            }
        }
        else{
            $fail_sub= "t";
            header("location:update_dep_teacher.php?tok=$token&&tch_id=$id&&fail_class=$fail_sub");
        }
        $res=$post->updateClass($id,$class,$class_id_org);
        $res1=$post->updateCode($id,$code,$sub_id_org);
        var_dump($res);    
    }
    if($class_count==$count){
        header("location:manage.php?id=$_POST[tok]&&SEDT");
    }
    /*$id = htmlspecialchars($_POST["id"],ENT_QUOTES); 
    $post->updateDepTeacher($name,$positon,$phone_no,$family_for,$)*/
    /*$status=$post->updateTeacher($id,$name,$position,$phone_no,$sub_code);*/
    
}

 if($_GET['tok']==$_SESSION['token']){
     $id=$_GET['tch_id'];
     $token=$_GET['tok'];
     $result=$post->selectTeacherById($id); 
     $teach_classes=$result[0]['teach_classes'];
     $teach_classes_arr=explode(",",$teach_classes);
     $sub_code=$result[0]['subject_code'];
     $test=$result[0]['name'];?>
    <?php 
   
     $sub_code_arr=explode(",",$sub_code);
     
 
?>
<?php
     if(!empty($_GET['fail_code'])){
         echo "this code is not found in list";
     }
     if(!empty($_GET['fail_class'])){
         echo "This class is not found in list";
     }
     if(!empty($_GET['fail_family'])){
         echo "This class is not found in list for family";
     }
?>

<form  action="update_dep_teacher.php" method="post">
    <div class="form-group">
        <label for="name">Name : </label>
        <input type="text" class="form-control" name="name" id="Name" value="<?php echo $result[0]['name'];?>">
    </div>
    <div class="form-group">
        <label for="name">Position : </label>
        <input type="text" class="form-control" name="position" value="<?php echo $result[0]['position'];?>">
    </div>
    <div class="form-group">
        <label for="email">Email : </label>
        <input type="email" class="form-control" name="email" id="Email" value="<?php echo $result[0]['email'];?>">
        <input type="hidden" name="id" id="id" value="<?php echo $result[0]['teacher_id'];?>"/>  
        <input type="hidden" name="tok" id="tok" value="<?php echo $token;?>">
       
    </div>
    <div class="form-group">
        <label for="name">Phone no : </label>
        <input type="text" class="form-control" name="phone_no" id="Phone_no" value="<?php echo $result[0]['phone_no'];?>">
    </div>
    <div class="form-group">
        <label for="name">Coordinator : </label>
        <input type="text" class="form-control" name="coordinator" id="Coordinator" value="<?php echo $result[0]['coordinator'];?>">
    </div>
    <div class="form-group">
       <?php $family_id=$result[0]['family_teacher'];
             $cla_name=$post->selectClassName($family_id);
       ?>
        <label for="name">Family-For : </label>
        <input type="text" class="form-control" name="family_for" id="family_for" value="<?php echo $cla_name[0]['class_name'];?>">
    </div>
    <?php 
    
     $count=$post->selectCount($result[0]['teacher_id']);
     
     for($i=0;$i<$count;$i++){ ?>
    <div class="form-group">
        <label for="name">Subject<?= $i+1 ?>: </label>
       <input type="hidden" class="form-control" name="teach_id<?php echo $i;?>" value="<?php echo $result[$i]['teach_id'];?>">
        
        <b><?php echo $result[$i]['subject_name'];?></b>
        <input type="hidden" name="subject_id_org<?php echo $i;?>" value="<?php echo $result[$i]['subject_id'];?>">
        <input type="hidden" name="class_id_org<?php echo $i;?>" value="<?php echo $result[$i]['class_id'];?>">
        <input type="text" class="form-control" name="code<?php echo $i;?>" value="<?php echo $result[$i]['subject_code'];?>">
        <input type="text" class="form-control" name="class<?php echo $i;?>" value="<?php echo $result[$i]['class_name'];?>">
    </div>
    <?php } ?>
    
    <input type="hidden" name="class_count" value="<?php echo $count;?>">
    <input type="submit" name="insert"  value="Update" class="btn btn-success" /> 

</form>
<?php } 



