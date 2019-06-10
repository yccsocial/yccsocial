<?php
// include("../config/conf.php");
// include("../config/function.php");
// $postId = 0;
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
    
    if($position != "teacher"){
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
          <h6 class="username d-inline ml-2">Dr.Aung Win</h6>
        </div>
        <i class="fas fa-share ml-3" data-toggle="tooltip" data-placement="bottom" title="Go To Website" style="cursor: pointer;"></i>
      </div>
    </div>
  </section>
  <section class="main-section py-4">
    <div class="container">
      <div class="d-flex">
        <div class="p-3">
          <div class="bg-white border shadow-sm d-inline-block px-4 text-center floated-navigate">
            <a href="teacher_index.php?id=<?php echo $token; ?>"><span class="fas fa-tachometer-alt fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Dashboard"></span></a>
            <a href="teacher_write.php?id=<?php echo $token; ?>"><span class="fas fa-plus fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Add Post"></span></a>
            <a href="teacher_post.php?id=<?php echo $token; ?>"><span class="fas fa-list fa-lg d-block my-5 active" data-toggle="tooltip" data-placement="right" title="Posts"></span></a>
            <a href="teacher_user.php?id=<?php echo $token; ?>"><span class="fas fa-users fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Users"></span></a>
            <hr>
            <a href="login.php"><span class="fas fa-sign-out-alt fa-lg d-block my-5" data-toggle="tooltip" data-placement="right" title="Logout"></span></a>
          </div>
        </div>
        <div class="p-3 flex-grow-1">
          <div class="d-flex align-items-center">
            <h1 class="flex-grow-1 mr-3">Manage Posts</h1>
            <form action="post.php" class="form-inline" method="post">
             
              <div class="input-group bg-white shadow-sm rounded-pill mr-3" style="width: 150px;">
                <select class="custom-select d-inline rounded-pill" name="author">
                  <option value= "authors" selected>Authors</option>
<?php
  $nameArray = getAuthorList();
  for ($i=0; $i < count($nameArray) ; $i++) { 
    echo "<option>".$nameArray[$i]."</option>";
  }
?>
                </select>
              </div>
              <input class="btn btn-theme rounded-pill shadow-sm mr-3" type="submit" value="Search" name="search">
            </form>
            <a class="btn btn-theme rounded-pill shadow-sm" href="write.php" role="button"><span class="fas fa-plus mr-2"></span>Add Post</a>
          </div>
          <div class="row">
            <div class="col-12 my-3">
              <div class="card shadow-sm">
                <div class="card-body px-5 py-4">
                  <div class="post-item-container postList">
                    
<?php
  if (isset($_POST['search'])) {
    $type = $_POST['type'];
    $author = $_POST['author'];
    $authorId = getAuthorId($author);
    
      $query = "SELECT * FROM post WHERE type = '$type' AND posted_by = '$authorId'";
  }
  else{
    $query = "SELECT * FROM post ORDER BY id DESC";
  } 
    $prepare = $con -> prepare($query);
    $prepare -> execute();
  while ($dataRow = $prepare -> fetch()) {
?>
                    <div class="d-flex align-items-center post-list-item border-bottom">
                      <div class="flex-grow-1 py-3">
                        <a href="#"><b class="text-theme">
<?php
  echo $dataRow['type'];
?>
                        </b></a>
                        <p class="crop-text p-0 m-0">
<?php
  echo $dataRow['title'];
?>
                        </p>
                        <small class="text-muted"><a href="#">
<?php
  echo getAuthorName($dataRow['posted_by']);
?>
                        </a>, 
<?php
  echo $dataRow['posted_datetime'];
  $postId = $dataRow['id'];
?>
                      </small>
                      </div>
                      <span class="fas fa-ellipsis-h" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></span>
                      <div class="dropdown-menu dropdown-menu-right shadow py-4">
                        <a href="edit.php?id=<?php echo $dataRow['id'];?>" class="dropdown-item" role="button">
                          <span class="fas fa-edit fa-sm mr-2"></span>Edit
                        </a>
                        <a href="#" class="dropdown-item" role="button"><span class="fas fa-trash-alt fa-sm mr-2"></span>Delete</a>
                      </div>
                    </div>
<?php
}
?>                      
                    <div class="d-flex align-items-center post-list-item border-bottom">
                      <div class="dropdown-menu dropdown-menu-right shadow py-4">
                        <a href="#" class="dropdown-item" role="button"><span class="fas fa-edit fa-sm mr-2"></span>Edit</a>
                        <a href="#" class="dropdown-item" role="button"><span class="fas fa-trash-alt fa-sm mr-2"></span>Delete</a>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 loadmore-main" id="loadmore-main<?php echo $postId;?>">
                    <button id="<?php echo $postId;?>" class="btn btn-theme shadow-sm rounded-pill">
                      <span class="fas fa-arrow-down mr-2"></span> Load More
                    </button>
                    <button class="loading btn btn-theme shadow-sm rounded-pill" style="display: none;">
                      <span class="fas fa-arrow-down mr-2"></span> Loading . . .
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="../js/master.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(document).on('click','.loadmore-main',function(){
        var ID = $(this).attr('id');
        $('.loadmore-main').hide();
        $('.loading').show();
        $.ajax({
            type:'POST',
            url:'ajax_loadmore.php',
            data:'id='+ID,
            success:function(html){
                $('#loadmore-main'+ID).remove();
                $('.postList').append(html);
            }
        });
    });
});
</script>
</body>
</html>
<?php
  }
  else{
    header("location: login.php");
  }
?>