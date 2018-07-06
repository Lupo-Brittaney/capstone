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
                        <div class=" col-4">
                            
                                <img src="images/<?php echo $product['id']; ?>.jpg" class="img-fluid" alt ="<?php echo $product['name']; ?> image">
                                <br>
                                <a href="?action=view_product&amp;productId=<?php echo $product['id']; ?>">
                                   <?php echo $product['name']; ?>
                                </a>
                           
                        </div>
                    <?php endforeach; ?>
                         </div>
               
            
        </main>
<?php include 'views/footer.php'; ?>