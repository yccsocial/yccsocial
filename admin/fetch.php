<?php  
//fetch.php  
$connect = mysqli_connect("localhost", "root", "root", "utycc_social");  
if(isset($_POST["employee_id"]))  
{  
    $table=$_POST['table'];
    $query = "SELECT * FROM $table WHERE id = '".$_POST["employee_id"]."'";  
    $result = mysqli_query($connect, $query);  
    /*$row = mysqli_fetch_array($result); */ 
    /*echo json_encode($row);*/
    $output='';
    $name='';
    $email='';
    $image='';
    while($row = mysqli_fetch_assoc($result)){
      $name=$row['name'];
      $email=$row['email'];
      $id=$row['id'];
      $image=$row['profile']; 
    }
    $output='<img class="profile-image rounded-circle editProfileImg" src="../img/'.$image.'" id="image" width="200px" height="200px" alt=""><br>
        <div class="editimgSizeAlert text-danger"></div>
        <a href="#" role="button" class="btn btn-outline-dark btn-sm rounded-pill mt-2" onclick="triggerClick(editprofileImgValue)"><span class="fas fa-edit mr-2"></span>Upload</a>
        <a href="#" role="button" class="btn btn-outline-danger btn-sm rounded-pill mt-2 cleareditProfileImg"><span class="fas fa-trash mr-2"></span>Delete</a>
        <div class="separator mt-4 text-left d-flex flex-row align-items-center">
        <span class="mr-3">Username</span>
        <hr class="flex-grow-1">
        </div>
        <input class="form-control mb-2" type="text" name="name" value="'.$name.'" id="name" placeholder="Enter username">

        <div class="separator d-flex flex-row align-items-center">
        <span class="mr-3">Email</span>
        <hr class="flex-grow-1">
        </div>
        <input class="form-control mb-2" type="email" name="email" value="'.$email.'" id="email" placeholder="Enter email address">
        <input type="hidden" name="id" id="id" value="'.$id.'" />  
        <input class="editprofileImgValue" type="file" name="profile_image" accept="image/*" hidden>
        <input id="change-profile" type="submit" value="" hidden>
        ';
    
    echo $output;
    
}  
?>