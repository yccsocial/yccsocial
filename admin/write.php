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
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<link rel="stylesheet" href="../css/master.css">
<title>Admin | Manage Posts</title>
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
      <div class="d-flex">
        <div class="p-3 flex-grow">
          <div class="bg-white border shadow-sm d-inline-block px-4 text-center floated-navigate">
            <a href="index.php?id=<?php echo $token; ?>"><span class="fas fa-tachometer-alt fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Dashboard"></span></a>
            <a href="write.php?id=<?php echo $token; ?>"><span class="fas fa-plus fa-lg d-block my-5 active" data-toggle="tooltip" data-placement="right" title="Add Post"></span></a>
            <a href="post.php?id=<?php echo $token; ?>"><span class="fas fa-list fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Posts"></span></a>
            <a href="user.php?id=<?php echo $token; ?>"><span class="fas fa-users fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Users"></span></a>
            <hr>
            <a href="login.php"><span class="fas fa-sign-out-alt fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Logout"></span></a>
          </div>
        </div>
        <div class="p-3 flex-grow-1">
          <div class="d-flex align-items-center">
            <h1 class="flex-grow-1 mr-3 upload-state">Create Posts</h1>
            <a href="home.php?id=<?php echo $token; ?>" class="btn btn-theme rounded-pill shadow-sm post-upload"><span class="fas fa-paper-plane mr-2"></span>Upload Post</a>
          </div>
          <div class="row">
            <div class="col-12 my-3">
              <div class="card p-5 shadow-sm write">
                <form id="postDataForm" action="post_process.php" method="post">
                <input class="form-control rounded-pill title-of-post" type="text" placeholder="Enter post title">
                  
                  <div class="d-flex flex-row mb-4 align-items-center my-4">
                  <?php
                  echo "<input type='hidden' name='id' value='$id'>";
                  $classes_result = $post->selectClassesByPrinciple();
                     $all_classes = implode(',', $classes_result);
                     echo "<label>TO : ALL STUDENTS</label>";
                  echo "<input type='hidden' value='$all_classes' name='class'>";
                  ?>
                  </div>
                  <div class="editor-frame border my-4">
                    <div class="d-flex flex-row editor-tool p-1 border-bottom">
                      <div class="text-center">
                        <div class="btn-group" role="group">
                          <button type="button" class="border btn btn-light insert-link-btn" data-toggle="modal" data-target="#createLinkModal"><span class="fas fa-link fa-sm"></span></button>
                          <button type="button" class="border btn btn-light insert-unlink-btn"><span class="fas fa-unlink fa-sm"></span></button>
                        </div>
                      </div>
                      <div class="text-center flex-grow-1">
                        <div class="btn-group" role="group">
                          <button type="button" class="border btn btn-light text-bold-btn"><span class="fas fa-bold fa-sm"></span></button>
                          <button type="button" class="border btn btn-light text-italic-btn"><span class="fas fa-italic fa-sm"></span></button>
                          <button type="button" class="border btn btn-light text-underline-btn"><span class="fas fa-underline fa-sm"></span></button>
                          <button type="button" class="border btn btn-light text-strikethrough-btn"><span class="fas fa-strikethrough fa-sm"></span></button>
                        </div>
                        <div class="btn-group" role="group">
                          <button type="button" class="border btn btn-light text-superscript-btn"><span class="fas fa-superscript fa-sm"></span></button>
                          <button type="button" class="border btn btn-light text-subscript-btn"><span class="fas fa-subscript fa-sm"></span></button>
                        </div>
                        <div class="btn-group" role="group">
                          <button type="button" class="border btn btn-light text-list-ul-btn"><span class="fas fa-list-ul fa-sm"></span></button>
                          <button type="button" class="border btn btn-light text-list-ol-btn"><span class="fas fa-list-ol fa-sm"></span></button>
                        </div>
                        <div class="btn-group" role="group">
                          <button type="button" class="border btn btn-light text-align-left-btn"><span class="fas fa-align-left fa-sm"></span></button>
                          <button type="button" class="border btn btn-light text-align-center-btn"><span class="fas fa-align-center fa-sm"></span></button>
                          <button type="button" class="border btn btn-light text-align-right-btn"><span class="fas fa-align-right fa-sm"></span></button>
                          <button type="button" class="border btn btn-light text-align-justify-btn"><span class="fas fa-align-justify fa-sm"></span></button>
                        </div>
                      </div>
                      <div class="text-center">
                        <div class="btn-group" role="group">
                          <button type="button" class="border btn btn-light insert-image-btn" data-toggle="modal" data-target="#insertImageModal"><span class="fas fa-image fa-sm"></span></button>
                          <button type="button" class="border btn btn-light" data-toggle="modal" data-target="#insertYoutubeModal"><span class="fas fa-video fa-sm"></span></button>
                        </div>
                      </div>
                    </div>
                    <div class="editor p-4" contenteditable="true"><span class="placeholder text-muted">Type content here...</span></div>
                  </div>
                  <textarea class="body-of-post" name="" id="" cols="30" rows="10" hidden></textarea>
                  <div class="keyword-bubble"></div>
                  <input type="date" class="form-control rounded-pill post-of-date" placeholder="Enter Date">
                  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="modal fade" id="createLinkModal" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Insert Link</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
					<label>To what URL should this link go?</label>
					<input class="form-control rounded-pill linkValue" type="text" name="" value="">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-outline-secondary rounded-pill" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-theme rounded-pill add-link-value" data-dismiss="modal">Insert Link</button>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="modal fade" id="insertImageModal" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Insert Image</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
					<label>Browse image from your device.</label>
					<div class="custom-file">
					  <input type="file" class="custom-file-input imageValue" id="customFile" accept="image/*">
					  <label class="custom-file-label" for="customFile">Choose file</label>
					</div>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="modal fade" id="insertYoutubeModal" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Insert Youtube Video</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
					<label>Video URL</label>
					<input class="form-control rounded-pill youtubeValue" type="text" name="" value="">
	      </div>
				<div class="modal-footer">
	        <button type="button" class="btn btn-outline-secondary rounded-pill" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-theme rounded-pill insert-youtube-btn" data-dismiss="modal">Insert Video</button>
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
<?php
  }
  else{
    header("location: login.php");
  }
?>