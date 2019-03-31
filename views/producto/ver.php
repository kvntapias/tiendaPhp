<?php if (isset($pro)): ?>
    <h1><?=$pro->nombre?></h1>

    <div id="detail-product">
        <div class="image">
            <?php if($pro->imagen != null): ?>
                <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" alt="camisa">
            <?php else: ?>
                <img src="<?=base_url?>assets/emptyimg.png" alt="camisa">
            <?php endif; ?>
        </div>
        <div class="data">
            <p class="description"><?=$pro->descripcion?></p>
            <p class="price"><?=$pro->precio?> $</p>
            <a class="button" href="<?=base_url?>carrito/add&id=<?=$pro->idproducto?>">Comprar</a>
        </div>
    </div>
<?php else:?>
    <h1>El producto no existe</h1>
<?php endif;?>
