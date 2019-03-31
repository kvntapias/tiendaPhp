<?php
require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriaController{
    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        require_once 'views/categoria/index.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save(){
        Utils::isAdmin();
        //guardar categoria en bd
        $categoria = new Categoria();
        if (isset($_POST) && isset($_POST['nombre'])) {
            $categoria->setNombre($_POST['nombre']);
            $save = $categoria->save();
        }
        //redirect
        header("Location:".base_url."categoria/index");
    }

    public function ver(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
            $mycategory = $categoria->getOne();

            //OBTENER productos
            $producto = new Producto();
            $producto->setIdcategoria($id);
            $productos = $producto->listarXCategoria();
        }
        require_once 'views/categoria/ver.php';
    }
}