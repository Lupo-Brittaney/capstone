<?php
// start session
session_start();

//database connection
require_once('../library/database.php');
require_once('../library/products_db.php');
require_once('../config.php');

$product = get_product($productId);
//reset subtotal
$subtotal = 0;

if (isset($_GET["delete"])) {
    $productId = $_GET["delete"];
    $key = array_search($productId, $_SESSION['cart']);
    unset($_SESSION['cart'][$key]);
}

// page title name
$page_title = "Cart";

include 'head.php';

include 'header.php';
?>     


<main class="container">
    <h1>Cart</h1>
    <div class="row justify-content-center ">
        <div class="col-md-7">
            <table class="table table-bordered  ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">
                            Name
                        </th>

                        <th scope="col">
                            Price
                        </th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($_SESSION['cart'] as $id):
                        $product = get_product($id);
                        $subtotal += $product['price'];
                        ?>
                        <tr>

                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo '$' . $product['price']; ?></td>
                            <td><a href="?delete=<?php echo($id); ?>">Delete from cart</a></td>



                        </tr>

                    <?php endforeach; ?>
                    <tr>

                        <th>Subtotal</th>
                        <th id ='subtotal'><?php echo '$' . $subtotal; ?></th>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <form action="/index.php" method="post">
        <input id="action" name="action" type="hidden" value="addCustomer">
        <input id='subtotal' name='subtotal' type ='hidden' value="<?php echo $subtotal; ?>">
        <fieldset>
            <legend>Customer information:</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="billFirstName">First Name</label>
                    <input type="text" class="form-control" id="billFirstName" name="billFirstName" placeholder="First Name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="billLastName">Last Name</label>
                    <input type="text" class="form-control" id="billLastName" name="billLastName" placeholder="Last Name" required>
                </div>
            </div>
            <div class="form-group ">
                <label for="billEmail">Email</label>
                <input type="email" class="form-control" id="billEmail" name="billEmail" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="billAddress">Address</label>
                <input type="text" class="form-control" id="billAddress" name="billAddress" placeholder="1234 Main St" required>
            </div>
            <div class="form-group">
                <label for="billAddress2">Address 2</label>
                <input type="text" class="form-control" id="billAddress2" name="billAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="billCity">City</label>
                    <input type="text" class="form-control" id="billCity" name="billCity" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="billState">State</label>
                    <input type="text" class="form-control" id="billState" name="billState" placeholder="State" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="billZip">Zip</label>
                    <input type="text" class="form-control" id="billZip" name="billZip" required>
                </div>
            </div>
        </fieldset>
        <input type="checkbox" onclick="SetShipping(this.checked);" /> Same as Billing
        <fieldset>
            <legend>Shipping Information:</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="shipFirstName">First Name</label>
                    <input type="text" class="form-control" id="shipFirstName" name="shipFirstName" placeholder="First Name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="shipLastName">Last Name</label>
                    <input type="text" class="form-control" id="shipLastName" name="shipLastName" placeholder="Last Name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="shipAddress">Address</label>
                <input type="text" class="form-control" id="shipAddress" name="shipAddress" placeholder="1234 Main St" required>
            </div>
            <div class="form-group">
                <label for="shipAddress2">Address 2</label>
                <input type="text" class="form-control" id="shipAddress2" name="shipAddress2" placeholder="Apartment, studio, or floor" >
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="shipCity">City</label>
                    <input type="text" class="form-control" id="shipCity" name="shipCity" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="shipState">State</label>
                    <input type="text" class="form-control" id="shipState" name="shipState" placeholder="State" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="shipZip">Zip</label>
                    <input type="text" class="form-control" id="shipZip" name="shipZip" required>
                </div>
            </div>
            <button type="submit" class="btn btn-dark">Save</button>
        </fieldset>
        <script type="text/javascript">

            function SetShipping(checked) {
                if (checked) {
                    document.getElementById('shipFirstName').value = document.getElementById('billFirstName').value;
                    document.getElementById('shipLastName').value = document.getElementById('billLastName').value;
                    document.getElementById('shipAddress').value = document.getElementById('billAddress').value;
                    document.getElementById('shipAddress2').value = document.getElementById('billAddress2').value;
                    document.getElementById('shipCity').value = document.getElementById('billCity').value;
                    document.getElementById('shipState').value = document.getElementById('billState').value;
                    document.getElementById('shipZip').value = document.getElementById('billZip').value;
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
      

