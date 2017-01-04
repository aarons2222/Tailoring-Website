
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript" src="js/Cookie.js"></script>

<script type="text/javascript">
var $j = jQuery.noConflict();
    $j(document).ready(function() {
        $j(document).edwardCookie({
            // Options
        });
    });
</script>
<header>
    <!--BRAND LOGO-->
    <div id="logobox">
        <a href="index.php"><img id="logo" src="images/logo.png" alt="logo">
        </a>
    </div>
    <!-- NAV BAR -->
    <nav>

        <ul class="dropdown">
            <li><a href="shop.php">Suits</a>
            </li>
            <li>|</li>
            <li><a href="fitting.php">Fitting Service</a>
            </li>
            <li>|</li>
            <li><a href="history.php">History</a>
            </li>
            <li>|</li>
            <li>
                <a href="#">Contact</a>
                <ul>
                    <li><a href="#contactmodal">Send us a Message</a>
                    </li>
                    <li><a href="appointments.php">Appointments</a>
                    </li>
                    <li><a href="map.php">Directions</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>


    <!-- MOBILE DROPDOWN NAV -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function($) {
            $('#mobileMenu').find('.mobileMenuToggle').click(function() {

                //Expand or collapse this panel
                $(this).next().slideToggle('slideUp');

                //Hide the other panels
                $(".mobileMenuContent").not($(this).next()).slideUp('slide');

            });
        });
    </script>
    <script type="text/javascript">
        $(function() {

            var config = {
                sensitivity: 3, // number = sensitivity threshold (must be 1 or higher)    
                interval: 200, // number = milliseconds for onMouseOver polling interval    
                over: doOpen, // function = onMouseOver callback (REQUIRED)    
                timeout: 200, // number = milliseconds delay before onMouseOut    
                out: doClose // function = onMouseOut callback (REQUIRED)    
            };

            function doOpen() {
                $(this).addClass("hover");
                $('ul:first', this).css('visibility', 'visible');
            }

            function doClose() {
                $(this).removeClass("hover");
                $('ul:first', this).css('visibility', 'hidden');
            }

            $("ul.dropdown li").hoverIntent(config);

            $("ul.dropdown li ul li:has(ul)").find("a:first").append(" &raquo; ");

        });
    </script>

    <div id="mobileMenu">
        <div class="mobileMenuToggle">
            <h4>Menu</h4>
        </div>
        <div class="mobileMenuContent">

            <h3><a href="shop.php">Store</a></h3>
            <hr>
            <h3><a href="map.php">Directions</a></h3>
            <hr>
            <h3><a href="fitting.php">Personal Tailoring</a></h3>
            <hr>
            <h3><a href="history.php"> Company History</a></h3>
            <hr>
            <h3><a href="privacy.php">Privacy Policy</a></h3>

        </div>


    </div>

</header>

