<? if( $card && count($card) ) { 
    $total = 0; ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <? foreach( $card as $cardItem ) { 
            $total += $cardItem['UsersProduct']['quantity']*$cardItem['price'];
        ?>
        <tr>
            <td><?=$cardItem['name'];?></td>
            <td><?=$cardItem['UsersProduct']['quantity'];?></td>
            <td>€ <?=$cardItem['UsersProduct']['quantity']*$cardItem['price'];?></td>
            <td><?=$html->link('Remove', array('action' => 'remove', $cardItem['id']))?></td>
        </tr>
        <? } ?>
        <tr>
            <td colspan="2">Total</td>
            <td colspan="2">€ <?=$total?></td>
        </tr>
    </table>
<? } else { ?>
    <h2>Your card is empty</h2>
<? } ?>
<?=$html->link('Return to catalog', '/catalog')?>