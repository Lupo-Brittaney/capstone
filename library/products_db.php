<?php

function get_all_products(){
    global $db;
    $query= 'SELECT * FROM Product';
    $statement=$db->prepare($query);
    $statement->execute();
    $products=$statement->fetchAll();
    $statement->closeCursor();
    return $products;
    
}

function get_product($productId){
    global $db;
    $query= 'SELECT *FROM Product
            WHERE productId = :productId';
    $statement= $db->prepare($query);
    $statement->bindValue(':productId', $productId );
    $statement->execute();
    $product=$statement->fetch();
    $statement->closeCursor();
    return $product;
    
    
}
