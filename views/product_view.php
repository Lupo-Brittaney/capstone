<?php
// page title name
$page_title = $name;

//include head
include 'views/head.php';

//include header and navigation
include 'views/header.php';
?> 
<main class="container">
    <div class="row justify-content-center">
        <div class ="col-9 product-box ">

            <img src="<?php echo $image; ?>" class="img-fluid" alt ="<?php echo $image_alt; ?>">
            <h2><?php echo $name; ?></h2>
            <p><?php echo $description; ?></p>
            <p>$<?php echo $price; ?></p>
            <a href="./index.php?productId=<?php echo $product['id']; ?>&action=add_cart" class="btn btn-dark">Buy</a>
        </div><!--product-box col-->
    </div><!--row-->

</main>

<!--include footer -->
<?php include 'views/footer.php'; ?>