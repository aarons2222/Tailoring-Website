<?php 

session_start();

require_once 'scripts/phpmailer/PHPMailerAutoload.php';

//holds errors
$errors = [];

if(isset($_POST['appointmentName'], $_POST['datepicker'], $_POST['appointmentEmail'], $_POST['appontmentPhone']))
{
	$fields = [
		'name' => $_POST['appointmentName'],
		'date' => $_POST['datepicker'],
		'email' => $_POST['appointmentEmail'],
		'Phone' => $_POST['appontmentPhone']
	];

	foreach ($fields as $field => $data) {
		if (empty($data)) {
			$errors[] = 'The ' . $field . ' field is required.';
		}
	}

	if(empty($errors)) {

		$m = new PHPMailer;

		
// 		$m->SMTPAuth = true;


		$m->Host = ' smtp.live.com';
		$m->Username = 'aaronstrickland@hotmail.co.uk';
		$m->Password = 'London2020';
		$m->SMTPSecure = 'ssl';
		$m->Port = 465;

		$m->isHTML(true);
		$m->Subject = 'Appointment Request';

		$m->FromName = $_POST['appointmentEmail'];

		$m->Body = "<html>\n";
		$m->Body .= "<body style=\"background-color:#a2a2a2; margin:0; padding:0px; text-align:center;\">\n";
		$m->Body .= "<img src=\"http://www.aaronstrickland.co.uk/assessment/images/logo.png\">";
		$m->Body .= "<div style=\" width:100%; background-color:#4c4c4c; color:#ffffff; margin:0px; height: auto;\";><h4>Personal Tailoring Appointment</h4></div>";
		$m->Body .= "<h4 style=\"text-decoration:underline; margin:0; width:100%; background-color:#4c4c4c;  color: #f85c37;\">Customer Name</h4>";
		$m->Body .= $_POST['appointmentName']; 
		$m->Body .= "<br>\n";
		$m->Body .= "<h4 style=\"text-decoration:underline; margin:0; width:100%; background-color:#4c4c4c;  color: #f85c37;\">Chosen Date</h4>";
		$m->Body .= $_POST['datepicker']; 
		$m->Body .= "<br>\n";
		$m->Body .= "<h4 style=\"text-decoration:underline; margin:0; width:100%; background-color:#4c4c4c;  color: #f85c37;\">Customer Phone Number</h4>";
		$m->Body .= $_POST['appontmentPhone'];
		$m->Body .= "</body>\n";
		$m->Body .= "</html>\n";
	

	


		$m->AddAddress('aaronstrickland@hotmail.co.uk', 'Aaron Strickland');

		if($m->send()){ 

			  echo "<script type='text/javascript'> alert('We have your request! A member of our team will contact you soon!') 

			  	window.location = 'appointments.php';
			  </script>";
			
			die();
		}else{
			$errors[] = 'Sorry, could not send email. Please try later.';
	
			}
	}

} else {
	$errors[] = 'Something went wrong.';
} 

$_SESSION['errors'] = $errors;
$_SESSION['fields'] = $fields;

header('Location: appointments.php');

?>