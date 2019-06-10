<?php  
include("core/init.php");
$output = '';  
$message = '';
$name = htmlspecialchars($_GET['name'],ENT_QUOTES);
$email = htmlspecialchars($_GET['email'],ENT_QUOTES);
$id = htmlspecialchars($_GET['id'], ENT_QUOTES);
$password="123";

if($_GET["id"] != '')  
{
    
    $isUpdate = $post->updateHODTeacher($id, $name, $email, $password);
    
    if($isUpdate>0)  {  
        $from = "aungpyaesone.aps45@gmailcom";
        $to = $email;
        $subject = "Simple test for mail function";
        $message =$password;
        $headers = "From:" . $from;

        if(mail($to,$subject,$message, $headers))
        {
            echo "Test email send.";
            header("location:user.php?id=$_POST[tok]&&se");
        } 
        else 
        {
            echo "Failed to send.";
        }
    
    }  
}
else{
    echo "no id";
}

?>