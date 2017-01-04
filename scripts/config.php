<!--   DATABASE CONNECTION FILE -->

<?php
$currency = '£'; //Currency Character or code

$db_username = 'DB_USENAME';
$db_password = 'DB_PASSWORD';
$db_name = 'DB_NAME';
$db_host = 'DB_HOST';
//LOCALHOST
/*$db_username = 'root@localhost';
$db_password = '';
$db_name     = 'test';
$db_host     = 'localhost'; */

$shipping_cost = 5.95; //shipping cost
$taxes         = array( //List your Taxes percent here.
    'VAT' => 12,
    'Service Tax' => 5
);
//connect to MySql                        
$mysqli        = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($mysqli->connect_error) {
    die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
?>