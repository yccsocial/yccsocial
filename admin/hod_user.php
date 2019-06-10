<?php
/**
 * Created by PhpStorm.
 * User: hninsunyein
 * Date: 11/30/2018
 * Time: 1:09 PM
 */
session_start();
if(!isset($_SESSION['admin_pass']) && !isset($_SESSION['admin_name'])) {
 header("location: login.php");
exit();
}
else if(isset($_GET['id']) == $_SESSION['token']){
  $email = $_SESSION['admin_name'];
  $pass = $_SESSION['admin_pass'];
  $token = $_SESSION['token'];
  include("core/init.php");
  $result =  $post -> selectUser("teacher","email", $email, $pass);
    $id = $result[0]['id'];
    $name = $result[0]['name'];
    $hod_id = $result[0]['department_id'];
    $position = $result[0]['position'];
    
    if(!($position == "major_hod" || $position == "hod")){
      session_destroy();
      header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<link rel="stylesheet" href="../css/master.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
<title>Admin | Manage Users</title>

</head>
<body class="bg-light">
  <div class="loader d-none">
    <img src="../img/loader.png" width="100px" alt="">
  </div>
  <section class="bg-white py-3 shadow-sm border-bottom">
    <div class="container">
      <div class="d-flex flex-row align-items-center">
        <div class="flex-grow-1">
          <img src="../img/logo.svg" height="50px" alt="">
        </div>
        <div class="session-user border-right border-left px-3">
          <img class="profile-image rounded-circle" src="../img/64.jpg" width="45px" height="45px" alt="">
          <h6 class="username d-inline ml-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">Dr. Aung Win</h6>
          <div class="dropdown-menu dropdown-menu-left shadow py-4">
            <a href="#" class="dropdown-item" role="button"  data-toggle="modal" data-target="#editProfileModal"><span class="fas fa-edit fa-sm mr-2"></span>Edit Profile</a>
            <a href="#" class="dropdown-item" role="button"><span class="fas fa-sign-out-alt fa-sm mr-2"></span>Logout</a>
           </div>
        </div>
        <i class="fas fa-share ml-3" data-toggle="tooltip" data-placement="bottom" title="Go To Website" style="cursor: pointer;"></i>
      </div>
    </div>
  </section>
  <section class="main-section py-4">
    <div class="container">
    <div class="p-3 flew-grow1">
    <div class="bg-white border shadow-sm d-inline-block px-4 text-center floated-navigate1">
						<a href="hod_index.php?id=<?php echo $token; ?>"><span class="fas fa-tachometer-alt fa-lg d-inline  active" data-toggle="tooltip" data-placement="right" title="Dashboard"></span></a>
						<a href="hod_write.php?id=<?php echo $token; ?>"><span class="fas fa-plus fa-lg d-inline "   data-toggle="tooltip" data-placement="right" title="Add Post"></span></a>
						<a href="hod_post.php?id=<?php echo $token; ?>"><span class="fas fa-list fa-lg d-inline "  data-toggle="tooltip" data-placement="right" title="Posts"></span></a>
						<a href="hod_user.php?id=<?php echo $token; ?>"><span class="fas fa-users fa-lg d-inline "  data-toggle="tooltip" data-placement="right" title="Users"></span></a>
    </div>
    </div>
      <div class="d-flex">
        <div class="p-3 flex-grow">
          <div class="bg-white border shadow-sm d-inline-block px-4 text-center floated-navigate">
            <a href="hod_index.php?id=<?php echo $token; ?>"><span class="fas fa-tachometer-alt fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Dashboard"></span></a>
            <a href="hod_write.php?id=<?php echo $token; ?>"><span class="fas fa-plus fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Add Post"></span></a>
            <a href="hod_post.php?id=<?php echo $token; ?>"><span class="fas fa-list fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Posts"></span></a>
            <a href="hod_user.php?id=<?php echo $token; ?>"><span class="fas fa-users fa-lg d-block my-5 active" data-toggle="tooltip" data-placement="right" title="Users"></span></a>
            <hr>
            <a href="login.php"><span class="fas fa-sign-out-alt fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Logout"></span></a>
          </div>
        </div>
        <div class="p-3 flex-grow-1 user">
          <div class="d-flex justify-content-end">
            <h1 class="flex-grow-1 mr-3">Manage Users</h1>
              <!-- Added by pwint -->
              <div class="pr-2">
               <!--  <label class="switch">
                  <input type="checkbox" class="success" data-toggle="toggle" data-on="Ready" data-off="Not Ready">
                  <span class="slider round"></span>
                </label> -->
              </div>
              <div class="input-group rounded-pill mr-3 user-view-list">
                <select class="custom-select d-inline rounded-pill" name="type">
                  <option onclick = "cardViewOn()" selected>Card View</option>
                  <option onclick = "tableViewOn()">Table View</option>
                </select>
              </div>

              <div>
                <a class="btn btn-theme rounded-pill shadow-sm" href="#" role="button" data-toggle="modal" data-target="#addProfileModal"><span class="fas fa-user-plus mr-2"></span>Add Users</a>
              </div>
          </div>
          
          <div id="card-view-container">
            <div class="separator d-flex flex-row align-items-center pt-4">
            <span class="text-muted mr-3">Administrator Profile</span>
            <hr class="flex-grow-1">
            </div>
            <div class="row">
              <div class="col-4 my-3">
                <div class="card shadow-sm user">
                  <div class="card-body p-6 text-center">
                    <img class="profile-image rounded-circle mb-3" src="../img/64.jpg" width="100px" height="100px" alt="">
                    <h6 class="m-0 p-0"><?php echo $name; ?></h6>
                    <span class="text-muted">Administrator</span>
                    <span>draungwin@gmail.com</span>
                    <hr>
                    <a href="#" role="button" class="btn btn-outline-dark btn-sm rounded-pill" data-toggle="modal" data-target="#editProfileModal"><span class="fas fa-edit mr-2"></span>Edit Profile</a>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="separator d-flex flex-row align-items-center">
              <span class="text-muted mr-3"> Profiles</span>
              <hr class="flex-grow-1">
            </div>

            <div class="row">
            <?php
              $major = $post->selectMajor("id",$hod_id);
              $result1 = $post->selectTeacherByDepartment($id,$hod_id);
                for($i=0; $i<count($result1); $i++){
                                              ?>
              <div class="col-4 my-3">
                <div class="card shadow-sm user">
                  <div class="card-body p-6 text-center">
                    <img class="profile-image rounded-circle mb-3" src="../img/5.jpg" width="100px" height="100px" alt="">
                    <h6 class="m-0 p-0"><?php echo $result1[$i]['name'];?></h6>
                    <span class="text-muted"><?php echo $result1[$i]['position'];?></span>
                    <span><?php echo $result1[$i]['email'];?></span>
                    <hr>
                    <a href="#" role="button" class="btn btn-danger btn-block btn-sm rounded-pill"><span class="fas fa-trash mr-2"></span>Delete</a>
                  </div>
                </div>
              </div>
              <?php
              }
              ?>
               

          </div>
          </div>

          <!-- <div id="table-view-container">
            hello
          </div> -->

          <div class="container-fluid" id="table-view-container">
              <!--Navbar Start-->
              <div class="row">
                  <!--Admin Manage -->
                  <div class="col-12 col-lg-10">
                      <div class="row">
                          <div class="col-lg-12">
                              <div class="card shadow-sm my-3">
                                  <div class="card-header">
                                      <strong class="card-title">Major Head of Department</strong>
                                  </div>
                                  <div class="card-body pb-0">
                                      <div class="table-responsive">
                                          <table class="table ">
                                              <thead>
                                              <tr>
                                                  <th>Name</th>
                                                  <th>Position</th>
                                                  <th>Email</th>
                                                  <th>Action</th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                              <?php 
                                              $major = $post->selectMajor("id",$hod_id);
                                              $result1 = $post->selectTeacherByDepartment($id,$hod_id);
                                                     for($i=0; $i<count($result1); $i++){
                                              ?>
                                              <tr>
                                                  <td><?php echo $result1[$i]['name'];?></td>
                                                  <td><?php echo $result1[$i]['department'];?></td>
                                                  <td><?php echo $result1[$i]['email'];?></td>
                                                  <td>
                                                      
                                                  <a href="edit.php?tch_id=<?php echo $result1[$i]['id'];?>&&tok=<?php echo $token;?>" class="btn btn-sm btn-success"><i class="fa fa-edit">Edit</i></a>
                                                      <a href="#" role="button" class="btn btn-outline-dark btn-sm rounded-pill" data-toggle="modal" data-target="#editProfileModal"><span class="fas fa-edit mr-2"></span>Edit</a>
                                                      <a href="delete_dep_teacher.php?tch_id=<?php echo $result1[$i]['id'];?>&&tok=<?php echo $token;?>" role="button" class="btn btn-outline-danger btn-sm rounded-pill"><span class="fas fa-trash mr-2"></span>Delete</a>
                                                  </td>
                                              </tr>
                                              <?php  } ?>                             
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          

        </div>
      </div>
    </div>
  </section>
  
  <div class="modal fade" id="addProfileModal" tabindex="-1" role="dialog" aria-labelledby="addProfileModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="addProfileModalLabel">Create User</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body text-center">
                      <form class="" action="teacher_add.php" enctype="multipart/form-data">
                          <img class="profile-image rounded-circle addProfileImg" src="../img/profile.png" width="200px" height="200px" alt=""><br>
                          <div class="addimgSizeAlert text-danger"></div>
                          <a href="#" role="button" class="btn btn-outline-dark btn-sm rounded-pill mt-2" onclick="triggerClick('.addprofileImgValue')"><span class="fas fa-edit mr-2"></span>Upload</a>
                          <a href="#" role="button" class="btn btn-outline-danger btn-sm rounded-pill mt-2 clearaddProfileImg"><span class="fas fa-trash mr-2"></span>Delete</a>

                          <div class="separator mt-4 text-left d-flex flex-row align-items-center">
                              <span class="mr-3">Name</span>
                              <hr class="flex-grow-1">
                          </div>
                          <input type="hidden" name="tok" value="<?php echo $token;?>">
                          <input type="hidden" name="dep_id" value="<?php echo $hod_id;?>">
                          <input class="form-control mb-2" type="text" name="username" placeholder="Enter Name">
                          <div class="separator d-flex flex-row align-items-center">
                              <span class="mr-3">Position</span>
                              <hr class="flex-grow-1">
                          </div>
                          <input class="form-control mb-2" type="text" name="position" placeholder="Enter Position">
                          <div class="separator d-flex flex-row align-items-center">
                              <span class="mr-3">Email</span>
                              <hr class="flex-grow-1">
                          </div>
                          <input class="form-control mb-2" type="email" name="email" placeholder="Enter Email" ></textarea>
                      <div class="separator d-flex flex-row align-items-center">
                          <span class="mr-3">Phone Number</span>
                          <hr class="flex-grow-1">
                      </div>
                      <input  class="form-control mb-2" type="text" name="phone" placeholder="Enter Phone number">
                      <div class="separator d-flex flex-row align-items-center">
                          <span class="mr-3">Coordinator</span>
                          <hr class="flex-grow-1">
                      </div>
                      <input  class="form-control mb-2" type="text" name="coordinator" placeholder="Enter coordinator">
                      <div class="separator d-flex flex-row align-items-center">
                          <span class="mr-3">Family for</span>
                          <hr class="flex-grow-1">
                      </div>
                      <input  class="form-control mb-2" type="text" name="family" placeholder="Enter family coordinator">
                      <div class="form-row m-b-55" >
                          <div class="separator d-flex flex-row align-items-center">
                              <span class="mr-3">Subject</span>
                              <hr class="flex-grow-1">
                          </div>
                          <div class="value">
                              <div class="row row-refine">
                                  <div class="col-4">
                                      <input  class="form-control mb-2" type="text" name="subject" placeholder=" subject1">
                                  </div>
                                  <div class="col-3">
                                      <input  class="form-control mb-2" type="text" name="code" placeholder=" code">
                                  </div>
                                  <div class="col-4">
                                      <input  class="form-control mb-2" type="text" name="class" placeholder=" class">
                                  </div>

                              </div>
                          </div>
                          <div class="value">
                              <div class="row row-refine">
                                  <div class="col-4">
                                      <input  class="form-control mb-2" type="text" name="subject" placeholder=" subject1">
                                  </div>
                                  <div class="col-3">
                                      <input  class="form-control mb-2" type="text" name="code" placeholder=" code">
                                  </div>
                                  <div class="col-4">
                                      <input  class="form-control mb-2" type="text" name="class" placeholder=" class">
                                  </div>

                              </div>
                          </div>
                      </div>
                      <input class="addprofileImgValue" type="file" name="profile_image" accept="image/*" hidden>
                      <input id="create-profile" type="submit" value="" hidden>
                      </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary rounded-pill" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-theme rounded-pill" onclick="triggerClick('#create-profile')">Add User</button>
              </div>
          </div>
      </div>
      </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="../js/master.js"></script>
              <!-- Added by pwint -->
              <script type="text/javascript">
                function tableViewOn(){
                  document.getElementById("card-view-container").style.display='none';
                  document.getElementById("table-view-container").style.display='block';
                }
                function cardViewOn(){
                  document.getElementById("table-view-container").style.display='none';
                  document.getElementById("card-view-container").style.display='block';
                }
              </script>
</body>
</html>
<?php
  }
  else{
    header("location: login.php");
  }
?>