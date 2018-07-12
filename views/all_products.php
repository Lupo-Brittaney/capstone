<?php
// start session
session_start();

// page title name
$page_title = "Home";

include 'views/head.php';
       
include 'views/header.php'; 
                
?>        
        <main class="container">
              <div class="row"> 
                    <?php foreach ($products as $product): ?>
                        <div class=" col-4 product-box ">
                            
                                <img src="images/<?php echo $product['id']; ?>.jpg" class="img-fluid" alt ="<?php echo $product['name']; ?> image">
                                <div class='row'>
                                    <div class='col-9'>
                                        <a href="?action=view_product&amp;productId=<?php echo $product['id']; ?>">
                                           <?php echo $product['name']; ?>
                                        </a>
                                    </div>
                                    <div class='col-3'>
                                        <a href="views/add_cart.php?productId=<?php echo $product['id']; ?>" class="btn btn-dark">Buy</a>
                                    </div>
                                </div>
                           
                        </div>
                    <?php endforeach; ?>
                         </div>
               
            
        </main>
<?php include 'views/footer.php'; ?>