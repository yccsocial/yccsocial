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
  $roll_no = $_SESSION['admin_name'];
  $pass = $_SESSION['admin_pass'];
  $token = $_SESSION['token'];
  include("core/init.php");
  $table = substr($roll_no,0,1)."student";
  $result =  $post -> selectUser($table,"roll_no", $roll_no, $pass);
    $id = $result[0]['id'];
    $name = $result[0]['name'];
    $class_id = $result[0]['class_id'];
    $is_ec = $result[0]['is_ec'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css' integrity='sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/' crossorigin='anonymous'>

<link rel="stylesheet" href="../css/master.css">
<title>Admin | Dashboard</title>
<style type="text/css">
  .prev,
  .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 10px;
      margin-top: -50px;
      color: white;
      font-weight: bold;
      font-size: 60px;
    }
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }
    .mySlides {
      display: none;
    }

    @media only screen and (max-width: 599px) {
      .post-container{
        width: 100% !important;
        height: auto;
      }
      .profile-image{
        width: 55px;
        height: 55px;
        margin-bottom: 1px;
      }
      .mb-1{
        margin-bottom: 0.1rem !important;
      } 
      .ml-2{
        margin-left: 0.2rem !important;
      }
      #profile-info{
        font-size: 13px;
        font-weight: bold;
      }
      #content-container{
        font-size: 12px;
      }
      .col-md-6, .col-sm-6, .col-xs-6{
        width: 50%;
      }
      .col-12{
        width: 61%;
      }
      .one-img, .three-img, .two-img{
        height: 170px;
    
      }
      .my-3 {
        margin-bottom: 2.5rem !important;
      }
      .post-caption{
        font-size: 17px;
      }
      #imgViewModal{
        margin-left: 10%;
        margin-top: 20px;
      }
      .pl-5{
        padding-left: 2.5rem !important;
      }
      .pr-5{
       padding-right: 2.5rem !important;
      }
      .pb-5{
       padding-bottom: 1.5rem !important;
      }
      .user-view-list{
        width: 80px;
      }
      #post-modal-content{
        background-color: black;width: 90%;height: 500px;opacity: 0.9;
      }
      .prev,.next {
        font-size: 50px;
      }
    }

    @media only screen and (min-width: 600px){
      .post-container{
        width: 68% !important;

      }
      .profile-image{
        width: 70px;
        height: 70px;
      }
      .my-3 {
        margin-bottom: 2.5rem !important;
      }
      .mb-1{
        margin-bottom: 0.25rem !important;
      } 
      .ml-2{
        margin-left: 0.5rem !important;
      }
      .one-img, .three-img, .two-img{
        height: 300px;
      }
      .user-view-list{
        width: 150px;
      }
      .col-12{
        width: 70%;
      }
      #post-modal-content{
        background-color: black;width: 500px;height: 600px;opacity: 0.9;
      }
    }

    @media only screen and (min-width: 801px) {
      .post-container{
        width: 60%;
      }
      .profile-image{
        width: 70px;
        height: 70px;
      }
      .mb-1{
        margin-bottom: 0.25rem !important;
      } 
      .ml-2{
        margin-left: 0.5rem !important;
      }
      .col-12{
        width: 95%;
      }

      .one-img, .three-img, .two-img{
        height: 300px;
      }

      .user-view-list{
        width: 150px;
      }

      #post-modal-content{
        background-color: black;width: 500px;height: 600px;opacity: 0.9;
      }

    }
    
    .sticky {
      position: fixed;
      top: 20px;
    }
