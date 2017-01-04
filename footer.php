<!-- SLIDE UP NEWSLETTER SUBSCRIPTION -->


<div id="contactmodal">
        <div class="contactmodal-content">
            <div class="header">
                <a href="#" class="close"><img src="images/close.png" alt="closebox" /></a>
                <h2>Contact</h2>
            </div>
            <div class="copy">
                <p>Please fill out the form below and a member of our team will contact you.</p>
                <form id="contactForm" action="scripts/modalform.php" method="POST">
                            <input type="text" id="name" name="name" placeholder="John Appleseed" data-validation="length" data-validation-length="min2">
                            <input type="tel" id="phone" name="phone" placeholder="020 7689 362" data-validation="number">
                            <input type="email" id="email" name="email" placeholder="example@email.com" data-validation="email">
                            <input type="submit" id="submit" value="Submit" />
                </form><!-- END OF CONTACT FORM-->
     
            </div>
            <div class="cf footer">
                <h4>Click <a href="map.php">here</a> for directions to our store.</h4>
            </div>
        </div>
        <div class="overlay"></div>
    </div>
            
            <footer>
                <ul id="footerlist1">
                    <li><a href="deliveries.php">Deliveries</a></li>
                    <li><a href="deliveries.php">Returns</a></li>
               
                </ul>
                <ul id="footerlist2">
                    <li><a href="history.php">History</a></li>
                    <li><a href="privacy.php">Privacy</a></li>
                    
           
                </ul>
                <h1>Saville Row, London</h1>

                <ul id="rightlist">
                    <li><a href="appointments.php">Appointments</a></li>
                    <li><a id="flip" href="#">Newsletter</a></li>
            

            <section id="panel">
                <p>Enter your email to subscribe</p>

                <form id="newsletterSubscription" name="newsletterSubscription" action="scripts/newsletter.php" method="post">
                <input type="email" id="newsletter" name="newsletter" data-validation="email" >
                <input type="submit" value=">" id="subscribe">
            </form>
      
                    
                </ul>
                <ul>
                <li><a href="#contactmodal">Contact us</a></li>
                <li> | </li>
                <li><a href="appointments.php">Book Appointment</a></li>
            </ul>
                <!-- MOBILE FOOTER -->
           
                
            </footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/jquery.form-validator.js"></script>
<script type="text/javascript"> $.validate(
 
);</script>

<script type="text/javascript"  > 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
});
</script>



