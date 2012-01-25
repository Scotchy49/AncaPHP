<?php

class CardController extends AppController {
    var $name = 'Card';
    var $helpers = array('Html', 'Form');
    var $uses = array('User', 'Product', 'UsersProduct');
    
    function index() {
        $userWithProducts = $this->User->findById($this->Auth->user('id'));
        $this->set('card', $userWithProducts['Product'] );
    }
    
    function add( $id ) {
        $user = $this->Auth->user();
        $user_id = $user['User']['id'];
        $product = $this->Product->findById($id);

        if( $product['Product'] ) {
            // check if the user already has that item
            $userProduct = $this->UsersProduct->find('all', 
                    array('conditions'=>array(
                        'UsersProduct.user_id' => $user_id, 
                        'UsersProduct.product_id'=>$id
                    ))
                );

            if( $userProduct[0] ) {
                $userProduct[0]['UsersProduct']['quantity']++;
                $this->UsersProduct->save($userProduct[0]);
            } else {
                $userProduct = array('UsersProduct' => array('user_id' => $user_id, 'product_id' => $id));
                $this->UsersProduct->save($userProduct);
            }
            
            $this->Session->setFlash('Successfully added item to your card');
        } else {
            $this->Session->setFlash('An error occured while adding this item to your card. Please try again later.');
            $this->set('error', true);
        }
        
        $this->redirect(array('controller' => 'catalog', 'action' => 'index'));
    }
    
    function remove($id) {
        $user = $this->Auth->user();
        $user_id = $user['User']['id'];
        
        $userProduct = $this->UsersProduct->find('all', 
                array('conditions'=>array(
                    'UsersProduct.user_id' => $user_id, 
                    'UsersProduct.product_id'=>$id
                ))
            );
        
        if( $userProduct[0]['UsersProduct']['quantity'] > 1 ) {
            $userProduct[0]['UsersProduct']['quantity']--;
            $this->UsersProduct->save($userProduct[0]);
        } else {
            $this->UsersProduct->delete($userProduct[0]['UsersProduct']['id'], false);
            $this->Session->setFlash('Removed item from your card.');
        }
        $this->redirect($this->referer());
    }
}

?>
