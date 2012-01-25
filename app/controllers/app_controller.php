<?php
/**
 * Application level Controller
 *
 */
class AppController extends Controller {
    var $components = array('Auth', 'Session');
    
    function beforeFilter() {
        if( $this->Auth->user() ) {
            $this->Session->write('loggedin', true);
        } else {
            $this->Session->write('loggedin', false);
        }
    }
}
