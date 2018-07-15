<?php
// page title name
$page_title = "Checkout";

include 'views/head.php';

include 'views/header.php';
var_dump($add_result);
?>     


<main class="container">
    <h1>Checkout</h1>
    <div class="row">
        <div class="col-lg-6 info-box">
            <h2>Billing Information</h2>
            <h3>Name</h3>
            <p><?php echo $billFirstName . ' ' . $billLastName ?></p>
            <h3>Email</h3>
            <p><?php echo $billEmail ?></p>
            <h3>Address</h3>
            <p><?php echo $billAddress ?></p>
            <p><?php echo $billAddress2 ?></p>
            <p><?php echo $billCity . ', ' . $billState . ' ' . $billZip ?></p>


        </div>
        <div class="col-lg-6 info-box">
            <h2>Shipping Information</h2>
            <h3>Name</h3>
            <p><?php echo $shipFirstName . ' ' . $shipLastName ?></p>
            <h3>Address</h3>
            <p><?php echo $shipAddress ?></p>
            <p><?php echo $shipAddress2 ?></p>
            <p><?php echo $shipCity . ', ' . $shipState . ' ' . $shipZip ?></p>

        </div>
    </div>
    <div class="row">
        <div class="col">
            <h2>Total</h2>
            <p><?php echo '$' . $total ?></p>
        </div>
    </div>


    <form action="/index.php" method="POST">
        <input id="action" name="action" type="hidden" value="charge">
        <input id="action" name="orderId" type="hidden" value="<?php echo $add_result ?>">
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_yTUtEE7CKLWs2IXwcM3xmEQt"
            data-amount=''
            data-name="Colorado Wild"
            data-description="Digital Download"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto">
        </script>
    </form>