<?php

function get_all_products(){
    global $db;
    $query= 'SELECT * FROM product';
    $statement=$db->prepare($query);
    $statement->execute();
    $products=$statement->fetchAll();
    $statement->closeCursor();
    return $products;
    
}

function get_product($productId){
    global $db;
    $query= 'SELECT *FROM product
            WHERE id = :productId';
    $statement= $db->prepare($query);
    $statement->bindValue(':productId', $productId );
    $statement->execute();
    $product=$statement->fetch();
    $statement->closeCursor();
    return $product;
    
    
}
