<?php
// start session
session_start();

//database connection
require_once('../library/database.php');
require_once('../library/products_db.php');
require_once('../config.php'); 

// page title name
$page_title = "Cart";

include 'head.php';
       
include 'header.php'; 
?>     


<main class="container">
    <h1>Cart</h1>
    <?php include 'cart.php'; ?>
    <form action="confirmation.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_yTUtEE7CKLWs2IXwcM3xmEQt"
    data-amount="999"
    data-name="Colorado Wild"
    data-description="Digital Download"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto">
  </script>
</form>