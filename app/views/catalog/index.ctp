<? 
    echo $this->Html->script(array('jquery-1.4.3.min', 'jquery.fancybox-1.3.4', 'image-popup'));
    echo $this->Html->css(array('catalog', 'jquery.fancybox-1.3.4'));
?>

<div class="catalog">
    <?
        echo $form->create(false, array('action' => 'search')); 
        echo $form->input('term', array('label' => false, 'div' => false));
        echo $form->end('Search');
    ?>
    <table>
    <?php foreach( $products as $product ) { 
        $p = $product['Product'];
        ?>
        <tr>
            <td width="150">
                <a class="gallery-img" href="<?=$p['image']?>">
                    <img src="<?=$p['image']?>" alt="<?=$p['name']?>" height="100">
                </a>
            </td>
            <td>
                <h3 style="display: inline;"><?=$p['name'];?></h3> <h5>€ <?=$p['price'];?></h5>
                <br />
                <p><?=$p['description'];?></p>
                <? echo $html->link('Add to card', "/card/add/".$p['id']); ?>
            </td>
        </tr>    
    <?php } ?>
    </table>
</div>
<? if( isset($card) && count($card) ) { ?>
<div class="inline-card">
    <? echo $this->element('inlinecard', array('card' => $card)) ?>
</div>
<? } ?>

