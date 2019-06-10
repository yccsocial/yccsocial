<?php
// function to verify session status
function is_session_started()
{
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}
// verifying POST data and adding the values to session variables
if(isset($_POST["code"])){
  session_start();
  if(isset($_GET['id']) != $_SESSION['token']){
    header("location:login.php");
  }
  $salt = time('now');
  $_SESSION["code"] = $_POST["code"];
  $_SESSION["csrf_nonce"] = $_POST["csrf_nonce"];
  
    define( "FB_ACCOUNT_KIT_APP_ID", "2207570356179010" );
    define( "FB_ACCOUNT_KIT_APP_SECRET", "9267f8227efd1ccec0a89af102cbb25a" );
    $code =  $_POST["code"];

    $auth = file_get_contents( 'https://graph.accountkit.com/v1.1/access_token?grant_type=authorization_code&code='.  $code .'&access_token=AA|'. FB_ACCOUNT_KIT_APP_ID .'|'. FB_ACCOUNT_KIT_APP_SECRET );

    $access = json_decode( $auth, true );

    if( empty( $access ) || !isset( $access['access_token'] ) ){
        return array( "status" => 2, "message" => "Unable to verify the phone number." );
    }

    //App scret proof key Ref : https://developers.facebook.com/docs/graph-api/securing-requests
    $appsecret_proof= hash_hmac( 'sha256', $access['access_token'], FB_ACCOUNT_KIT_APP_SECRET ); 

    //echo 'https://graph.accountkit.com/v1.1/me/?access_token='. $access['access_token'];
    $ch = curl_init();

    // Set query data here with the URL
    curl_setopt($ch, CURLOPT_URL, 'https://graph.accountkit.com/v1.1/me/?access_token='. $access['access_token'].'&appsecret_proof='. $appsecret_proof ); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch, CURLOPT_TIMEOUT, '4');
    $resp = trim(curl_exec($ch));

    curl_close($ch);

    $final = json_decode( $resp, true );

    if( empty( $final ) || !isset( $final['phone'] ) || isset( $final['error'] ) ){
        return array( "status" => 2, "message" => "Unable to verify the phone number." );
    }

    $phoneNumber ='0'.$final['phone']['national_number'];
    }
?>
<html>
<head>
  <title>Login with Account Kit</title>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="ak-icon.png">
  <link rel="stylesheet" href="css.css">
  <!--Hotlinked Account Kit SDK-->
  <script src="https://sdk.accountkit.com/en_EN/sdk.js"></script>
</head>
<body>
<?php
// verifying if the session exists
if(is_session_started() === FALSE && !isset($_SESSION)){
?>
<h1 class="ac">Login with Account Kit</h1>
<p class="ac">This example shows you how to implement<br>Facebook Account Kit for web using PHP.</p>
<form action="" method="POST" id="my_form">
  <input type="number" name="phone_no" id="phone_no"/>
  <input type="hidden" name="phone_no1" >
  <input type="hidden" name="name" value="<?php echo $name; ?>">
  <input type="hidden" name="code" id="code">
  <input type="hidden" name="csrf_nonce" id="csrf_nonce">
</form>
<div class="buttons">
  <button onclick="phone_btn_onclick();">Set Phone No.</button>
</div>
<?php
}else{
    $name = $_SESSION['admin_name'];
    $pass = $_SESSION['admin_pass'];
    $token = $_SESSION['token'];
    include("core/init.php");
    if (strpos($name, '-') !== false) {
        $table = substr($name,0,1)."student";
        $rowCount = $post->updatePhone($table,$name,"roll_no",$pass,$phoneNumber);
        if($rowCount==1){
            header("location:student_index.php?id=$token");
        }
    }
    else{ 
        $rowCount = $post->updatePhone("teacher",$name,"email",$pass,$phoneNumber);
        if($rowCount==1){
            $result =  $post -> selectUser("teacher","email", $name, $pass);
			$position = $result[0]['position'];
            if($position == "principle"){
                header("location:index.php?id=$token");
            }
            else if(strpos($position, 'hod') !== false){
                header("location:hod_index.php?id=$token");
            }
            else {
                header("location:teacher_index.php?id=$token");
            }
        }
    }
   
    if (strpos($phone1, $phoneNumber) !== false) {
    echo $phoneNumber;
    header("Location: new_password.php?tok=$token"); 
}
}
?>
</body>
<script>
  // initialize Account Kit with CSRF protection

  AccountKit_OnInteractive = function(){
    AccountKit.init(
      {
        appId:2207570356179010,         
        state:"abcdldodoldoddld", 
        version:"v1.0"
      }
      //If your Account Kit configuration requires app_secret, you have to include ir above
    );
  };
  // login callback
  function loginCallback(response) {
    console.log(response);
    if (response.status === "PARTIALLY_AUTHENTICATED") {
      document.getElementById("code").value = response.code;
      document.getElementById("csrf_nonce").value = response.state;
      document.getElementById("my_form").submit();
    }
    else if (response.status === "NOT_AUTHENTICATED") {
      // handle authentication failure
      console.log("Authentication failure");
    }
    else if (response.status === "BAD_PARAMS") {
      // handle bad parameters
      console.log("Bad parameters");
    }
  }
  // phone form submission handler
  function phone_btn_onclick() {
    var phone2 = document.getElementById('phone_no').value;
    // you can add countryCode and phoneNumber to set values
    AccountKit.login('PHONE', {countryCode:"+95",phoneNumber:phone2}, // will use default values if this is not specified
      loginCallback);
  }
  // destroying session
  function logout() {
        document.location = 'logout.php';
  }
</script>
</html>
