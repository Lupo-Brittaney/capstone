<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_lAZ6ksmPCB7vy1D8fOZig5on",
  "publishable_key" => "pk_test_yTUtEE7CKLWs2IXwcM3xmEQt"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>