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
    $position = $result[0]['position'];
    
    if($position != "principle"){
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
<title>Admin | Dashboard</title>
</head>
<body class="bg-light">
	<div class="loader d-none">
		<img src="../img/64.jpg" width="100px" alt="">
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
						<a href="index.php?id=<?php echo $token; ?>"><span class="fas fa-tachometer-alt fa-lg d-inline  active" data-toggle="tooltip" data-placement="right" title="Dashboard"></span></a>
						<a href="write.php?id=<?php echo $token; ?>"><span class="fas fa-plus fa-lg d-inline "   data-toggle="tooltip" data-placement="right" title="Add Post"></span></a>
						<a href="post.php?id=<?php echo $token; ?>"><span class="fas fa-list fa-lg d-inline "  data-toggle="tooltip" data-placement="right" title="Posts"></span></a>
						<a href="user.php?id=<?php echo $token; ?>"><span class="fas fa-users fa-lg d-inline "  data-toggle="tooltip" data-placement="right" title="Users"></span></a>
    </div>
    </div>
			<div class="d-flex">
				<div class="p-3 flex-grow ">
					<div class="bg-white border shadow-sm d-inline-block px-4 text-center floated-navigate" >
						<a href="index.php?id=<?php echo $token; ?>"><span class="fas fa-tachometer-alt fa-lg d-block my-5 active" data-toggle="tooltip" data-placement="right" title="Dashboard"></span></a>
						<a href="write.php?id=<?php echo $token; ?>"><span class="fas fa-plus fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Add Post"></span></a>
						<a href="post.php?id=<?php echo $token; ?>"><span class="fas fa-list fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Posts"></span></a>
						<a href="user.php?id=<?php echo $token; ?>"><span class="fas fa-users fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Users"></span></a>
						<hr>
						<a href="login.php"><span class="fas fa-sign-out-alt fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Logout"></span></a>
					</div>
				</div>
				<div class="p-3 flex-grow-1">
					<div class="d-flex align-items-center">
						<h1 class="flex-grow-1 mr-3">Dashboard</h1>
						<a class="btn btn-theme rounded-pill shadow-sm mr-3" href="write.php" role="button"><span class="fas fa-plus mr-2"></span>Add Post</a>
						<a class="btn btn-theme rounded-pill shadow-sm" href="user.php" role="button" data-toggle="modal" data-target="#addProfileModal"><span class="fas fa-user-plus mr-2"></span>Add User</a>
					</div>
					<div class="row">
						<div class="col-5 my-3">
							<div class="card shadow-sm profile">
								<div class="card-body p-5 text-center profile">
									<img class="profile-image rounded-circle mb-3" src="../img/64.jpg" width="120px" height="120px" alt="">
									<h3 class="m-0 p-0">Dr. Aung Win</h3>
									<span class="lead text-muted">Administrator</span><br>
									<a href="#" role="button" class="btn btn-outline-dark btn-sm rounded-pill mt-4" data-toggle="modal" data-target="#editProfileModal"><span class="fas fa-edit mr-2"></span>Edit Profile</a>
								</div>
							</div>
						</div>
						<div class="col-7 my-3 column">
							<div class="card shadow-sm">
								<div class="card-body p-5 chart">
									
                <div class="d-flex justify-content-between">
                  <h5 class="mb-3 chart">UTYCC Charts</h5>
                  <select class="custom-select rounded-pill post-cat " name="type" style="width: 150px;"> 
                    <option value="" selected>2018-2019</option>
                    <option value="">2017-2018</option>
                    <option value="">2016-2017</option>
                    <option value="">2015-2016</option>
                    <option value="">2014-2015</option>
                    <option value="">2013-2014</option>
                    <option value="">2012-2013</option>
                    <option value="">2011-2012</option>
                    <option value="">2010-2011</option>
                  </select>
                </div>
                <div class="content-chart">
                  <ul class="nav nav-tabs nav-jt mt-4">
                    <li class="nav-item active"><a  class="nav-link active" data-toggle="tab" href="#tab1">Academic</a></li>
                    <li class="nav-item"><a  class="nav-link" data-toggle="tab" id= "bs-tab2" href="#tab2"> Teachers </a></li>
                    <li class="nav-item"><a  class="nav-link" data-toggle="tab" id= "bs-tab3" href="#tab3"> Students</a></li>
                    <li class="nav-item"><a  class="nav-link"  data-toggle="tab" id= "bs-tab4" href="#tab4"> Results </a></li>
                  </ul>
                  <div class="tab-content" >
                      <div id="tab1" class="tab-pane active">
                        <div class="row">
                          <div class="col-md-12">
                            <div id="chartContainer" style="height:250px !important; width: 100% !important;"></div>
                            
                          </div>
                        </div>
                      </div>
                      <div id="tab2" class="tab-pane ">
                        <div class="row">
                          <div class="col-md-12">
                            <div id="chartContainer1" style="height:250px !important; width: 100% !important;"></div>
                            
                          </div>
                        </div>
                      </div>
                      <div id="tab3" class="tab-pane">
                        <div class="row">
                          <div class="col-md-12">
                            <div id="chartContainer2" style="height:250px !important; width: 100% !important;"></div>
                            
                          </div>
                        </div>
                      </div>
                      <div id="tab4" class="tab-pane ">
                        <div class="row">
                          <div class="col-md-12">
                            <div id="chartContainer3" style="height:250px !important; width: 100% !important;"></div>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                </div>
							</div>
						</div>
            </section>
						
  <!-- Added by pwint -->
  <h5 class="mb-3 post-caption text-center">***Top 5 Popular Posts***</h5>
  <div class="container post-container center">    
    <!-- <div class="col-12 my-3">
              <div class="card shadow-sm">
                <div class="card-body pl-5 pr-5 pt-3 pb-3">
                  <div class="post-item-container">
                    <div class="d-flex align-items-center user-list-item">
                      <img class="profile-image rounded-circle mr-3" src="../img/64.jpg" width="70px" height="70px" alt="">
                      <span class="flex-grow-1 mb-1 ml-2">Dr.Aung Win<br><small>24 Sep 2018</small></span>

                      <span class="fas fa-ellipsis-h mb-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></span>
                      <div class="dropdown-menu dropdown-menu-right shadow py-4">
                        <a href="#" class="dropdown-item" role="button"><span class="fas fa-edit fa-sm mr-2"></span>Edit</a>
                        <a href="#" class="dropdown-item" role="button"><span class="fas fa-trash-alt fa-sm mr-2"></span>Delete</a>
                      </div>
                    </div>
                    <div class="d-flex align-items-center post-list-item border-bottom">
                      <div class="flex-grow-1 py-3">
                        <p class="crop-text p-0 m-0 ml-2">လူမှုကွန်ယက်တစ်ခုဖြစ်တဲ့ Facebookသည် လွန်ခဲ့သောလအနည်းငယ်ခန့်က
                          အချိန်ကိုတိုင်းထွာနိုင်သည့် အတိုင်းအထွာ ယူနစ်အသစ်တစ်ခုကို ဖန်တီးလျက်ရှိကြောင်း ထုတ်ဖော်ပြောကြားခဲ့ပါတယ်။</p>
                        
                      </div>
                    </div>
                    <div class="d-flex align-items-center post-list-item border-bottom">
                      <div class="flex-grow-1 py-3">
                         
                        <div class="row">
                          <img src="../img/30.jpg" class="col-md-12 one-img" style="width: 100%;" role="button" data-toggle="modal" data-target="#imgViewModal" onclick="currentSlide(1)">
                        </div>
              
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
    </div>-->
    <?php
     $result =  $post->ownPost($id, 0);
     for($i=0; $i<count($result); $i++){
    
    ?>
    <div class="col-12 my-3">
              <div class="card shadow-sm">
                <div class="card-body pl-5 pr-5 pt-3 pb-3">
                  <div class="post-item-container">
                    <div class="d-flex align-items-center user-list-item">
                      <img class="profile-image rounded-circle mr-3" src="../img/64.jpg" width="70px" height="70px" alt="">
                      <span class="flex-grow-1 mb-1 ml-2"><?php echo $name; ?><br><small><?php echo $result[$i]['created_date']; ?></small></span>

                      <span class="fas fa-ellipsis-h mb-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></span>
                      <div class="dropdown-menu dropdown-menu-right shadow py-4">
                        <a href="#" class="dropdown-item" role="button"><span class="fas fa-edit fa-sm mr-2"></span>Edit</a>
                        <a href="#" class="dropdown-item" role="button"><span class="fas fa-trash-alt fa-sm mr-2"></span>Delete</a>
                      </div>
                    </div>
                    <div class="d-flex align-items-center post-list-item border-bottom">
                      <div class="flex-grow-1 py-3">
                        <p class="crop-text p-0 m-0 ml-2">
                        <?php echo $result[$i]['body']; ?>
                      </div>
                    </div>

                    <?php
                      $photo = $result[$i]['photo'];
                      $photo_array = explode(",",$photo);
                      $photo_count = sizeof($photo_array);
                    ?>

                    <div class="d-flex align-items-center post-list-item border-bottom">
                      <div class="flex-grow-1 py-3">
                        <!-- for 1 photo -->
                        <!-- <div class="row">
                          <img src="../img/bird4.jpg" class="col-md-12 one-img" style="width: 100%;" role="button" data-toggle="modal" data-target="#imgViewModal" onclick="currentSlide(1)">
                        </div> -->
                        <?php 
                          if($photo_count == 1){
                        ?>
                        <div class="row">
                          <img src="../img/<?php echo $photo; ?>" class="col-md-12 one-img" style="width: 100%;" role="button" data-toggle="modal" data-target="#imgViewModal" onclick="currentSlide(1)">
                        </div>
                        <?php
                          }
                          else if($photo_count == 2){
                          ?>

                        <!-- for 2 photo -->
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-xs-6">
                            <img src="../img/<?php echo $photo_array[0]; ?>" class="two-img" style="width: 100%;" role="button" data-toggle="modal" data-target="#imgViewModal" onclick="currentSlide(1)">
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-6">
                            <img src="../img/<?php echo $photo_array[1]; ?>" class="two-img" style="width: 100%;" role="button" data-toggle="modal" data-target="#imgViewModal" onclick="currentSlide(2)">
                          </div>
                        </div>
                        <?php
                          }
                          ?>
              
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    </div>
<?php 
     }
     ?>
            <div class="col-12 my-3">
              <div class="card shadow-sm">
                <div class="card-body pl-5 pr-5 pt-3 pb-3">
                  <div class="post-item-container">
                    <div class="d-flex align-items-center user-list-item">
                      <img class="profile-image rounded-circle mr-3" src="../img/64.jpg" width="70px" height="70px" alt="">
                      <span class="flex-grow-1 mb-1 ml-2">Dr.Aung Win<br><small>24 Sep 2018</small></span>

                      <span class="fas fa-ellipsis-h mb-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></span>
                      <div class="dropdown-menu dropdown-menu-right shadow py-4">
                        <a href="#" class="dropdown-item" role="button"><span class="fas fa-edit fa-sm mr-2"></span>Edit</a>
                        <a href="#" class="dropdown-item" role="button"><span class="fas fa-trash-alt fa-sm mr-2"></span>Delete</a>
                      </div>
                    </div>
                    <div class="d-flex align-items-center post-list-item border-bottom">
                      <div class="flex-grow-1 py-3">
                        <p class="crop-text p-0 m-0 ml-2">လူမှုကွန်ယက်တစ်ခုဖြစ်တဲ့ Facebookသည် လွန်ခဲ့သောလအနည်းငယ်ခန့်က
                          အချိန်ကိုတိုင်းထွာနိုင်သည့် အတိုင်းအထွာ ယူနစ်အသစ်တစ်ခုကို ဖန်တီးလျက်ရှိကြောင်း ထုတ်ဖော်ပြောကြားခဲ့ပါတယ်။</p>
                        
                      </div>
                    </div>
                    <div class="d-flex align-items-center post-list-item border-bottom">
                      <div class="flex-grow-1 py-3">
                        <!-- for 3 photo -->
                        <div class="row">

                          <div class="col-md-6 col-sm-6 col-xs-6">
                            <img src="../img/cleancity.jpg" style="width: 100%;height: 290px;" role="button" data-toggle="modal" data-target="#imgViewModal" onclick="currentSlide(1)">
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-6" onclick="currentSlide(2)">
                            <div class="col-md-12 m-0 p-0" style="width: 100%;height: 145px;" role="button" data-toggle="modal" data-target="#imgViewModal">
                                <img src="../img/ccc.jpg" style="width: 100%;height: 100%;">
                            </div>
                      
                            <div class="col-md-12 m-0 p-0" style="width: 100%;height: 150px;background-image: url('../img/bannars.jpg');" role="button" data-toggle="modal" data-target="#imgViewModal"onclick="currentSlide(3)">
                                <div class="pt-5" style="background: rgb(0, 0, 0);background: rgba(0, 0, 0, 0.7);width: 100%;height: 100%;">
                                    <p class="text-center" style="color: white;">More...</p>
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

  <!-- added by pwint -->
  <div class="modal fade" id="imgViewModal" tabindex="-1" role="dialog" aria-labelledby="imgViewModalLabel1" aria-hidden="true" style="height: 100%;">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color: black;width: 500px;height: 600px;opacity: 0.9;">
        <div class="pr-1">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: white;">&times;</span>
          </button>
        </div>

        <!-- To control according to the posted image array -->
        <div class="pt-4 pl-5 pr-5 pb-5 mySlides" style="width: 100%;height: 100%;display:block;">
          <img src="../img/amazing.jpg" style="width: 100%;height:98%;">
        </div>
        
        <div class="pt-4 pl-5 pr-5 pb-5 mySlides" style="width: 100%;height: 100%;">
          <img src="../img/ccc.jpg" style="width: 100%;height:98%;">
        </div>
        <div class="pt-4 pl-5 pr-5 pb-5 mySlides" style="width: 100%;height: 100%;">
          <img src="../img/clipart.jpg" style="width: 100%;height:98%;">
        </div>
        <div class="pt-4 pl-5 pr-5 pb-5 mySlides" style="width: 100%;height: 100%;">
          <img src="../img/bannars.jpg" style="width: 100%;height:98%;">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#8249;</a>
        <a class="next" onclick="plusSlides(1)">&#8250;</a>
      </div>
    </div>
  </div>


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
          <form class="" action="admin_add.php" enctype="multipart/form-data">
            <img class="profile-image rounded-circle addProfileImg" src="../img/profile.png" width="200px" height="200px" alt=""><br>
            <div class="addimgSizeAlert text-danger"></div>
            <a href="#" role="button" class="btn btn-outline-dark btn-sm rounded-pill mt-2" onclick="triggerClick('.addprofileImgValue')"><span class="fas fa-edit mr-2"></span>Upload</a>
            <a href="#" role="button" class="btn btn-outline-danger btn-sm rounded-pill mt-2 clearaddProfileImg"><span class="fas fa-trash mr-2"></span>Delete</a>
          
            <div class="separator mt-4 text-left d-flex flex-row align-items-center">
              <span class="mr-3">Name</span>
              <hr class="flex-grow-1">
            </div>
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
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <form class="" action="admin_add.php" enctype="multipart/form-data">
            <img class="profile-image rounded-circle editProfileImg" src="../img/avatar2.jpg" width="200px" height="200px" alt=""><br>
            <div class="editimgSizeAlert text-danger"></div>
            <a href="#" role="button" class="btn btn-outline-dark btn-sm rounded-pill mt-2" onclick="triggerClick('.editprofileImgValue')"><span class="fas fa-edit mr-2"></span>Upload</a>
            <a href="#" role="button" class="btn btn-outline-danger btn-sm rounded-pill mt-2 cleareditProfileImg"><span class="fas fa-trash mr-2"></span>Delete</a>
          
            <div class="separator mt-4 text-left d-flex flex-row align-items-center">
              <span class="mr-3">Username</span>
              <hr class="flex-grow-1">
            </div>
            <input class="form-control mb-2" type="text" name="" placeholder="Enter username">
            <div class="separator d-flex flex-row align-items-center">
              <span class="mr-3">Email</span>
              <hr class="flex-grow-1">
            </div>
            <input class="form-control mb-2" type="email" name="email" placeholder="Enter email address">
            <div class="separator d-flex flex-row align-items-center">
              <span class="mr-3">Bio</span>
              <hr class="flex-grow-1">
            </div>
            <textarea class="form-control mb-2" name="biography" rows="3" placeholder="Enter biography" style="resize: none;"></textarea>
            <div class="separator d-flex flex-row align-items-center">
              <span class="mr-3">New Password</span>
              <hr class="flex-grow-1">
            </div>
            <input id="new-password" class="form-control mb-2" type="password" name="password" placeholder="Enter new password" onkeyup="checkMatch('#new-password','#repeat-password')">
            <div class="separator d-flex flex-row align-items-center">
              <span class="mr-3">Repeat Password</span>
              <hr class="flex-grow-1">
            </div>
            <input id="repeat-password" class="form-control mb-2" type="password" name="" placeholder="Re-enter new password" onkeyup="checkMatch('#new-password','#repeat-password')">
            <input class="editprofileImgValue" type="file" name="profile_image" accept="image/*" hidden>
            <input id="change-profile" type="submit" value="" hidden>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary rounded-pill" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-theme rounded-pill" onclick="triggerClick('#change-profile')">Save Changes</button>
        </div>
      </div>
    </div>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="../js/master.js"></script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <!-- Chart Start -->
    <script>

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title:{
                    text: "No. of Students in Academic Levels",
                    fontSize : 14,

                    

                },

                data: [{

                    dataPoints:[
                        { label: "Undergraduate", y: 200.02 },
                        { label: "Graduate", y: 180.4 },
                        { label: "Master", y: 50.00},
                        { label: "Phd", y: 20.90}
                      

                    ]
                }]
            });
            chart.render();
            
        function chartTab2() {
            var chart1 = new CanvasJS.Chart("chartContainer1", {
                animationEnabled: true,
                title:{
                    text: "No. of Teachers in Each Faculty",
                    fontSize:14

                },
                data: [{
                  dataPoints:[
                        { label: "Undergraduate", y: 200.02 },
                        { label: "Graduate", y: 180.4 },
                        { label: "Master", y: 50.00},
                        { label: "Phd", y: 20.90}
                      

                    ]

                }]
            });
            chart1.render();
        }

        function chartTab3() {

            var chart2 = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                title:{
                    text: "No. of Students in each Faculty",
                    fontSize:14
                },
                data: [{
                  dataPoints:[
                        { label: "Undergraduate", y: 200.02 },
                        { label: "Graduate", y: 180.4 },
                        { label: "Master", y: 50.00},
                        { label: "Phd", y: 20.90}
                      

                    ]

                }]
            });
            chart2.render();
        }

        function chartTab4() {

            var chart3 = new CanvasJS.Chart("chartContainer3", {
                animationEnabled: true,
                title:{
                    text: "Result Chart",
                    fontSize:14
                },
                data: [{
                  dataPoints:[
                        { label: "Undergraduate", y: 200.02 },
                        { label: "Graduate", y: 180.4 },
                        { label: "Master", y: 50.00},
                        { label: "Phd", y: 20.90}
                      

                    ]
                    }]
            });
            chart3.render();
        }
        $('#bs-tab1').on("shown.bs.tab",function(){
                chartTab2();
                $('#bs-tab1').off(); // to remove the binded event after the initial rendering
            });
        $('#bs-tab2').on("shown.bs.tab",function(){
            chartTab2();
            $('#bs-tab2').off(); // to remove the binded event after the initial rendering
        });
        $('#bs-tab3').on("shown.bs.tab",function(){
            chartTab3();
            $('#bs-tab3').off(); // to remove the binded event after the initial rendering
        });
        $('#bs-tab4').on("shown.bs.tab",function(){
            chartTab4();
            $('#bs-tab4').off(); // to remove the binded event after the initial rendering
        });
</script>
<script type="text/javascript">
  var slideIndex = 1;

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex-1].style.display = "block";
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