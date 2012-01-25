<p>Please fill out the form below to register an account.</p>
<?php 
    echo $form->create('User', array('action' => 'register')); 
    echo $form->input('username', array('after' => $form->error('username_unique', 'The username is taken. Please try again.')));
    echo $form->input('password');
    echo $form->input('email');
    echo $form->end('Register');
?>