<?php
//database connection
require_once('library/database.php');
require_once('library/products_db.php');

//get action
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

//if no action show full game list
if ($action ==NULL ){
    $action= filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if($action==NULL){
        $action='list_all';
    }
}
//switch statments
switch ($action){
        
    case 'list_all':
        $products= get_all_products();
        include('views/all_products.php');    
        break;
    
    case 'view_product':
        $productId= filter_input(INPUT_GET, 'productId', FILTER_SANITIZE_NUMBER_INT);
        if ($productId==NULL || $productId==FALSE){
            $error='The product id is invalid or missing.';
            echo $error;
            //include ('.../errors/error.php');
        }  else {
            $product= get_product($productId);
            
            $description= $product['description'];
            $price= $product['price'];
            $name= $product['name'];
            $image= 'images/'.$productId.'.jpg';
            $image_alt= $name.' image';
            include('views/product_view.php');
        }
            
            
        
        break;
    default :
        
        
          
}

?>

