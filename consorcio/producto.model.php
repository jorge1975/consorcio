<?php
    class ProductoModel
    {
        private $pdo;
        public function __CONSTRUCT()
        {
            try 
            {
                $this->pdo = new PDO('mysql:host=localhost;dbname=consorcio','root','');
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
        public function Listar(){
            try
            {

              $result = array();
              $stm = $this->pdo->prepare("SELECT * FROM producto");
              $stm->execute();
              foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                  $alm = new producto();
                  $alm->__SET('cod', $r->cod);
                  $alm->__SET('nom', $r->nom);
                  $alm->__SET('mar', $r->mar);
                  $alm->__SET('pre', $r->pre);
                  
                  $result[] = $alm;
                }
                return $result;
            }
            catch(Exception $e)
            {
              die($e->getMessage());
            }
        }
        public function Obtener($cod)
        {
            try
            {
                $stm = $this->pdo
                ->prepare("SELECT * FROM producto WHERE cod = ?");
                $stm->execute(array($cod));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                $alm = new producto();
                $alm->__SET('cod', $r->cod);
                $alm->__SET('nom', $r->nom);
                $alm->__SET('mar', $r->mar);
                $alm->__SET('pre', $r->pre);
                return $alm;
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }   
        }
        public function Eliminar($cod)
        {
            try
            {
                $stm = $this->pdo
                ->prepare("DELETE FROM producto WHERE cod = ?");
                $stm->execute(array($cod));
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }
        public function Actualizar(producto $data)
        {
            try
            {

                $sql = "UPDATE producto SET
                nom = ?,
                mar = ?,
                pre = ?
                WHERE cod = ?";
                $this->pdo->prepare($sql)
                ->execute(
                array(
                $data->__GET('nom'),
                $data->__GET('mar'),
                $data->__GET('pre'),                
                $data->__GET('cod')
                )
                );
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function Registrar(producto $data)
        {
            try
            {
                $sql = "INSERT INTO producto (nom,mar,pre) VALUES ( ?, ?, ?)";
                $this->pdo->prepare($sql)->execute(array(
                $data->__GET('nom'),
                $data->__GET('mar'),
                $data->__GET('pre'),
                )
                );
            }   
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }
    }   
?>