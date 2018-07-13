<?php
// start session
session_start();

//database connection
require_once('../library/database.php');
require_once('../library/products_db.php');
require_once('../config.php'); 

$product = get_product($productId);


if ( isset($_GET["delete"]) )
   {
   $productId = $_GET["delete"];
   $key= array_search($productId, $_SESSION['cart']);
   unset($_SESSION['cart'][$key]);
   }

// page title name
$page_title = "Cart";

include 'head.php';
       
include 'header.php'; 
             
?>     


<main class="container">
    <h1>Cart</h1>
    <?php include 'cart.php'; ?>
    <form action="/index.php" method="post">
        <input id="action" name="action" type="hidden" value="addCustomer">
        <fieldset>
            <legend>Customer information:</legend>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="billingFirstName">First Name</label>
            <input type="text" class="form-control" id="billingFirstName" placeholder="First Name" required>
          </div>
          <div class="form-group col-md-6">
            <label for="billingLastName">Last Name</label>
            <input type="text" class="form-control" id="billingLastName" placeholder="Last Name" required>
          </div>
        </div>
        <div class="form-group ">
            <label for="billingEmail">Email</label>
            <input type="email" class="form-control" id="billingEmail" placeholder="Email" required>
          </div>
        <div class="form-group">
          <label for="billingAddress">Address</label>
          <input type="text" class="form-control" id="billingAddress" placeholder="1234 Main St" required>
        </div>
        <div class="form-group">
          <label for="billingAddress2">Address 2</label>
          <input type="text" class="form-control" id="billingAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="billingCity">City</label>
            <input type="text" class="form-control" id="billingCity" required>
          </div>
          <div class="form-group col-md-4">
            <label for="billingState">State</label>
             <input type="text" class="form-control" id="billingState" placeholder="State" required>
          </div>
          <div class="form-group col-md-2">
            <label for="billingZip">Zip</label>
            <input type="text" class="form-control" id="billingZip" required>
          </div>
        </div>
        </fieldset>
        <input type="checkbox" onclick="SetShipping(this.checked);" /> Same as Billing
        <fieldset>
            <legend>Shipping Information:</legend>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="shipFirstName">First Name</label>
            <input type="text" class="form-control" id="shipFirstName" placeholder="First Name" required>
          </div>
          <div class="form-group col-md-6">
            <label for="shipLastName">Last Name</label>
            <input type="text" class="form-control" id="shipLastName" placeholder="Last Name" required>
          </div>
        </div>
        <div class="form-group">
          <label for="shipAddress">Address</label>
          <input type="text" class="form-control" id="shipAddress" placeholder="1234 Main St" required>
        </div>
        <div class="form-group">
          <label for="shipAddress2">Address 2</label>
          <input type="text" class="form-control" id="shipAddress2" placeholder="Apartment, studio, or floor" >
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="shipCity">City</label>
            <input type="text" class="form-control" id="shipCity" required>
          </div>
          <div class="form-group col-md-4">
            <label for="shipState">State</label>
             <input type="text" class="form-control" id="shipState" placeholder="State" required>
          </div>
          <div class="form-group col-md-2">
            <label for="shipZip">Zip</label>
            <input type="text" class="form-control" id="shipZip" required>
          </div>
        </div>
            <button type="submit" class="btn btn-dark">Save</button>
        </fieldset>
        <script type="text/javascript">

            function SetShipping(checked) {
                if (checked) {
                    document.getElementById('shipFirstName').value = document.getElementById('billingFirstName').value;
                    document.getElementById('shipLastName').value = document.getElementById('billingLastName').value;
                    document.getElementById('shipAddress').value = document.getElementById('billingAddress').value;
                    document.getElementById('shipAddress2').value = document.getElementById('billingAddress2').value;
                    document.getElementById('shipCity').value = document.getElementById('billingCity').value;
                    document.getElementById('shipState').value = document.getElementById('billingState').value;
                    document.getElementById('shipZip').value = document.getElementById('billingZip').value;
                } else {
                    document.getElementById('shipFirstName').value = '';
                    document.getElementById('shipLastName').value = '';
                    document.getElementById('shipAddress').value = '';
                    document.getElementById('shipAddress2').value = '';
                    document.getElementById('shipCity').value = '';
                    document.getElementById('shipState').value = '';
                    document.getElementById('shipZip').value = '';
                }
            }
</script>
    </form>
       



       
</main>
<?php include 'footer.php'; ?>
      

