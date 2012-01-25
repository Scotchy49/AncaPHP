<?php

class CatalogController extends AppController {
    var $name = 'Catalog';
    var $uses = array('Product', 'User');
    var $helpers = array( 'Ajax', 'Html', 'Javascript' );
    
    function index() {
        $this->set('products', $this->Product->find('all'));
        
        if( $this->Auth->user() ) {
            $userWithProducts = $this->User->findById($this->Auth->user('id'));
            $this->set('card', $userWithProducts['Product'] );
        }
    }
    
    function search() {
        if( !empty($this->data['term']) ) {
            $term = '%'.$this->data['term'].'%';

            $conditions = array("OR" => 
                array( 'Product.name LIKE' => $term, 
                       'Product.description LIKE' => $term )
                );

            $this->set('products', $this->Product->find('all', array('conditions' => $conditions)));
            if( $this->Auth->user() ) {
                $userWithProducts = $this->User->findById($this->Auth->user('id'));
                $this->set('card', $userWithProducts['Product'] );
            }
            $this->render('index');
        } else {
            $this->redirect(array( 'action' => 'index'));
        }
    }
    
    function beforeFilter() {
        $this->Auth->allow("*");
        parent::beforeFilter();
    }
}

?>
