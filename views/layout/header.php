<?php    
 require_once 'helpers/utils.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda de camisetas</title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css">
</head>
<body>
    <!--container-->
    <div id="container">
        <!--cabecera-->
        <header id="header">
            <div id="logo">
                <img src="<?=base_url?>assets/camisa.png" alt="camiseta">
                <a href="<?=base_url?>">
                Tienda de Camisetas</a>           
            </div>
        </header>
        <!--menu-->
        <?php $categorias =  Utils::showCategorias() ?>
        <nav id="menu">
            <ul>
                <li>
                    <a href="<?=base_url?>">Inicio</a>
                </li>
            <?php while($cat = $categorias->fetch_object()): ?>
                <li>
                    <a href="<?=base_url?>categoria/ver&id=<?=$cat->idcategoria?>"><?=$cat->nombre?></a>
                </li>
              <?php endwhile;?>
            </ul>
        </nav>
        
        <div id="content">