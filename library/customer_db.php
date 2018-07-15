<?php

function add_customer($billFirstName, $billLastName, $billEmail, $billAddress, $billAddress2, $billCity, $billState, $billZip){
    global $db;
    $query= 'INSERT INTO customer 
                (billFirstName, billLastName, billEmail, billAddress, billAddress2, billCity, billState, billZip)
            VALUES
                (:billFirstName, :billLastName, :billEmail, :billAddress, :billAddress2, :billCity, :billState, :billZip)';
            
    $statement=$db->prepare($query);
    $statement->bindValue(':billFirstName', $billFirstName);
    $statement->bindValue(':billLastName',$billLastName);
    $statement->bindValue(':billEmail',$billEmail);
    $statement->bindValue(':billAddress',$billAddress);
    $statement->bindValue(':billAddress2',$billAddress2);
    $statement->bindValue(':billCity',$billCity);
    $statement->bindValue(':billState',$billState);
    $statement->bindValue(':billZip',$billZip);
    $statement->execute();
    $customerId = $db->lastInsertId();
    $statement->closeCursor();
    return $customerId;
}
function add_order($customerId, $subtotal){
    global $db;
    $query = 'INSERT INTO orders
                (customerId, subtotal)
            VALUES
                (:customerId, :subtotal)';
    $statement=$db->prepare($query);
    $statement->bindValue(':customerId', $customerId);
    $statement->bindValue(':subtotal', $subtotal);
    $statement->execute();
    $add_result=$db->lastInsertId();
    $statement->closeCursor();
    return $add_result;
}


function get_customer($billEmail){
    global $db;
    $query = 'SELECT id FROM customer
              WHERE billEmail=:billEmail';
    $statement= $db->prepare($query);
    $statement->bindValue(':billEmail', $billEmail );
    $statement->execute();
    $customerId=$statement->fetch();
    $statement->closeCursor();
    return $customerId;
    
}
function get_subtotal($id){
    global $db;
    $query = 'SELECT subtotal FROM orders
              WHERE id=:id';
    $statement= $db->prepare($query);
    $statement->bindValue(':id', $id );
    $statement->execute();
    $chargeAmount=$statement->fetch();
    $statement->closeCursor();
    return $chargeAmount;
    
}