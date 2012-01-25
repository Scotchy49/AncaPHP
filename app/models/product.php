<?php

class Product extends AppModel {
    var $name = 'Product';
    
    var $hasAndBelongsToMany = array(
        'User' =>
            array(
                'className' =>  'User',
                'joinTable' =>  'users_products',
                'foreignKey'=>  'product_id',
                'associationForeignKey'=>'user_id',
                'unique'    =>  true
            )
    );
}

?>
