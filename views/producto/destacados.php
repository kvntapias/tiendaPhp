<h1>Algunos productos</h1>
<?php while($pro = $productos->fetch_object()): ?>
    <div class="product">
        <a href="<?=base_url?>producto/ver&id=<?=$pro->idproducto?>"> 
            <?php if($pro->imagen != null): ?>
                <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" alt="camisa">
            <?php else: ?>
                <img src="<?=base_url?>assets/emptyimg.png" alt="camisa">
            <?php endif; ?>
                <h2><?=$pro->nombre?></h2>
        </a>
            <p><?=$pro->precio?></p>
            <a class="button" href="<?=base_url?>carrito/add&id=<?=$pro->idproducto?>">Comprar</a>
    </div>
<?php endwhile; ?>


        