<?php

$field_name  = $_POST['name'];
$field_phone = $_POST['phone'];
$field_email = $_POST['email'];

$email_to      = 'aaron.strickland@icloud.com';
$email_subject = 'Contact Form Message';


$body_message .= 'Name: ' . $field_name . "\n";
$body_message .= 'Phone: ' . $field_phone . "\n";
$body_message .= 'Email: ' . $field_email;

$headers = "From: $field_email\r\n";
$headers .= "Reply-To: $field_email\r\n";

$mail_status = mail($email_to, $email_subject, $body_message, $headers);

if ($mail_status) {
    
    
?>
<script language="javascript" type="text/javascript">
// Print a message
alert('Thank you for contacting Edward & Ive, a member of our team will contact you shortly.');
// Redirect to some page of the site.
window.location = '../index.php';
</script>
<?php
}

else {
?>
<script language="javascript" type="text/javascript">
// Print a message
alert('Oops!!!  Something went wrong - Please try again later');
// Redirect to some page of the site.
window.location = '../index.php';
</script>
<?php
}
?>
