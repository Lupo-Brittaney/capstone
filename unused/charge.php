<?php
  require_once('../config.php');
  require_once('../library/database.php');
  require_once('../library/customer_db.php');
  
  

  $token  = $_POST['stripeToken'];
  $email  = $_POST['stripeEmail'];
  
  $customer= get_customer($email);
  $customerId=$customer[0];
  $chargeAmount2= get_subtotal($customerId);
  $chargeAmount3 = $chargeAmount2[0];
$chargeAmount= '500';
  
  $customer = \Stripe\Customer::create(array(
      'email' => $email,
      'source'  => $token
  ));

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => $chargeAmount3,
      'currency' => 'usd'
  ));
?>

