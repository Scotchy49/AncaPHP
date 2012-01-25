<?php

class UsersController extends AppController {

    var $name = 'Users';
    var $helpers = array('Html', 'Form');
    

    function login() {
    }

    function logout() {
        $this->Auth->logout();
        $this->Session->setFlash('You have successfully logged out');
        $this->redirect($this->referer());
    }

    function register() {
        if (!empty($this->data)) {
            if ($this->User->save($this->data)) {
                $this->Session->setFlash('Your registration information was accepted.');
                $this->redirect('/');
            }
        }
    }

    function beforeFilter() {
        $this->Auth->allow("register");
        parent::beforeFilter();
    }

}

?>
