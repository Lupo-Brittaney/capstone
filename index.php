<?php
//database connection
require_once('library/database.php');
require_once('library/products_db.php');

//get action
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
echo $action;

//if no action show full game list
if ($action ==NULL ){
    $action= filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if($action==NULL){
        $action='list_all';
    }
}
$top_message=$_GET['message'];
if (isset($top_message)){
     echo "<script type='text/javascript'>s('$top_message');</script>";
}
//switch statments
switch ($action){
        
    case 'list_all':
        $products= get_all_products();
        include('views/all_products.php');    
        break;
    
    case 'contact':
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $from = $email;
        $to = 'blupo473@brittaneylupo.com';
        $subject = "Message from colorado wild contact form";

        $body = "From: $name\n E-Mail: $email\n Message: $message";
        echo $body;
        
            if (mail ($to, $subject, $body)) {
                $top_message = 'Your message has been sent!';
                header( "Location: /index.php?message=$top_message" );
                exit;
            } else {
                $top_message ='Something went wrong, please try again!';
                header( "Location: /views/contact.php?message=$top_message" );
                exit;
            }
        
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

