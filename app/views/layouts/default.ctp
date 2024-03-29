<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('cake.generic');
        echo $this->Html->css('default');
        echo $scripts_for_layout;
        ?>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1><?php echo $title_for_layout; ?></h1>
                <?php 
                    if( $this->Session->read('loggedin') == true ) { 
                        ?><span class="logout-btn"><?echo $html->link('Logout', '/users/logout');?></span><?
                    } 
                ?>
            </div>
            <div id="content">
                <?php echo $this->Session->flash(); ?>
                <?php echo $content_for_layout; ?>
                
            </div>
            <div id="footer">
                &copy; Scotchysoft
            </div>
        </div>
    </body>
</html>