<?php 

session_start();

include_once("scripts/config.php"

);


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> 
<html class="ie ie6 no-js" lang="en">
   <![endif]-->
   <!--[if IE 7 ]>    
   <html class="ie ie7 no-js" lang="en">
      <![endif]-->
      <!--[if IE 8 ]>    
      <html class="ie ie8 no-js" lang="en">
         <![endif]-->
         <!--[if IE 9 ]>    
         <html class="ie ie9 no-js" lang="en">
            <![endif]-->
            <!--[if gt IE 9]><!-->
            <html class="no-js" lang="en">
               <!--<![endif]-->
               <head>
                  <meta charset="UTF-8" />
                  <title>Edward & Ive - Suits</title>
                  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no" />
                  <meta name="keywords" content="tailoring, saville row, bespoke suit, custom shirt" />
                  <meta name="author" content="Aaron Strickland" />
                  <link rel="stylesheet" type="text/css" href="css/style.css" />
                  <link rel="stylesheet" type="text/css" href="css/responsive.css" />
             

<script type="text/javascript" src="js/modernizr.custom.86080.js"></script>

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
 
                <h1>Suits</h1>
                <div id="suits">
                  <!-- View Cart Box Start -->
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
   echo '<div class="cart-view-table-front" id="view-cart">';
   echo '<h3>Your Shopping Cart</h3>';
   echo '<form method="post" action="cart_update.php">';
   echo '<table width="100%"  cellpadding="6" cellspacing="0">';
   echo '<tbody>';

   $total =0;
   $b = 0;
   foreach ($_SESSION["cart_products"] as $cart_itm)
   {
      $product_name = $cart_itm["product_name"];
      $product_qty = $cart_itm["product_qty"];
      $product_price = $cart_itm["product_price"];
      $product_code = $cart_itm["product_code"];
      $bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
      echo '<tr class="'.$bg_color.'">';
      echo '<td>Qty <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
      echo '<td>'.$product_name.'</td>';
      echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> Remove</td>';
      echo '</tr>';
      $subtotal = ($product_price * $product_qty);
      $total = ($total + $subtotal);
   }
   echo '<td colspan="4">';
   echo 'Total: £', $total;
   echo '<div id="clearaway">&nbsp;</div>';
   echo '<button type="submit">Update</button><a href="view_cart.php" class="button">Checkout</a>';
   echo '</td>';
   echo '</tbody>';
   echo '</table>';
   
   $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
   echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
   echo '</form>';
   echo '</div>';

}
?>
<!-- View Cart Box End -->


<!-- Products List Start -->
<?php
$results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price FROM products ORDER BY id ASC");
if($results){ 
$products_item = '<ul class="products">';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
   <li class="product">
   <form method="post" action="cart_update.php">
   <div class="product-content"><h3>{$obj->product_name}</h3>
   <div class="product-thumb"><img src="images/{$obj->product_img_name}" alt="storeimage"></div>
   <div class="product-desc">{$obj->product_desc}</div>
   <div class="product-info">
   Price {$currency}{$obj->price} 
   
   <fieldset>
   
   
   
   <label>
      <span>Quantity</span>
      <input type="text" size="2" maxlength="2" name="product_qty" value="1" />
   </label>
   
   </fieldset>
   <input type="hidden" name="product_code" value="{$obj->product_code}" />
   <input type="hidden" name="type" value="add" />
   <input type="hidden" name="return_url" value="{$current_url}" />
   <div><button type="submit" class="add_to_cart">Add</button></div>
   </div></div>
   </form>
   </li>
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
?>    
<!-- Products List End -->

                </div><!-- END OF SUITS -->

                  </div> <!-- end of pagewrapper -->
                  
                  <!-- Footer include -->
    
                  <?php include "footer.php" ?>
               </body>
            </html>