</style>


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
					<img class="profile-image rounded-circle" src="img/profile1.png" width="40px" height="40px" alt="">
          <h6 class="username d-inline ml-2" ><?php echo $name; ?></h6>
          
				</div>
				<i class="fa fa-share ml-3" id="share" data-toggle="tooltip" data-placement="bottom" title="Go To Website" style="cursor: pointer;"></i>
        <i class="fa fa-sign-out-alt ml-3"   data-toggle="tooltip" data-placement="bottom" title="logout" style="cursor: pointer;"></i>
      </div>
    </div>
    </section>
  <section class="main-section py-4">
		<div class="container">
    <div class="p-3 flew-grow1" id="phTop-menu">
    <div class="bg-white border shadow-sm d-inline-block px-4 text-center floated-navigate1">
						<a href="student_index.php?id=<?php echo $token; ?>"><span class="fas fa-tachometer-alt fa-lg d-inline  active" data-toggle="tooltip" data-placement="right" title="Dashboard"></span></a>
						<a href="vote.php"><span class="fas fa-vote-yea d-inline my-5 " style="font-size;18.667px;"  data-toggle="tooltip" data-placement="right" title="Vote"></span></a>
            <?php if($is_ec == 1){ ?>
            <a href="student_write.php?id=<?php echo $token; ?>"><span class="fas fa-plus fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Add Post"></span></a>
            <?php } ?>
						<a href="account.php"><span class="fas fa-cogs fa-lg d-inline "  data-toggle="tooltip" data-placement="right" title="Settings"></span></a>
						
    </div>
    </div>
			<div class="d-flex">
          <div class="p-3 flex-grow">
					<div class="bg-white border shadow-sm d-inline-block px-4 text-center floated-navigate">
						<a href="student_index.php?id=<?php echo $token; ?>"><span class="fas fa-tachometer-alt fa-lg d-block my-5 active" data-toggle="tooltip" data-placement="right" title="Dashboard"></span></a>
						<a href="vote.php"><span class="fas fa-vote-yea d-block my-5 " style="font-size;18.667px;"     data-toggle="tooltip" data-placement="right" title="Vote"></span></a>
            <?php if($is_ec == 1){ ?>
            <a href="student_write.php?id=<?php echo $token; ?>"><span class="fas fa-plus fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Add Post"></span></a>
            <?php } ?>
						<a href="account.php"><span class="fas fa-cogs fa-lg d-block my-5"  data-toggle="tooltip" data-placement="right" title="Settings"></span></a>
						<hr>
						<a href="login.php"><span class="fas fa-sign-out-alt fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Logout"></span></a>
          </div>
          
          
				</div>
				<div class="p-3 flex-grow-1">
					<div class="d-flex align-items-center">
						<h2 class="flex-grow-1 mr-3">Dashboard</h2>
					</div>
					<div class="row">
          <div class="col-5 my-3">
							<div class="card shadow-sm profile">
								<div class="card-body p-5 text-center profile">
									<img class="profile-image rounded-circle mb-3" src="img/profile1.png" width="200px" height="200px" alt="">
									<h4 class="m-0 p-0"><?php echo $name; ?></h4>
									<span class="lead text-muted"><?php echo $roll_no; ?></span><br>
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
                                            <span class="lead flex-grow-1">Artificial Intelligent</span>
                                            <span class="lead flex-grow-2">Dr. Naw Naw</span>
                                        </div>
                                        <div class="progress">
                                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
                                        </div>
						
										                    <div class="d-flex align-items-center border-bottom py-3 user-list-item">
											
									                        	<span class="lead flex-grow-1">Artificial Intelligent</span>
                                            <span class="lead flex-grow-2">Dr. Naw Naw</span>
                                        </div>
                                        <div class="progress">
                                        <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 1%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">50%</div>
                                        </div>
										<div class="d-flex align-items-center border-bottom py-3 user-list-item">
											
                                            <span class="lead flex-grow-1">Artificial Intelligent</span>
                                            <span class="lead flex-grow-2">Dr. Naw Naw</span>
											
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
   <h5 class="mb-3 post-caption text-center my-3">***Top 5 Popular Posts***</h5>
    <div class="container post-container center"> 

    <?php
     $result_post =  $post->selectPostsForStudent($class_id);
     for($i=0; $i<count($result_post); $i++){
       $status = $result[$i]['status'];
       $photo_id = $result[$i]['id'];
       $post_by = $result_post[$i]['posted_by'];
       global $posted_person;
       if($status == 0){
        $posted_person = $post->selectUserById("teacher",$post_by);
       }
       else{

       }
    
    ?>   
    <div class="col-12 my-3">
              <div class="card shadow-sm">
                <div class="card-body pl-5 pr-5 pt-3 pb-3">
                  <div class="post-item-container">
                    <div class="d-flex align-items-center user-list-item">
                      <img class="profile-image rounded-circle mr-3" src="img/profile1.png" alt="">
                      <span class="flex-grow-1 mb-1 ml-2" id="profile-info"><?php echo $posted_person[0]['name']; ?><br><small><?php echo $result_post[$i]['created_date']; ?></small></span>
 
                      <!-- For Admin -->
                      <!-- <span class="fas fa-ellipsis-h mb-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></span> -->

                      <div class="dropdown-menu dropdown-menu-right shadow py-4">
                        <a href="#" class="dropdown-item" role="button"><span class="fas fa-edit fa-sm mr-2"></span>Edit</a>
                        <a href="#" class="dropdown-item" role="button"><span class="fas fa-trash-alt fa-sm mr-2"></span>Delete</a>
                      </div>
                    </div>
                    <div class="d-flex align-items-center post-list-item border-bottom">
                      <div class="flex-grow-1 py-3">
                        <p class="crop-text p-0 m-0 ml-2" id="content-container">
                        <?php echo $result_post[$i]['body']; ?></p>
                        
                      </div>
                    </div>
                    <?php
                      $photo = $result_post[$i]['photo'];
                      $photo_array = explode(",",$photo);
                      $photo_count = sizeof($photo_array);
                    ?>
                    <div class="d-flex align-items-center post-list-item border-bottom">
                    <button class="showimage"  id="<?php echo $photo_id; ?>">He</button>
                      <div class="flex-grow-1 py-3">
                        <!-- for 1 photo -->
                        <?php 
                          if($photo_count == 1){
                        ?>
                        <div class="row">
                          <img src="../img/<?php echo $photo; ?>" class="col-md-12 one-img" style="width: 100%;" >
                        </div>
                        <?php
                          }
                          else if($photo_count == 2){
                          ?>

                        <!-- for 2 photo -->
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-xs-6">
                            <img src="../img/<?php echo $photo_array[0]; ?>" class="two-img" style="width: 100%;">
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-6">
                            <img src="../img/<?php echo $photo_array[1]; ?>" class="two-img" style="width: 100%;" >
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
                      <img class="profile-image rounded-circle mr-3" src="img/profile1.png" alt="">
                      <span class="flex-grow-1 mb-1 ml-2" id="profile-info">John Brown<br><small>2 Sep 2018</small></span>

                      <!-- For Admin -->
                      <!-- <span class="fas fa-ellipsis-h mb-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></span> -->

                      <div class="dropdown-menu dropdown-menu-right shadow py-4">
                        <a href="#" class="dropdown-item" role="button"><span class="fas fa-edit fa-sm mr-2"></span>Edit</a>
                        <a href="#" class="dropdown-item" role="button"><span class="fas fa-trash-alt fa-sm mr-2"></span>Delete</a>
                      </div>
                    </div>
                    <div class="d-flex align-items-center post-list-item border-bottom">
                      <div class="flex-grow-1 py-3">
                        <p class="crop-text p-0 m-0 ml-2" id="content-container">
                          Mini Innovation Challengeဆိုတာ USAIDနှင့် နည်းပညာတက္ကသိုလ် ( ရတနာပုံ ဆိုင်ဘာစီးတီး ) တို့မှ ဦးဆောင်ကျင်းပတာဖြစ်ပြီး နည်းပညာတက္ကသိုလ် ( ရတနာပုံ ဆိုင်ဘာစီးတီး ) ကျောင်းသားများ သမဂ္ဂမှ Organizer အဖြစ် တာဝန်ယူဆောင်ရွက်မည့် တီထွင်ဖန်တီးမှုစွမ်းရည်ပြိုင်ပွဲလေး ဖြစ်ပါတယ်. . .
                        </p>
                      </div>
                    </div>
                    <div class="d-flex align-items-center post-list-item border-bottom">
                      <div class="flex-grow-1 py-3">
                        <!-- for 2 photo -->
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-xs-6">
                            <img src="img/ycc.png" class="two-img" style="width: 100%;" role="button" data-toggle="modal" data-target="#imgViewModal" onclick="currentSlide(1)">
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-6">
                            <img src="img/mini_inno.jpg" class="two-img" style="width: 100%;" role="button" data-toggle="modal" data-target="#imgViewModal" onclick="currentSlide(2)">
                          </div>
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
                      <img class="profile-image rounded-circle mr-3" src="img/profile1.png" alt="">
                      <span class="flex-grow-1 mb-1 ml-2" id="profile-info"><?php echo $name; ?><br><small>24 Sep 2018</small></span>

                      <!-- For Admin -->
                      <!-- <span class="fas fa-ellipsis-h mb-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></span> -->

                      <div class="dropdown-menu dropdown-menu-right shadow py-4">
                        <a href="#" class="dropdown-item" role="button"><span class="fas fa-edit fa-sm mr-2"></span>Edit</a>
                        <a href="#" class="dropdown-item" role="button"><span class="fas fa-trash-alt fa-sm mr-2"></span>Delete</a>
                      </div>
                    </div>
                    <div class="d-flex align-items-center post-list-item border-bottom">
                      <div class="flex-grow-1 py-3">
                        <p class="crop-text p-0 m-0 ml-2" id="content-container">နည်းပညာတက္ကသိုလ်(ရတနာပုံဆိုင်ဘာစီးတီး)၏ တတိယအကြိမ်မြောက် ကထိန်အောင်ပွဲအခမ်းအနားကို ၂၀၁၈-၂၀၁၉ ပညာသင်နှစ် ၁၇-၁-၂၀၁၉ ရက်နေ့ တွင် ကျင်းပခဲ့ပါသည်။ ၎င်းအခမ်းအနားကို မန္တလေးတိုင်းဒေသကြီး၊ ပြင်ဦးလွင်မြို့နယ်၊ ပြင်စာကျေးရွာ ပြင်စာရွာဦးကျောင်းတိုက်တွင် ကျင်းပခဲ့ပြီး ဆရာတော်သံဃာတော်များထံမှ ပရိတ်တရားတော်များကို နာယူခဲ့ကြပြီး လှူဒါန်းမှုအစုစုတို့အတွက် ရေစက်သွန်းချ အမျှပေးဝေကြကာ အခမ်းအနားကို အောင်မြင်စွာကျင်းပခဲ့ပါသည်။
                        </p>
                      </div>

                    </div>
                    <div class="d-flex align-items-center post-list-item border-bottom">
                      <div class="flex-grow-1 py-3">
                        <!-- for 3 photo -->
                        <div class="row">

                          <div class="col-md-6 col-sm-6 col-xs-6">
                            <img src="img/uni_kahtein2.jpg" style="width: 100%;height: 290px;" role="button" data-toggle="modal" data-target="#imgViewModal" onclick="currentSlide(1)">
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-6" onclick="currentSlide(2)">
                            <div class="col-md-12 m-0 p-0" style="width: 100%;height: 145px;" role="button" data-toggle="modal" data-target="#imgViewModal">
                                <img src="img/uni_kahtein.jpg" style="width: 100%;height: 100%;">
                            </div>
                      
                            <div class="col-md-12 mt-1 p-0" style="width: 100%;height: 150px;background-image: url('img/uni_kahtein3.jpg');border-radius: 10px;" role="button" data-toggle="modal" data-target="#imgViewModal"onclick="currentSlide(3)">
                                <div class="pt-5" style="background: rgb(0, 0, 0);background: rgba(0, 0, 0, 0.7);width: 100%;height: 100%;border-radius: 10px;">
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
      <div class="modal-content" id="post-modal-content">
        <div class="pr-1">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: white;">&times;</span>
          </button>
        </div>
        <div id="result"></div>
        <!-- To control according to the posted image array -->
        <!-- 
        <div class="pt-4 pl-5 pr-5 pb-5 mySlides" style="width: 100%;height: 100%;display:block;">
          <img src="img/uni_kahtein2.jpg" style="width: 100%;height:98%;">
        </div>
        <div class="pt-4 pl-5 pr-5 pb-5 mySlides" style="width: 100%;height: 100%;">
          <img src="img/uni_kahtein.jpg" style="width: 100%;height:98%;">
        </div>
        <div class="pt-4 pl-5 pr-5 pb-5 mySlides" style="width: 100%;height: 100%;">
          <img src="img/uni_kahtein3.jpg" style="width: 100%;height:98%;">
        </div>
        <div class="pt-4 pl-5 pr-5 pb-5 mySlides" style="width: 100%;height: 100%;">
          <img src="img/uni_kahtein4.jpg" style="width: 100%;height:98%;">
        </div> -->

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
<!-- Added by pwint -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.showimage',function(){
      var id = $(this).attr("id");
      alert(id);
      // $.ajax({
      //   url:"getimage.php",
      //   method:"POST",
      //   data:{
      //     key_id:id
      //   },
      //   success:function(data){
      //     $('#result').html(data);
      //     $('#imgViewModal').modal('show');
      //   }
      // });
    });
  });

 window.onscroll = function() {myFunction()};

  var header = document.getElementById("phTop-menu");
  var sticky = header.offsetTop;

  function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }

  
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