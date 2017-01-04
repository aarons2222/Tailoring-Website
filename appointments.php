<?php 

ob_start(); 
                
session_start();

require_once 'scripts/security.php';

$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$fields = isset($_SESSION['fields']) ? $_SESSION['fields'] : [];

?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <title>Edward & Ive - Book an Appointment</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="keywords" content="tailoring, saville row, bespoke suit, custom shirt" />
        <meta name="author" content="Aaron Strickland" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/responsive.css" />
      <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
      <!-- DATE PICKER WIDGET-->
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    </head>
    <body id="page">
        <ul class="cb-slideshow">
            <li><span>Image 01</span></li>
            <li><span>Image 02</span></li>
            <li><span>Image 03</span></li>
            <li><span>Image 04</span></li>
            <li><span>Image 05</span></li>
            <li><span>Image 06</span></li>
        </ul>
 
            <!-- Header inlude -->
           <?php include "header.php" ?>
 <div class="pagewrapper">
        <h1>BOOK AN APPOINTMENT</h1>
        <div id="appointments">
         
            <p>Please fill out the form below to arrange an appointment. We will contact you to arrange a convenient time for your chosen date</p>
           
            <?php if(!empty($errors)): ?>

            <div id="validationError">

              <ul><li><?php echo implode('</li><li>', $errors); ?></li></ul>

            </div>

            <?php endif; ?>
        
            <center>
            <form id="bookAppointment" action="contact.php"  method="POST">
            <!-- NAME -->   
            <div> <!-- NAME -->   
              <input type="name" id="appointmentName" name="appointmentName" placeholder="Name"<?php echo isset($fields['appointmentName']) ? ' value="' . e($fields['appointmentName']) . '"' : '' ?>>
            </div>
            <div><!-- DATE -->   
            <input type="text" id="datepicker" name="datepicker" placeholder="Prefered Date"<?php echo isset($fields['datepicker']) ? ' value="' . e($fields['datepicker']) . '"' : '' ?>>
            </div>
            <div><!-- EMAIL -->   
            <input type="email" id="appointmentEmail" name="appointmentEmail" placeholder="Email"<?php echo isset($fields['appointmentEmail']) ? ' value="' . e($fields['appointmentEmail']) . '"' : '' ?>>
            </div>
            <div><!-- PHONE -->   
            <input type="phone" id="appontmentPhone" name="appontmentPhone" placeholder="Phone"<?php echo isset($fields['appontmentPhone']) ? ' value="' . e($fields['appontmentPhone']) . '"' : '' ?>>
            </div>
            <!-- SUBMIT -->   
            <input type="submit" id="appointmentSubmit" value="Send">
            </form>
         </center>
        </div>
 </div><!--end of page wrapper-->
           <!-- Footer include -->


 
          <?php include "footer.php" ?>

<!-- DATE PICKER WIDGET-->

 <script type="text/javascript" src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
  $(function() {
    $( "#datepicker" ).datepicker();
    $( "#anim" ).change(function() {
      $( "#datepicker" ).datepicker( "option", "showAnim", $( this ).val() );
    });
    
  });
  </script>



<script src="js/jquery.form-validator.js"></script>
<script type="text/javascript"> $.validate(
 
);</script>

    </body>
</html>

<?php 

unset($_SESSION['errors']);
unset($_SESSION['fields']);

?>
