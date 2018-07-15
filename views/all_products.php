<?php


// page title name
$page_title = "Home";

include 'views/head.php';

include 'views/header.php';
?>        
<main class="container">
    <div class="row"> 
        <?php foreach ($products as $product): ?>
            <div class=" col-lg-6 md-12  product-box ">
                <a href="?action=view_product&amp;productId=<?php echo $product['id']; ?>">
                    <img src="images/<?php echo $product['id']; ?>.jpg" class="img-fluid" alt ="<?php echo $product['name']; ?> image">
                </a>

                <div class='row'>
                    <div class='col-7'>
                        <a href="?action=view_product&amp;productId=<?php echo $product['id']; ?>">
                            <?php echo $product['name']; ?>
                        </a>
                    </div>
                    <div class='col-5 '>
                        <a href="./index.php?productId=<?php echo $product['id']; ?>&action=add_cart" class="btn btn-dark float-right">Buy</a>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>


</main>
<?php include 'views/footer.php'; ?>