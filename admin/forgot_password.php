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
include("core/init.php");
$phone = "09uab00";
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    if (strpos($name, '-') !== false) {
        $table = substr($name,0,1)."student";
        $result = $post->confirmPhoneByStudent($table,$name);
        if(count($result)>0 && $result[0]['phone_count']<rand(5,10)){
          $phone = $result[0]['phone_no'];
          $phone_count = $result[0]['phone_count'];
        }
        else{
          header('Location: forgot_pass.php?phone=invalid');
        }
    }
    else{ 
      $result = $post->confirmPhoneByTeacher("teacher",$name);
      if(count($result)>0 && $result[0]['phone_count']<rand(5,10)){
        $phone_count = $result[0]['phone_count'];
        $phone = $result[0]['phone_no'];
      }
      else{
        header('Location: forgot_pass.php?phone=invalid');
      }
    }
  }
// verifying POST data and adding the values to session variables
if(isset($_POST["code"])){
  session_start();
  $salt = time('now');
  $token = hash("sha256",$salt);
  $_SESSION['token'] = $token;
  $_SESSION["code"] = $_POST["code"];
  $_SESSION["csrf_nonce"] = $_POST["csrf_nonce"];
  
    define( "FB_ACCOUNT_KIT_APP_ID", "2207570356179010" );
    define( "FB_ACCOUNT_KIT_APP_SECRET", "9267f8227efd1ccec0a89af102cbb25a" );
    $code =  $_POST["code"];
    $phone1 = $_POST['phone_no1'];
    $name = $_POST['name'];
    $phone_count = $_POST['phone_count'];
    $_SESSION['name'] = $name;

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
    $phoneNumber = $final['phone']['national_number'];
    $countryCode= $final['phone']['country_prefix'];
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
  <label>Phone Number : *****<?php echo substr($phone,strlen($phone)-2,2); ?></label>
  <input type="number" name="phone_no" id="phone_no"/>
  <input type="hidden" name="phone_no1" value="<?php echo $phone; ?>">
  <input type="hidden" name="name" value="<?php echo $name; ?>">
  <input type="hidden" name="phone_count" value="<?php echo $phone_count; ?>">
  <input type="hidden" name="code" id="code">
  <input type="hidden" name="csrf_nonce" id="csrf_nonce">
</form>
<div class="buttons">
  <button onclick="phone_btn_onclick();">Login with SMS</button>
  <button onclick="email_btn_onclick();">Login with Email</button>
</div>
<?php
}else{
  if (strpos($phone1, $phoneNumber) !== false) {
    if (strpos($name, '-') !== false) {
      $result = $post->updatePhoneCount(substr($name,0,1)."student",'roll_no',$name,++$phone_count);
  }
  else{ 
    echo $phone_count+1;
    $result = $post->updatePhoneCount("teacher","email",$name,($phone_count+1));
  }
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
    var phone1 = "<?php echo $phone; ?>";
    var phone2 = document.getElementById('phone_no').value;
    if(phone1 === phone2){
    // you can add countryCode and phoneNumber to set values
    AccountKit.login('PHONE', {countryCode:"+95",phoneNumber:phone2}, // will use default values if this is not specified
      loginCallback);
    }
  }
  // email form submission handler
  function email_btn_onclick() {  
    // you can add emailAddress to set value
  
    AccountKit.login('EMAIL', {}, loginCallback);
  }
  // destroying session
  function logout() {
        document.location = 'logout.php';
  }
</script>
</html>
