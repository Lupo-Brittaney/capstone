<?php
// start session
session_start();
//database connection
require_once('./library/database.php');
require_once('./library/products_db.php');
require_once('./library/customer_db.php');
require_once('./config.php');

//check for the cart - if it doesn't exist create it
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

//get action
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

//if no action show full product list
if ($action ==NULL ){
    $action= filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if($action==NULL){
        $action='list_all';
    }
}
//get any message to be displayed to user
$top_message=$_GET['message'];

//switch statments
switch ($action){
        
    case 'list_all':
        $products= get_all_products();
        include('views/all_products.php');    
        break;
    
    case 'contact':
        //here we process the contact request and send the message
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
//            $error='The product id is invalid or missing.';
//            echo $error;
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
        
    case 'add_cart':
        //here we add the items from the buy button to the session based cart
        
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
        break;
    case 'addCustomer':
        //here we add customer info to database and order info to database
        //come from addCustomerInfo and go to addBilling
        
        //get customer information from post
        $subtotal= filter_input(INPUT_POST, 'subtotal', FILTER_SANITIZE_NUMBER_INT);
        $billFirstName = filter_input(INPUT_POST, 'billFirstName',FILTER_SANITIZE_STRING);
        $billLastName = filter_input(INPUT_POST, 'billLastName',FILTER_SANITIZE_STRING);
        $billEmail = filter_input(INPUT_POST, 'billEmail',FILTER_SANITIZE_STRING);
        $billAddress = filter_input(INPUT_POST, 'billAddress',FILTER_SANITIZE_STRING);
        $billAddress2 = filter_input(INPUT_POST, 'billAddress2',FILTER_SANITIZE_STRING);
        $billCity = filter_input(INPUT_POST, 'billCity',FILTER_SANITIZE_STRING);
        $billState = filter_input(INPUT_POST, 'billState',FILTER_SANITIZE_STRING);
        $billZip = filter_input(INPUT_POST, 'billZip',FILTER_SANITIZE_STRING);
        
        $shipFirstName = filter_input(INPUT_POST, 'shipFirstName',FILTER_SANITIZE_STRING);
        $shipLastName = filter_input(INPUT_POST, 'shipLastName',FILTER_SANITIZE_STRING);
        $shipAddress = filter_input(INPUT_POST, 'shipAddress',FILTER_SANITIZE_STRING);
        $shipAddress2 = filter_input(INPUT_POST, 'shipAddress2',FILTER_SANITIZE_STRING);
        $shipCity = filter_input(INPUT_POST, 'shipCity',FILTER_SANITIZE_STRING);
        $shipState = filter_input(INPUT_POST, 'shipState',FILTER_SANITIZE_STRING);
        $shipZip = filter_input(INPUT_POST, 'shipZip',FILTER_SANITIZE_STRING);
        
        //add information to database
        //first add to customer database
        $customerId = add_customer($billFirstName, $billLastName, $billEmail, $billAddress, $billAddress2, $billCity, $billState, $billZip);
        //if that is successful add to order database
        if (empty($customerId)) {
            $top_message = 'Issue adding customer';
        } else {
            $add_result = add_order($customerId, $subtotal);
            if (empty($add_result)){
                $top_message = 'Issue adding order';
            }
        }
        //format the total for viewing
        $total = $subtotal *.01;
        //go to billing screen
        include('views/addBilling.php');
        
        
        break;

    case 'charge':
        //here we are charging the card through stripe 
        //come from addBilling and go to index
        //stripe code
        $token = $_POST['stripeToken'];
        $email = $_POST['stripeEmail'];
        
        //get orderid from hidden field in form
        $orderId = filter_input(INPUT_POST, 'orderId', FILTER_SANITIZE_STRING);
        
        //get the amount to charge from the order table
        $chargeAmount2 = get_subtotal($orderId);
        $chargeAmount3 = $chargeAmount2[0];
       
        //stripe code
        $customer = \Stripe\Customer::create(array(
                    'email' => $email,
                    'source' => $token
        ));
        //stripe code
        $charge = \Stripe\Charge::create(array(
                    'customer' => $customer->id,
                    'amount' => $chargeAmount3,
                    'currency' => 'usd'
        ));
        //empty the cart
        unset($_SESSION['cart']);
        //send back to index with confirmation message
        $top_message ="Order sucessfully processed.";
        header( "Location: /index.php?message=$top_message" );
        exit;
        break;
        
    
        
    default :
        
        
          
}

?>

