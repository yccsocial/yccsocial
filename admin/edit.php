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
    $number = count($_POST["newCode"]);
    echo $number."alfj";
   
    for($i=0; $i<$number; $i++)  {
        if($_POST['newCode'][$i]!="Choose code"){
            if($_POST['newClass'][$i]!="Choose class"){
                if($_POST['newCode'][$i]!=''){
                  if($_POST['newClass'][$i]!=''){
                      echo $_POST['newCode'][$i]."<br>";
                     echo $post->insertNewTeach($id,$_POST['newCode'][$i],$_POST['newClass'][$i]);
                  }  
                }
                
            }
        }
    }
    
    
    $res=$post->updateDepTeacher($id,$name,$position,$email,$phone_no,$family_for,$coordinator_for);
    echo $res."REs";
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
            
            if($sub_code_res>0){
                $res=$post->updateClass($id,$class,$class_id_org,$teach_id);
                $res1=$post->updateCode($id,$code,$sub_id_org,$teach_id);
                $count++;

            }
            else{
                $fail_code="t"; 
                header("location:edit.php?tok=$token&&tch_id=$id&&fail_code=$fail_code");
            }
        }
        else{
            $fail_sub= "t";
            header("location:edit.php?tok=$token&&tch_id=$id&&fail_class=$fail_sub");
        }
        $res=$post->updateClass($id,$class,$class_id_org);
        $res1=$post->updateCode($id,$code,$sub_id_org);  
    }
    if($class_count==$count){
        header("location:edit.php?tok=$token&&tch_id=$id&&SEDT");
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
    $name_null=$result[0]['name'];
    if($name_null==null){
        $result=$post->selectTeacherByIdForNew($id); 
    }
?>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Page-->
    <title>Edit Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Main CSS-->
    <link href="../css/main.css" rel="stylesheet" media="all">
</head>

<body>
         <div class="d-flex justify-content-center">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Edit Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row ">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-9">
                                        <div class="input-group">
                                            <input type="text" class="input--style-5"  name="name" id="Name" value="<?php echo $result[0]['name'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="form-row">
                            <div class="name">Position</div>
                            <div class="value">
                                    <div class="row row-refine">
                                            <div class="col-9">
                                                <div class="input-group">
                                                    <input type="text" class="input--style-5" name="position" value="<?php echo $result[0]['position'];?>">
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                    <div class="row row-refine">
                                            <div class="col-9">
                                                <div class="input-group">
                                                    <input type="email" class="input--style-5" name="email" id="Email" value="<?php echo $result[0]['email'];?>">
                                                    <input type="hidden" name="id" id="id" value="<?php echo $result[0]['teacher_id'];?>"/>  
                                                    <?php if($name_null==null){?>
                                                    <input type="hidden" name="id" id="id" value="<?php echo $result[0]['id'];?>"/>  
  <?php  }
                                                    ?>
                                                    <input type="hidden" name="tok" id="tok" value="<?php echo $token;?>">
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>
                        <div class="form-row">
                                <div class="name">Coordinator</div>
                                <div class="value">
                                        <div class="row row-refine">
                                                <div class="col-9">
                                                    <div class="input-group">
                                                        <input type="text" class="input--style-5" name="coordinator" id="Coordinator" value="<?php echo $result[0]['coordinator'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                        </div>
                        <div class="form-row">
                                <div class="name">Family for</div>
                                <div class="value">
                                       aldjf
                                        <div class="row row-refine">
                                                <div class="col-9">
                                                    <div class="input-group">
                                                        <?php $family_id=$result[0]['family_teacher'];
                                                           $cla_name=$post->selectClassName($family_id);
                                                        ?>
                                                        <input type="text" class="input--style-5" name="family_for" id="family_for" value="<?php echo $cla_name[0]['class_name'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="area_code">
                                            <label class="label--desc">Area Code</label>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="input-group-desc">
                                            <input type="text" class="input--style-5" name="phone_no" id="Phone_no" value="<?php echo $result[0]['phone_no'];?>">
                                            <label class="label--desc">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($name_null==null){?>
                        <div class="col-1">
                            <div class="icon icon-plus" id="plus">

                            </div>


                        </div>
                       <?php }
                        ?>
                        
                        
                        <?php  $count=$post->selectCount($result[0]['teacher_id']);
                               for($i=0;$i<$count;$i++){
                                
                        ?>
                        <div class="form-row m-b-55" id="fade">
                          
                            <div class="name">Subject<?php echo $i+1;?></div>
                            
                            <div class="value">
                                <div class="row row-refine">
                                    
                                    <div class="col-4">
                                        
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="subject1" value="<?php echo $result[$i]['subject_name']; ?>">
                                            <label class="label--desc">Subject</label>
                                            <!--<b><?php echo $result[$i]['subject_name'];?></b>-->
                                        </div>
                                        
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input type="text" class="input--style-5" name="code<?php echo $i;?>" value="<?php echo $result[$i]['subject_code'];?>">
                                            <label class="label--desc">Code</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group-desc">
                                            <input type="text" class="input--style-5" name="class<?php echo $i;?>" value="<?php echo $result[$i]['class_name'];?>">
                                            <label class="label--desc">Class</label>
                                            <input type="hidden" class="form-control" name="teach_id<?php echo $i;?>" value="<?php echo $result[$i]['teach_id'];?>">
                                            <input type="hidden" name="subject_id_org<?php echo $i;?>" value="<?php echo $result[$i]['subject_id'];?>">
                                            <input type="hidden" name="class_id_org<?php echo $i;?>" value="<?php echo $result[$i]['class_id'];?>">
                                            <a href="remove_teach.php?teach_id=<?php echo $result[$i]['teach_id'];?>&&tid=<?php echo $id;?>&&tok=<?php echo $token;?>" style="width:60px;height:60px;">remove</a>
                                        </div>
                                        
                                    </div>
                                   
                                  
                                    <?php if($i+1==$count){ ?>
                                    <div class="col-1">
                                        <div class="icon icon-plus" id="plus">

                                        </div>
                                        

                                    </div>
                       <?php } ?>
                                   
                                </div>
                            </div>
                        </div>
                        <?php } 
                         $codes=$post->selectCodes($result[0]['department_id']);
    
                         $classes=$post->selectClassesFor($result[0]['department_id']);
   
                        ?>
                        
                        <div class="form-row m-b-55 " id="fade1" style="display: none;">
                            <div class="name">Subject</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-4">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="subject1">
                                            <label class="label--desc">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <select name="newCode[]">
                                                <option selected>Choose code</option>
                                                <?php
                                                  for($i=0;$i<count($codes);$i++){ ?>
                                                      <option value="<?php echo $codes[$i]['id'];?>">
                                                          <?php echo $codes[$i]['subject_code'];?>
                                                      </option>
                                                <?php  }
                                                ?>
                                            </select>
                                            <label class="label--desc">Code</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group-desc">
                                            <select name="newClass[]">
                                                <option selected>Choose class</option>
                                                <?php
                                                 for($i=0;$i<count($classes);$i++){ ?>
                                                <option value="<?php echo $classes[$i]['id'];?>">
                                                    <?php echo $classes[$i]['class_name'];?>
                                                </option>
                                                <?php  }
                                                ?>
                                            </select>
                                            <label class="label--desc">Class</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-1">
                                        <div class="icon icon-plus" id="plus1">
                                            
                                        </div>
                                        <div class="icon icon-minus" id="minus1" style="display: none;">
                                            
                                        </div>
                                           
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55 " id="fade2" style="display: none;">
                                <div class="name">Subject</div>
                                <div class="value">
                                    <div class="row row-refine">
                                        <div class="col-4">
                                            <div class="input-group-desc">
                                                <input class="input--style-5" type="text" name="subject3">
                                                <label class="label--desc">Subject</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-group-desc">
                                                <select name="newCode[]">
                                                    <option selected>Choose code</option>
                                                    <?php
                                                     for($i=0;$i<count($codes);$i++){ ?>
                                                    <option value="<?php echo $codes[$i]['id'];?>">
                                                        <?php echo $codes[$i]['subject_code'];?>
                                                    </option>
                                                    <?php  }
                                                    ?>
                                                </select>
                                                <label class="label--desc">Code</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group-desc">
                                                <select name="newClass[]">
                                                    <option selected>Choose class</option>
                                                    <?php
                                                     for($i=0;$i<count($classes);$i++){ ?>
                                                    <option value="<?php echo $classes[$i]['id'];?>">
                                                        <?php echo $classes[$i]['class_name'];?>
                                                    </option>
                                                    <?php  }
                                                    ?>
                                                </select>
                                                <label class="label--desc">Class</label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-1">
                                            <div class="icon icon-plus" id="plus2">
                                                
                                            </div>
                                            <div class="icon icon-minus" id="minus2" style="display: none;">
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="form-row m-b-55 " id="fade3" style="display: none;">
                            <div class="name">Subject</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-4">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="subject3">
                                            <label class="label--desc">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <select name="newCode[]">
                                                <option selected>Choose code</option>
                                                <?php
                                                for($i=0;$i<count($codes);$i++){ ?>
                                                <option value="<?php echo $codes[$i]['id'];?>">
                                                    <?php echo $codes[$i]['subject_code'];?>
                                                </option>
                                                <?php  }
                                                ?>
                                            </select>
                                            <label class="label--desc">Code</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group-desc">
                                            <select name="newClass[]">
                                                <option selected>Choose class</option>
                                                <?php
                                                for($i=0;$i<count($classes);$i++){ ?>
                                                <option value="<?php echo $classes[$i]['id'];?>">
                                                    <?php echo $classes[$i]['class_name'];?>
                                                </option>
                                                <?php  }
                                                ?>
                                            </select>
                                            <label class="label--desc">Class</label>
                                        </div>
                                    </div>

                                    <div class="col-1">
                                        <div class="icon icon-plus" id="plus2">

                                        </div>
                                        <div class="icon icon-minus" id="minus2" style="display: none;">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                           
                            
                            
                            
                        
                        
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="class_count" value="<?php echo $count;?>">

                            <input type="submit" name="insert"  value="Update" class="btn btn--radius-1 btn--blue " /> 
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
    <!-- Jquery JS-->
    <script src="../js/jquery.min.js"></script>
  
    

    <script>
         $(document).ready(function(){
             $("#plus").click(function(){
                $("#fade1").fadeIn(1000);
                $("#plus").hide();
                $("#minus").show();
            });
            $("#plus1").click(function(){
                 $("#fade2").fadeIn(1000);
                 $("#plus1").hide();
                 $("#minus1").show();
                 
            });
            $("#plus2").click(function(){
                 $("#fade3").fadeIn(1000);
                 
            });
            $("#minus").click(function(){
                $("#fade").fadeOut(1000);
            });
            $("#minus1").click(function(){
                $("#fade1").fadeOut(1000);
            });
         });
    </script>

</body>

</html>
<?php } ?>
end document