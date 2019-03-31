<h1>Carrito de la compra</h1>
<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>
<table>
    <tr>
        <th>IMAGEN</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>UNIDADES</th>
        <th>Opciones</th>
    </tr>
    <?php foreach($carrito as $indice => $elemento):
        $producto = $elemento['producto'];
    ?>
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
            <td>
                <?=$elemento['unidades']?>
                <div class="updown-unidades">
                    <a class="button" href="<?=base_url?>carrito/up&index=<?=$indice?>">+</a>
                    <a class="button" href="<?=base_url?>carrito/down&index=<?=$indice?>">-</a>
                </div>    
            </td>
            <td>
                <a href="<?=base_url?>carrito/delete&index=<?=$indice?>" class="button button-carrito button-red">Quitar producto</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<?php 
    $stats = Utils::statsCarrito();
?>

<div class="delete-carrito">
    <a href="<?=base_url?>carrito/delete_all" class="button button-delete button-red">Vaciar carrito</a>
</div>
<div class="total-carrito">
    <h3>Precio total: <?=$stats['total']?> $</h3>
    <a href="<?=base_url?>pedido/hacer" class="button button-pedido">Enviar pedido</a>
</div>

<?php else: ?>
    <h3>El carrito está vacío</h3>
<?php endif; ?>

