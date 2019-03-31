<h1>Detalle del pedido</h1>

<?php if(isset($pedido)):?>
    <?php  if(isset($_SESSION['admin'])):?>
        <h3>Cambiar estado del pedido</h3>
        <form action="<?=base_url?>pedido/estado" method="POST">
            <input type="hidden" name="idpedido" value="<?=$pedido->idpedido?>">
            <select name="estado" id="">
                <option value="confirm" <?=$pedido->estado == 'confirm' ? 'selected':""; ?> >Pendiente</option>
                <option value="preparation" <?=$pedido->estado == 'preparation' ? 'selected':""; ?>>En preparación</option>
                <option value="ready" <?=$pedido->estado == 'ready' ? 'selected':""; ?>>Preparado para el envio</option>
                <option value="sended" <?=$pedido->estado == 'sended' ? 'selected':""; ?>>Enviado</option>
            </select>
            <input type="submit" value="Cambiar estado">
        </form>
        <br>
    <?php endif;?>

    <h3>Datos de envío</h3>
        Provincia : <?=$pedido->provincia?> <br/>
        Ciudad : <?=$pedido->localidad?> <br/>
        Direccion : <?=$pedido->direccion?> <br/>
    <br/>
    
    <h3>Resumen de la orden:</h3>
        Estado:  <?= Utils::showStatus($pedido->estado) ?> <br/>
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