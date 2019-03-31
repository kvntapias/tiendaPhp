<h1>Gestionar productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">
    Crear producto
</a>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'):?>
    <strong class="alert-green">El producto se ha creado correctamente</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'):?>
    <strong class="alert-red">El producto se no ha creado correctamente</strong>
<?php  endif; ?>
<?php Utils::deleteSession('producto') ?>


<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'):?>
    <strong class="alert-green">El producto se ha borrado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'):?>
    <strong class="alert-red">El producto se no ha borrado</strong>
<?php  endif; ?>
<?php Utils::deleteSession('delete') ?>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>DESCRIPCION</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>
    </tr>
<?php
while($prod =  $productos->fetch_object()): ?>
    <tr>
        <td> <?= $prod->idproducto ?></td>
        <td> <?= $prod->nombre ?></td>
        <td> <?= $prod->descripcion ?></td>
        <td> <?= $prod->precio ?></td>
        <td> <?= $prod->stock ?></td>
        <td>
            <a href="<?=base_url?>producto/editar&id=<?=$prod->idproducto?>" class="button button-gestion">Editar</a>
            <a href="<?=base_url?>producto/eliminar&id=<?=$prod->idproducto?>" class="button button-gestion button-red">Eliminar</a>
        </td>
    </tr>
<?php endwhile; ?>

</table>