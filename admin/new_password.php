

<?php
session_start();
if(!isset($_SESSION['name'])) {
    header("location: login.php");
    exit();
}
else if(isset($_GET['tok']) == $_SESSION['token']){
    $token = $_SESSION['token'];
    $name = $_SESSION['name'];
  
?>
      <form method="post" action="update_password.php">
    <input type="text" name="new_pwd" placeholder="enter new pwd">
    <input type="text" name="retype_pwd" placeholder="enter new re">
    <input type="hidden" name="tok" value="<?php echo $token;?>">
    <input type="hidden" name="name" value="<?php echo $name;?>">
    <input type="submit" name="submit" >
</form>
<?php
}
    else{
        header("location: login.php");
        exit(); 
    }
    ?>