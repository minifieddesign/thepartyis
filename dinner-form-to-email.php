<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
// guest 1
$guestname1 = $_POST['guestname1'];
$dinner1 = $_POST['dinner1'];
$veg1 = $_POST['veg1'];
$chx1 = $_POST['chx1'];
$lamb1 = $_POST['lamb1'];
$message_chef1 = $_POST['message_chef1'];

// guest 2
$guestname2 = $_POST['guestname2'];
$dinner2 = $_POST['dinner2'];
$veg2 = $_POST['veg2'];
$chx2 = $_POST['chx2'];
$lamb2 = $_POST['lamb2'];
$message_chef2 = $_POST['message_chef2'];

// guest 3
$guestname3 = $_POST['guestname3'];
$dinner3 = $_POST['dinner3'];
$veg3 = $_POST['veg3'];
$chx3 = $_POST['chx3'];
$lamb3 = $_POST['lamb3'];
$message_chef3 = $_POST['message_chef3'];

// guest 4
$guestname4 = $_POST['guestname4'];
$dinner4 = $_POST['dinner4'];
$veg4 = $_POST['veg4'];
$chx4 = $_POST['chx4'];
$lamb4 = $_POST['lamb4'];
$message_chef4 = $_POST['message_chef4'];

// guest 5
$guestname5 = $_POST['guestname5'];
$dinner5 = $_POST['dinner5'];
$veg5 = $_POST['veg5'];
$chx5 = $_POST['chx5'];
$lamb5 = $_POST['lamb5'];
$message_chef5 = $_POST['message_chef5'];


//Validate first
// if (isset($_POST['veg1'])) {
//   $checkBoxValue = "veg1";
// } else {
//   $checkBoxValue = "chx1";
// 	$checkBoxValue = "lamb1";
// }
//
// if (isset($_POST['chx1'])) {
//   $checkBoxValue = "chx1";
// } else {
//   $checkBoxValue = "veg1";
//   $checkBoxValue = "lamb1";
// }
//
// if (isset($_POST['lamb1'])) {
//   $checkBoxValue = "lamb1";
// } else {
//   $checkBoxValue = "veg1";
//   $checkBoxValue = "chx1";
// }




//Validate first
// if (isset($_POST['veg'])) {
//   $checkBoxValue = "veg";
// } else {
//   $checkBoxValue = "chx";
// 	$checkBoxValue = "lamb";
// }
//
// if (isset($_POST['chx'])) {
//   $checkBoxValue = "chx";
// } else {
//   $checkBoxValue = "veg";
//   $checkBoxValue = "lamb";
// }
//
// if (isset($_POST['lamb'])) {
//   $checkBoxValue = "lamb";
// } else {
//   $checkBoxValue = "veg";
//   $checkBoxValue = "chx";
// }



$email_from = 'rsvp@theparty.is';//<== update the email address
$email_subject = "New CPH Dinner Selection for deParty";
$email_body = "You have received a new CPH Dinner Selection from $guestname1\n".

    "Guest One: $guestname1\n".
		"Entree selection: $dinner1\n".
		"Notes for the chef: $message_chef1\n\n".

		"Guest Two: $guestname2\n".
		"Entree selection: $dinner2\n".
		"Notes for the chef: $message_chef2\n\n".

		"Guest Three: $guestname3\n".
		"Entree selection: $dinner3\n".
		"Notes for the chef: $message_chef3\n\n".

		"Guest Four: $guestname4\n".
		"Entree selection: $dinner4\n".
		"Notes for the chef: $message_chef4\n\n".

		"Guest Five: $guestname5\n".
		"Entree selection: $dinner5\n".
		"Notes for the chef: $message_chef5\n\n".

$to = "rsvp@theparty.is";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $email_from \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: nomnomnom.html');


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
