<?php


if (isset($_POST['submit'])) {
    
    
    $con = mysqli_connect("DB_ADDRESS", "DB_USERNAME", "DB_PASSWORD"); // EDIT
    if (!$con) {
        die("can not connect: " . mysql_error());
    }
    
    mysql_select_db("DB_NAME", $con); // EDIT
    
    $sql = "INSERT INTO `maillist` (email) VALUES ('$_POST[newsletter]')";
    
    
    mysql_query($sql, $con);
    
    mysql_close($con);
}

?>
<?php
$field_email = $_POST['newsletter'];


$email_to      = 'EMAIL TO ADDRESS';  // EDIT
$email_subject = 'Newsletter Subscription';


$body_message = 'I have subscribed to your mailing list';

$headers = "From: $field_email\r\n";
$headers .= "Reply-To: $field_email\r\n";

$mail_status = mail($email_to, $email_subject, $body_message, $headers);



$mail_status = mail($field_email, "Mailing list subscription!", "Dear Sir/Madam,


Thank you for subscribing to our monthly newsletter!


Yours sincerely,


Edward & Ive", $headers = 'From: subscriptions@edwardandive.co.uk');  // EDIT


if ($mail_status) {
?>
<script language="javascript" type="text/javascript">
// Print a message
alert('Thank you for subscribing to our mailing list..');
// Redirect to some page of the site.
window.location = '../index.php';
</script>
<?php
}

else {
?>
<script language="javascript" type="text/javascript">
// Print a message
alert('Message failed. Please, email: subscriptions@edwardandive.co.uk');
// Redirect to some page of the site.
window.location = '../index.php';
</script>
<?php
}
?>

