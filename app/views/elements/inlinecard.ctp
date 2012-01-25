<h1 style="text-align: center;">Your current card</h1>
<table>
<? 
    $total = 0;
    foreach( $card as $cardItem ) { ?>
    <? 
        $qty = $cardItem['UsersProduct']['quantity'];
        $price = $qty*$cardItem['price']; 
        $total += $price;
    ?>
    <tr>
        <td width="50"><img src="<?=$cardItem['image']?>" alt="<?=$cardItem['name']?>" height="50"></td>
        <td>€ <?=$price?> (<?=$qty?>)<br /><?=$this->Html->link('X', '/card/remove/'.$cardItem['id'])?></td>
    </tr>
<? } ?>
    <tr>
        <td>Total</td>
        <td>€ <?=$total?></td>
    </tr>
    <tr>
        <td colspan="2"><?=$this->Html->link('View card', '/card')?></td>
    </tr>
</table>