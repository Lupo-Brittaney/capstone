<?php

// start session
session_start();

//database connection
require_once('../library/database.php');
require_once('../library/products_db.php');

//check for the cart - if it doesn't exist create it
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
//get and set productId
$productId=$_GET['productId'];
$product = get_product($productId);
$name= $product['name'];

//go through the cart to see if the item already exists
if (in_array($productId, $_SESSION['cart'])){
    //if it exists tell user it is already in the cart and redisplay all view
    $top_message = $name.' is already in your cart';
   header( "Location: /index.php?message=$top_message" );
   exit;
    //if not add it to the cart and redisplay all view
    
}else{
    array_push($_SESSION['cart'], $productId);
    $top_message= $name.' added to cart.';
    header( "Location: /index.php?message=$top_message" );
    exit;
    
    
}
    



//for testing purposes
//var_dump($_SESSION['cart']);