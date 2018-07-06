<?php
// start session
session_start();

// page title name
$page_title = "Product";

include 'views/head.php';
       
include 'views/header.php'; 
                
?> 
        <main class="container">
            <div class="row justify-content-center">
                <div class ="col-9  ">
                    
                    <img src="<?php echo $image; ?>" class="img-fluid" alt ="<?php echo $image_alt; ?>">
                    <h2><?php echo $name; ?></h2>
                    <p><?php echo $description;?></p>
                    <p>$<?php echo $price;?></p>
                    <button type="button" class="btn btn-dark">Buy</button>
                </div>
            </div>
            
        </main>
<?php include 'views/footer.php'; ?>