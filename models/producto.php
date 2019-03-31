<?php
    class Producto{
        
        private $idproducto;
        private $idcategoria;
        private $nombre;
        private $descripcion;
        private $precio;
        private $stock;
        private $oferta;
        private $imagen;

        private   $db;
        public  function __construct(){
            $this->db  =  Database::connect();
        }


        /**
         * Get the value of idproducto
         */ 
        public function getIdproducto()
        {
                return $this->idproducto;
        }

        /**
         * Set the value of idproducto
         *
         * @return  self
         */ 
        public function setIdproducto($idproducto)
        {
                $this->idproducto = $this->db->real_escape_string($idproducto);

                return $this;
        }

        /**
         * Get the value of idcategoria
         */ 
        public function getIdcategoria()
        {
                return $this->idcategoria;
        }

        /**
         * Set the value of idcategoria
         *
         * @return  self
         */ 
        public function setIdcategoria($idcategoria)
        {
                $this->idcategoria = $this->db->real_escape_string($idcategoria);

                return $this;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $this->db->real_escape_string($nombre);

                return $this;
        }

        /**
         * Get the value of descripcion
         */ 
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
         *
         * @return  self
         */ 
        public function setDescripcion($descripcion)
        {
                $this->descripcion = $this->db->real_escape_string($descripcion);

                return $this;
        }

        /**
         * Get the value of precio
         */ 
        public function getPrecio()
        {
                return $this->precio;
        }

        /**
         * Set the value of precio
         *
         * @return  self
         */ 
        public function setPrecio($precio)
        {
                $this->precio = $this->db->real_escape_string($precio);

                return $this;
        }

        /**
         * Get the value of stock
         */ 
        public function getStock()
        {
                return $this->stock;
        }

        /**
         * Set the value of stock
         *
         * @return  self
         */ 
        public function setStock($stock)
        {
                $this->stock = $this->db->real_escape_string($stock);

                return $this;
        }

        /**
         * Get the value of oferta
         */ 
        public function getOferta()
        {
                return $this->oferta;
        }

        /**
         * Set the value of oferta
         *
         * @return  self
         */ 
        public function setOferta($oferta)
        {
                $this->oferta = $this->db->real_escape_string($oferta);

                return $this;
        }

        /**
         * Get the value of imagen
         */ 
        public function getImagen()
        {
                return $this->imagen;
        }

        /**
         * Set the value of imagen
         *
         * @return  self
         */ 
        public function setImagen($imagen)
        {
                $this->imagen = $this->db->real_escape_string($imagen);

                return $this;
        }

        public function listar(){
                $productos = $this->db->query("SELECT * FROM productos ORDER BY idproducto DESC");
                return $productos;
        }

        public function listarXCategoria(){
                $sql = "SELECT p.* , c.nombre as catnombre FROM productos p
                INNER JOIN categorias c ON c.idcategoria = p.idcategoria
                WHERE p.idcategoria = {$this->getIdcategoria()} 
                ORDER BY p.idproducto DESC";
                $productos = $this->db->query($sql);
                return $productos;
        }

        public function save(){
                $sql = "INSERT INTO productos
                VALUES (
                NULL, 
                '{$this->getIdcategoria()}',
                '{$this->getNombre()}',
                '{$this->getDescripcion()}',
                 {$this->getPrecio()},
                 {$this->getStock()},
                NULL,
                CURDATE(),
                '{$this->getImagen()}'
                );";
                $save = $this->db->query($sql);
                $result = false;
                if ($save) {
                     $result = true;
                }
                return $result;
        }


        public function edit(){
                $sql = "UPDATE  productos
                SET idcategoria = {$this->getIdcategoria()},
                nombre = '{$this->getNombre()}',
                descripcion = '{$this->getDescripcion()}',
                precio = {$this->getPrecio()},
                stock = {$this->getStock()}";

                if($this->getImagen != null){
                        $sql .= ", imagen = '{$this->getImagen()}'";
                }
                $sql .= " WHERE idproducto  = {$this->idproducto};";

                $save = $this->db->query($sql);
                $result = false;
                if ($save) {
                     $result = true;
                }
                return $result;
        }

        public function delete(){
                $sql = "DELETE from productos where idproducto = '{$this->idproducto}'";
                $del = $this->db->query($sql);
                $result = false;
                if ($del) {
                     $result = true;
                }
                return $result;
        }

        public function mostrar(){
                $producto = $this->db->query("SELECT * FROM productos WHERE idproducto = {$this->idproducto}");
                return $producto->fetch_object();
        }

        public function getRandom($limit){
                $productos = $this->db->query(
                  "SELECT * FROM productos ORDER BY RAND() LIMIT $limit"
                );
                return $productos;
        }

        
    }