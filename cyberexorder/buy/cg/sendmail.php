<?php
# ----------------------------------------------------
# -----
# ----- This script was generated by PHP-Form Wizard 1.2.6 on 2012/06/03 at 18:54:14
# -----
# ----- http://www.tools4php.com
# -----
# ----------------------------------------------------


// Receiving variables
@$pfw_ip= $_SERVER['REMOTE_ADDR'];
@$AccountNumber = addslashes($_POST['AccountNumber']);
@$AccountName = addslashes($_POST['AccountName']);
@$Batch = addslashes($_POST['Batch']);
@$email = addslashes($_POST['email']);

// Validation
if (strlen($AccountNumber) == 0 )
{
header("Location: error.htm");
exit;
}

if (strlen($Batch) == 0 )
{
header("Location: error.htm");
exit;
}

if (strlen($email) == 0 )
{
header("Location: error.htm");
exit;
}

//Sending Email to form owner
$pfw_header = "From: $email\n"
  . "Reply-To: $email\n";
$pfw_subject = "Paid report c-gold";
$pfw_email_to = "admin@cyberex.jp";
$pfw_message = "Visitor's IP: $pfw_ip\n"
. "AccountNumber: $AccountNumber\n"
. "AccountName: $AccountName\n"
. "Batch: $Batch\n"
. "email: $email\n";
@mail($pfw_email_to, $pfw_subject ,$pfw_message ,$pfw_header ) ;

//Sending auto respond Email to visitor
$pfw_header = "From: admin@cyberex.jp\n"
  . "Reply-To: admin@cyberex.jp\n";
$pfw_subject = "Your order process has been Approved !!";
$pfw_email_to = "$email";
$pfw_message = "Dear $name\n"
. "\n"
. "We review check in our c-gold account. \n"
. "after your money received completed, will sent your request e-currency within 3-5 business day.\n"
. "\n"
. "To check your order status and transaction on this page\n"
. "\n"
. "https://cyberex.jp/tracking/\n"
. "\n"
. "\n"
. "Thanks and best regards\n"
. "\n"
. "+--------------------------------------+\n"
. " Cyber Exchange Service Japan\n"
. " http://www.cyberex.jp/\n"
. "+--------------------------------------+";
@mail($pfw_email_to, $pfw_subject ,$pfw_message ,$pfw_header ) ;

header("Location: completed.htm");

?>
