<?php 

if(isset($_POST['email'])) {
 
     
 
    // ADD YOUR EMAIL WHERE YOU WANT TO RECIEVE THE MESSAGES
 
    $email_to = "enquiries@urbanchain.co.uk";
 
    $email_subject = "Generation - Request";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo '<div class="alert alert-danger alert-dismissible wow fadeInUp" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Something is wrong:</strong><br>';
  
        echo $error."<br />";
 
        echo '</div>';
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
  
        !isset($_POST['email']) ||
 
        !isset($_POST['phone']) ||
 
        !isset($_POST['genLocation']) ||
        
        !isset($_POST['genType']) ||
        
        !isset($_POST['loa']) ||
        
        !isset($_POST['mpanInfo'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $name = $_POST['name']; // required
  
    $email_from = $_POST['email']; // required
 
    $telephone = $_POST['phone']; //  required
    
    $genLocation = $_POST['genLocation']; //  required

    $genType = $_POST['genType']; //  required

    $loa = $_POST['loa']; //  required

    $mpanInfo = $_POST['mpanInfo']; //  required

    
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($message) < 2) {
 
    $error_message .= 'The message you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Generation details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
  
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
 
    $email_message .= "Location: ".clean_string($genLocation)."\n";

    $email_message .= "Type: ".clean_string($genType)."\n";

    $email_message .= "LoA: ".clean_string($loa)."\n";

    $email_message .= "MPAN Details Available: ".clean_string($mpanInfo)."\n";

    $email_message .= "MPAN: ".clean_string($profileType + $MTMC + $LLF + $disID + $uniqueID + $checkDigit)."\n";


 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 ?>

 <div class="alert alert-success alert-dismissible wow fadeInUp" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   Thank you for contacting us. We will get back to you shortly.
 </div>

 <?php } ?>