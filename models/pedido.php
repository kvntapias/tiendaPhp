<?php
    class Pedido{
        
        private $idpedido;
        private $idusuario;
        private $provincia;
        private $localidad;
        private $direccion;
        private $coste;
        private $estado;
        private $fecha;
        private $hora;

        private   $db;
        public  function __construct(){
            $this->db  =  Database::connect();
        }
    
        public function listar(){
                $productos = $this->db->query("SELECT * FROM pedidos ORDER BY idpedido DESC");
                return $productos;
        }

        public function save(){
                $sql = "INSERT INTO pedidos
                VALUES (
                NULL, 
                '{$this->getIdusuario()}',
                '{$this->getProvincia()}',
                '{$this->getLocalidad()}',
                 '{$this->getDireccion()}',
                  {$this->getCoste()},
                'confirm',
                CURDATE(),
                CURTIME()
                );";
                
                $save = $this->db->query($sql);
                $result = false;
                if ($save) {
                     $result = true;
                }
                return $result;
        }

        public function mostrar(){
                $producto = $this->db->query("SELECT * FROM pedidos WHERE idpedido = {$this->idpedido}");
                return $producto->fetch_object();
        }

        public function mostrarByUser(){
            $sql = "SELECT p.idpedido,
            p.coste
            FROM pedidos p
            INNER JOIN lineas_pedido lp ON lp.idpedido = p.idpedido
            WHERE p.idusuario = {$this->getIdusuario()} ORDER BY p.idpedido DESC LIMIT 1";
            $pedido = $this->db->query($sql);
            return $pedido->fetch_object();
        }

        public function allPedidosByUser(){
                $sql = "SELECT p.*
                FROM pedidos p
                WHERE p.idusuario = {$this->getIdusuario()} ORDER BY p.idpedido DESC";
                $pedido = $this->db->query($sql);
                return $pedido;
        }

        public function getProductsbyOrder($id){
            $sql = "SELECT pr.*, lp.unidades from productos pr 
            INNER JOIN lineas_pedido lp ON pr.idproducto = lp.idproducto
            WHERE lp.idpedido = {$id}";
            
            $productos = $this->db->query($sql);
            return $productos;
        }

        public function save_linea(){
            $sql = "SELECT LAST_INSERT_ID() as pedido;";
            $query = $this->db->query($sql);
            $idpedido = $query->fetch_object()->pedido;
            var_dump($idpedido);
            
           foreach($_SESSION['carrito'] as $elemento){
                $producto = $elemento['producto'];
                $insert = "INSERT INTO lineas_pedido VALUES
                 (NULL, {$idpedido}, 
                 {$producto->idproducto}, 
                 {$elemento['unidades']})";
                $save = $this->db->query($insert);  
           }

           $result = false;
                if ($save) {
                     $result = true;
                }
            return $result;
        }

        public function editEstado(){
                $sql = "UPDATE  pedidos
                SET estado = '{$this->getEstado()}'";
                $sql .= " WHERE idpedido  = {$this->getIdpedido()};";

                $save = $this->db->query($sql);
                $result = false;
                if ($save) {
                     $result = true;
                }
                return $result;
        }



        /* GETTER & SETTERS */

        public function getIdpedido()
        {
                return $this->idpedido;
        }

        public function setIdpedido($idpedido)
        {
                $this->idpedido = $idpedido;

                return $this;
        }

        public function getIdusuario()
        {
                return $this->idusuario;
        }


        public function setIdusuario($idusuario)
        {
                $this->idusuario = $idusuario;

                return $this;
        }

        public function getProvincia()
        {
                return $this->provincia;
        }

        public function setProvincia($provincia)
        {
                $this->provincia = $this->db->real_escape_string($provincia);

                return $this;
        }

        public function getLocalidad()
        {
                return $this->localidad;
        }

        public function setLocalidad($localidad)
        {
                $this->localidad = $this->db->real_escape_string($localidad);

                return $this;
        }

        public function getDireccion()
        {
                return $this->direccion;
        }


        public function setDireccion($direccion)
        {
                $this->direccion = $this->db->real_escape_string($direccion);

                return $this;
        }


        public function getCoste()
        {
                return $this->coste;
        }


        public function setCoste($coste)
        {
                $this->coste = $coste;

                return $this;
        }

        public function getEstado()
        {
                return $this->estado;
        }


        public function setEstado($estado)
        {
                $this->estado = $estado;

                return $this;
        }

        public function getFecha()
        {
                return $this->fecha;
        }

        public function setFecha($fecha)
        {
                $this->fecha = $fecha;

                return $this;
        }

        public function getHora()
        {
                return $this->hora;
        }

        public function setHora($hora)
        {
                $this->hora = $hora;

                return $this;
        }
    }