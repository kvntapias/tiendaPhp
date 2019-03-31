<?php if (isset($edit) && isset($datos) && is_object($datos)):
    $urlAct =  base_url."producto/save&id=".$datos->idproducto;
    echo "<h1>Editar producto ".$datos->nombre."</h1>";
?>
<?php else: 
    $urlAct =  base_url."producto/save";
    echo "<h1>Crear nuevos productos</h1> ";
?>
<?php endif ;?>

<div class="form-fontainer">
    <form action="<?=$urlAct?>" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="" value="<?=isset($datos) && is_object($datos) ? $datos->nombre:"" ?>">

        <label for="descripcion">Descripción</label>
        <textarea rows="5" type="text" name="descripcion" id=""><?=isset($datos) && is_object($datos) ? $datos->descripcion:"" ?>
        </textarea>

        <label for="precio">Precio</label>
        <input type="text" name="precio" id="" value="<?=isset($datos) && is_object($datos) ? $datos->precio:"" ?>">

        <label for="stock">Stock</label>
        <input type="number" name="stock" id="" value="<?=isset($datos) && is_object($datos) ? $datos->stock:"" ?>">

        <label for="idcategoria">Categoría</label>
        <?php $categorias = Utils::showCategorias() ?>
        <select type="text" name="idcategoria" id="" <?=isset($datos) && is_object($datos)  && $cat->idcategoria == $datos->idcategoria  ? "selected" : "" ?>>
            <?php while($cat = $categorias->fetch_object()): ?>
                    <option value="<?=$cat->idcategoria?>">
                        <?=$cat->nombre?>
                    </option>
                <?php endwhile;?>
        </select>

        <label for="imagen">Imagen</label>
        <?php if (isset($datos) && is_object($datos) && !empty($datos->imagen)):?>
            <img class="thumb" src="<?=base_url?>/uploads/images/<?=$datos->imagen?>" alt="">    
        <?php endif;?>
        <input type="file" name="imagen" id="">

        <input type="submit" value="Guardar">
    </form>
</div>
