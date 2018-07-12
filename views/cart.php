<?php
// start session
session_start();

//database connection
require_once('../library/database.php');
require_once('../library/products_db.php');

$product = get_product($productId);
$subtotal= 0;

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
            <table>
  <thead>
    <tr>
      <th>
        id
      </th>
      <th>
        name
      </th>

      <th>
        price
      </th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($_SESSION['cart'] as $id):
        $product= get_product($id);
        $subtotal += $product['price'];
      
          ?>
      <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $product['name']; ?></td>
        <td><?php echo $product['price']; ?></td>
        <td><a href="?delete=<?php echo($id); ?>">Delete from cart</a></td>
        


      </tr>
     
    <?php endforeach; ?>
       <tr>
          <td></td>
          <td>Subtotal</td>
          <td><?php echo $subtotal; ?></td>
      </tr>
  </tbody>
</table>
               
            
        </main>
<?php include 'footer.php'; ?>
