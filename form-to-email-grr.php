<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$yesno = $_POST['yesno'];
$yes = $_POST['yes'];
$no = $_POST['no'];
$visitor_email = $_POST['email'];
$guestcount = $_POST['guestcount'];
$guestnames = $_POST['guestnames'];

$message_yes = $_POST['message_yes'];
$message_no = $_POST['message_no'];

//Validate first
if (isset($_POST['yes'])) {
  $checkBoxValue = "yes";
} else {
  $checkBoxValue = "no";
}

if (isset($_POST['no'])) {
  $checkBoxValue = "no";
} else {
  $checkBoxValue = "yes";
}


// if(empty($firstname)||empty($lastname))
// {
//     echo "We really do need your name.";
//     exit;
// }

// if(empty($yesno))
// {
//     echo "We actually would very much like to know if you're coming.";
//     exit;
// }
//
// if (isset($_POST['yesno']))   // if ANY of the options was checked
//   echo $_POST['yesno'];    // echo the choice
// else
//   echo "You need to tell us whether you're coming to TheParty. Please select Yes or No.";


if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

$email_from = 'rsvp@theparty.is';//<== update the email address
$email_subject = "New RSVP for deParty";
$email_body = "You have received a new RSVP from $firstname $lastname.\n".

    "RSVP: $yesno\n".
		"Email: $visitor_email\n".
		"Number in Party:$guestcount.\n".
		"Guest Names: $guestnames.\n".

    "Questions/Curiousities:\n $message_yes\n\n".
    "The No message:\n $message_no\n\n".

$to = "rsvp@theparty.is";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: thankyou.html');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}

?>
