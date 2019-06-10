<?php

	session_start();
	include('core/init.php');
	if( isset($_POST['submit']) && $_POST['tok'] == $_SESSION['token']) {

		$name = $_POST['name'];
		$pass = $_POST['password'];

		$pass_sha = hash("sha512", $pass);

		//Check user whether stucent or teacher
		if (strpos($name, '-') !== false) {//for student
		//
		$table = substr($name,0,1)."student";

		$rowCount = $post -> loginProcess($table,"roll_no",$name, $pass_sha);

		global $pre;
		if($rowCount == 1) {
			 	$_SESSION['admin_pass'] = $pass_sha;
				$_SESSION['admin_name'] = $name;
				  $result =  $post -> selectUser($table,"roll_no", $name, $pass_sha);
				  $status = $result[0]['status'];
				  echo $status;

				  if($status == 1){
					header("location:student_index.php?id=$_POST[tok]");
				  }
				  else{
				  header("location:set_phone_no.php?id=$_POST[tok]");
				  }
			}
			else{
				die("aa");
				 header("location: login.php");
			}
		}
		else{
			$rowCount = $post -> loginProcess("teacher","email", $name, $pass_sha);
			global $pre;
			if($rowCount == 1) {
				 	$_SESSION['admin_pass'] = $pass_sha;
				 	$_SESSION['admin_name'] = $name;
					$result =  $post -> selectUser("teacher","email", $name, $pass_sha);
					$position = $result[0]['position'];
					$status = $result[0]['status'];
					if($status == 1 ){
						if($position == "principle"){
							header("location:index.php?id=$_POST[tok]");
						}
						else if(strpos($position, 'hod') !== false){
							header("location:hod_index.php?id=$_POST[tok]");
						}
						else {
							header("location:teacher_index.php?id=$_POST[tok]");
						}
					}
					else{
						header("location:set_phone_no.php?id=$_POST[tok]");
					}
				 
				}
			else{
				header("location: login.php");
			}
		}
	}
	else{
		header("location: login.php");
	}


?>
