<?php
    class ClienteModel
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
              $stm = $this->pdo->prepare("SELECT * FROM cliente");
              $stm->execute();
              foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                  $alm = new cliente();
                  $alm->__SET('cod', $r->cod);
                  $alm->__SET('nom', $r->nom);
                  $alm->__SET('ape', $r->ape);
                  $alm->__SET('dir', $r->dir);
                  $alm->__SET('fnac', $r->fnac);
                  $alm->__SET('sex', $r->sex);
                  
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
                ->prepare("SELECT * FROM cliente WHERE cod = ?");
                $stm->execute(array($cod));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                $alm = new cliente();
                $alm->__SET('cod', $r->cod);
                $alm->__SET('nom', $r->nom);
                $alm->__SET('ape', $r->ape);
                $alm->__SET('dir', $r->dir);
                $alm->__SET('fnac', $r->fnac);
                $alm->__SET('sex', $r->sex);
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
                ->prepare("DELETE FROM cliente WHERE cod = ?");
                $stm->execute(array($cod));
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }
        public function Actualizar(cliente $data)
        {
            try
            {

                $sql = "UPDATE cliente SET
                nom = ?,
                ape = ?,
                dir = ?,
                fnac= ?,
                sex = ?
                WHERE cod = ?";
                $this->pdo->prepare($sql)
                ->execute(
                array(
                $data->__GET('nom'),
                $data->__GET('ape'),
                $data->__GET('dir'),                
                $data->__GET('fnac'),
                $data->__GET('sex'),
                $data->__GET('cod')
                )
                );
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function Registrar(cliente $data)
        {
            try
            {
                $sql = "INSERT INTO cliente (nom,ape,dir,fnac,sex) VALUES ( ?, ?, ?,?,?)";
                $this->pdo->prepare($sql)->execute(array(
                $data->__GET('nom'),
                $data->__GET('ape'),
                $data->__GET('dir'),
                $data->__GET('fnac'),
                $data->__GET('sex'),
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