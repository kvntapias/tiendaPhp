<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == "complete"):?>
<h1>Tu pedido se ha confirmado</h1>
<p>Tu pedido ha sido enviado con exito y 
    será enviado proximamente :D  
</p>
<?php if(isset($pedido)):?>
    <h3>Resumen de la orden:</h3>
        Numero de Pedido: <?=$pedido->idpedido?> <br/>
        Total a pagar: <?=$pedido->coste?> $ <br/>
        Productos:
        <table>
        <tr>
            <th>IMAGEN</th>
            <th>NOMBRE</th>
            <th>PRECIO</th>
            <th>UNIDADES</th>
        </tr>
            <?php while($producto = $pedido_productos->fetch_object()):?>
                <tr>
                <td>
                    <?php if($producto->imagen != null): ?>
                        <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" alt="camisa" class="img_carrito">
                    <?php else: ?>
                        <img src="<?=base_url?>assets/emptyimg.png" alt="camisa" class="img_carrito">
                    <?php endif; ?>
                </td>
                <td>  <a href="<?=base_url?>producto/ver&id=<?=$producto->idproducto?>"> <?=$producto->nombre?> </a> </td>
                <td><?=$producto->precio?></td>
                <td><?=$producto->unidades?></td>
            </tr>
            <?php endwhile;?>
        </table>   
<?php endif;?>


<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] != "complete"):?>
<h1>Tu pedido no se ha procesado</h1>
<?php endif;?>