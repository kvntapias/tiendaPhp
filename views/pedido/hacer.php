
<?php if (isset($_SESSION['identity'])):?>
<h1>Hacer pedido</h1>
<a href="<?=base_url?>/carrito/index">
    Ver los productos y precio del pedido
</a>
<br/>
<h3>Direccion de envio:</h3>

<form action="<?=base_url.'pedido/add'?>" method="POST">
    <label for="provincia">Provincia</label>
    <input type="text" name="provincia" id="" required>

    <label for="localidad">Localidad</label>
    <input type="text" name="localidad" id="" required>

    <label for="direccion">Dirección</label>
    <input type="text" name="direccion" id="" required>

    <input type="submit" value="Confirmar pedido">

</form>

<?php else:?>
    <h1>Ncesitas estar identificado</h1>
    <small>Debes acceder para realizar pedidos</small>
<?php endif;?>