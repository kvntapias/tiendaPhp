<?php
require_once 'models/pedido.php';

class pedidoController{
    public function hacer(){
        require_once 'views/pedido/hacer.php';
    }

    public function add(){
        if (isset($_SESSION['identity'])) {
            $idusuario = $_SESSION['identity']->idusuario;

            $provincia = isset($_POST['provincia'])?$_POST['provincia']:false;
            $direccion = isset($_POST['direccion'])?$_POST['direccion']:false;
            $localidad = isset($_POST['localidad'])?$_POST['localidad']:false;
            //cart data
            $stats = Utils::statsCarrito();
            $coste = $stats['total'];

            if ($provincia && $localidad && $direccion) {
                $pedido = new Pedido();
                //order main data
                $pedido->setProvincia($provincia);  
                $pedido->setLocalidad($localidad); 
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);
                //order foreign
                $pedido->setIdusuario($idusuario);
                $save = $pedido->save();

                //guardar linea-pedido
                $save_linea = $pedido->save_linea();

                if ($save && $save_linea) {
                    $_SESSION['pedido'] = "complete";
                }else{
                    $_SESSION['pedido'] = "failed";
                }
            }else{
                $_SESSION['pedido'] = "failed";
            }

            header("Location:".base_url."pedido/confirmado");
        }else{
            //redirect 
            hader("Location:".base_url);
        }
    }

    public function confirmado(){
        if (isset($_SESSION['identity'])) {
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setIdusuario($identity->idusuario);
            $pedido = $pedido->mostrarByUser();
            
            //Sacar productos de la orden
            $pedido_productos  = new Pedido();
            $pedido_productos = $pedido_productos->getProductsbyOrder($pedido->idpedido);            
        }
        require_once 'views/pedido/confirmado.php';
    }

    public function mis_pedidos(){
        Utils::isIdentity();
        $pedido = new Pedido();
        $idusuario =$_SESSION['identity']->idusuario;
        $pedido->setIdusuario($idusuario);
        //Traer pedidos del usuario
        $pedidos = $pedido->allPedidosByUser();
        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle(){
        Utils::isIdentity();
        if (isset($_GET['id'])) {
            $idpedido = $_GET['id'];

            //Sacar datos del pedido
            $pedido = new Pedido();
            $pedido->setIdpedido($idpedido);
            $pedido = $pedido->mostrar();
            
            //Traer productos
            $pedido_productos  = new Pedido();
            $pedido_productos = $pedido_productos->getProductsbyOrder($idpedido); 
            require_once 'views/pedido/detalle.php';
        }else{
            header("Location:".base_url."pedido/mis_pedidos");
        }
    }

    public function gestion(){
        Utils::isAdmin();
        $gestion = true;

        $pedido = new Pedido();
        $pedidos = $pedido->listar();
        require_once 'views/pedido/mis_pedidos.php';

    }
    
    public function estado(){
        Utils::isAdmin();
        if (isset($_POST['idpedido']) && isset($_POST['estado'])) {
            //form data
            $idpedido = $_POST['idpedido'];
            $estado = $_POST['estado'];
            echo $estado;
            //actualizar estado del pedido
            $pedido = new Pedido();
            $pedido->setIdpedido($idpedido);
            $pedido->setEstado($estado);
            $pedido->editEstado();

            header("Location:".base_url."pedido/detalle&id=".$idpedido);
        }else{
            header("Location:".base_url);
        }
    }
}