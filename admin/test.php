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
		<img src="../img/loader.png" width="100px" alt="">
	</div>
	<section class="bg-white py-3 shadow-sm border-bottom">
		<div class="container">
			<div class="d-flex flex-row align-items-center">
				<div class="flex-grow-1">
					<img src="../img/logo.svg" height="50px" alt="">
				</div>
				<div class="session-user border-right border-left px-3">
					<img class="profile-image rounded-circle" src="../img/5.jpg" width="45px" height="45px" alt="">
          <h6 class="username d-inline ml-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">Dr. Hnin Aye Thant</h6>
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
						<a href="index.php"><span class="fas fa-tachometer-alt fa-lg d-inline  active" data-toggle="tooltip" data-placement="right" title="Dashboard"></span></a>
						<a href="write.php"><span class="fas fa-plus fa-lg d-inline "   data-toggle="tooltip" data-placement="right" title="Add Post"></span></a>
						<a href="post.php"><span class="fas fa-list fa-lg d-inline "  data-toggle="tooltip" data-placement="right" title="Posts"></span></a>
						<a href="user.php"><span class="fas fa-users fa-lg d-inline "  data-toggle="tooltip" data-placement="right" title="Users"></span></a>
    </div>
    </div>
			<div class="d-flex">
          <div class="p-3 flex-grow">
					<div class="bg-white border shadow-sm d-inline-block px-4 text-center floated-navigate">
						<a href="index.php"><span class="fas fa-tachometer-alt fa-lg d-block my-5 active" data-toggle="tooltip" data-placement="right" title="Dashboard"></span></a>
						<a href="write.php"><span class="fas fa-plus fa-lg d-block my-5"   data-toggle="tooltip" data-placement="right" title="Add Post"></span></a>
						<a href="post.php"><span class="fas fa-list fa-lg d-block my-5"  data-toggle="tooltip" data-placement="right" title="Posts"></span></a>
						<a href="user.php"><span class="fas fa-users fa-lg d-block my-5"  data-toggle="tooltip" data-placement="right" title="Users"></span></a>
						<hr>
						<a href="logout.php"><span class="fas fa-sign-out-alt fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Logout"></span></a>
          </div>
          
          
				</div>
				<div class="p-3 flex-grow-1">
					<div class="d-flex align-items-center">
						<h1 class="flex-grow-1 mr-3 dash">Dashboard</h1>
					</div>
					<div class="row">
          <div class="col-5 my-3">
							<div class="card shadow-sm profile">
								<div class="card-body p-5 text-center profile">
									<img class="profile-image rounded-circle mb-3" src="../img/5.jpg" width="120px" height="120px" alt="">
									<h5 class="m-0 p-0">Dr.Hnin Aye Thant</h5>
									<span class="lead text-muted">Administrator</span><br>
									<a href="#" role="button" class="btn btn-outline-dark btn-sm rounded-pill mt-4" data-toggle="modal" data-target="#editProfileModal"><span class="fas fa-edit mr-2"></span>Edit Profile</a>
								</div>
							</div>
						</div>
						<div class="col-7 my-3">
							<div class="card shadow-sm">
								<div class="card-body p-5">
                  <div class="d-flex justify-content-between">
                    <h5 class="mb-3">Student Schedule</h5>
                    <span class="mb-3" >Thursday </span>
                  </div>
                                    <div class="user-item-container">
										<div class="d-flex align-items-center border-bottom py-3 user-list-item">
                                            <span class="lead flex-grow-1">Operation Research</span>
                                            <span class="lead flex-grow-2">2ICT_A</span>
                                        </div>
                                        <div class="progress">
                                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
                                        </div>
						
										<div class="d-flex align-items-center border-bottom py-3 user-list-item">
											
											<span class="lead flex-grow-1">English</span>
											<span class="lead flex-grow-2">3CE</span>
                                        </div>
                                        <div class="progress">
                                        <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                        </div>
										<div class="d-flex align-items-center border-bottom py-3 user-list-item">
											
                                            <span class="lead flex-grow-1">Management Information System</span>
                                            <span class="lead flex-grow-2">4PRE</span>
											
                                        </div>
                                        <div class="progress">
                                        <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 1%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">1%</div>
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
  					
  <!-- Added by pwint -->
  <h5 class="mb-3 post-caption text-center">***Top 5 Popular Posts***</h5>
  <div class="container post-container center">    
    <div class="col-12 my-3">
              <div class="card shadow-sm">
                <div class="card-body pl-5 pr-5 pt-3 pb-3">
                  <div class="post-item-container">
                    <div class="d-flex align-items-center user-list-item">
                      <img class="profile-image rounded-circle mr-3" src="../img/5.jpg" width="70px" height="70px" alt="">
                      <span class="flex-grow-1 mb-1 ml-2">Dr.Hnin Aye Thant<br><small>24 Sep 2018</small></span>

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
                        <!-- for 1 photo -->
                        <div class="row">
                          <img src="../img/30.jpg" class="col-md-12 one-img" style="width: 100%;" role="button" data-toggle="modal" data-target="#imgViewModal" onclick="currentSlide(1)">
                        </div>
              
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    </div>

    <div class="col-12 my-3">
              <div class="card shadow-sm">
                <div class="card-body pl-5 pr-5 pt-3 pb-3">
                  <div class="post-item-container">
                    <div class="d-flex align-items-center user-list-item">
                      <img class="profile-image rounded-circle mr-3" src="../img/5.jpg" width="70px" height="70px" alt="">
                      <span class="flex-grow-1 mb-1 ml-2">Dr.Hnin Aye Thant<br><small>24 Sep 2018</small></span>

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
                        <!-- for 1 photo -->
                        <!-- <div class="row">
                          <img src="../img/bird4.jpg" class="col-md-12 one-img" style="width: 100%;" role="button" data-toggle="modal" data-target="#imgViewModal" onclick="currentSlide(1)">
                        </div> -->

                        <!-- for 2 photo -->
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-xs-6">
                            <img src="../img/cleancity.jpg" class="two-img" style="width: 100%;" role="button" data-toggle="modal" data-target="#imgViewModal" onclick="currentSlide(1)">
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-6">
                            <img src="../img/39.png" class="two-img" style="width: 100%;" role="button" data-toggle="modal" data-target="#imgViewModal" onclick="currentSlide(2)">
                          </div>
                        </div>

                        <!-- for 3 photo -->
                        <!-- <div class="row">
                          <img src="../img/bird1.jpg" class="col-md-6 three-img" style="width: 100%;" role="button" data-toggle="modal" data-target="#imgViewModal" onclick="currentSlide(1)">

                          <div class="row col-md-6" onclick="currentSlide(2)">
                            <div class="col-md-12 m-0 p-0" style="width: 100%;height: 145px;" role="button" data-toggle="modal" data-target="#imgViewModal">
                                <img src="../img/bird2.jpg" style="width: 100%;">
                            </div>
                      
                            <div class="col-md-12 m-0 p-0" style="width: 100%;height: 150px;background-image: url('../img/bird3.jpg');" role="button" data-toggle="modal" data-target="#imgViewModal"onclick="currentSlide(3)">
                                <div class="pt-5" style="background: rgb(0, 0, 0);background: rgba(0, 0, 0, 0.7);width: 100%;height: 100%;">
                                    <p class="text-center" style="color: white;">More...</p>
                                </div>
                            </div>
                          </div>

                        </div>  -->
              
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    </div>

            <div class="col-12 my-3">
              <div class="card shadow-sm">
                <div class="card-body pl-5 pr-5 pt-3 pb-3">
                  <div class="post-item-container">
                    <div class="d-flex align-items-center user-list-item">
                      <img class="profile-image rounded-circle mr-3" src="../img/5.jpg" width="70px" height="70px" alt="">
                      <span class="flex-grow-1 mb-1 ml-2">Dr.Hnin Aye Thant<br><small>24 Sep 2018</small></span>

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
</body>
</html>