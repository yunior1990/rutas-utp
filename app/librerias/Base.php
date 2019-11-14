<?php
    class Base{
        private $host=bd_host;
        private $usuario =bd_usuario;
        private $password =bd_password;
        private $nombre_base=bd_nombre;

        private $dbh;// configura  las base de datos
        private $stmt;//ejucutar la cunsulta o prepar el sql
        private $error;

        public function __construct(){            
            $dsn='mysql:host='.$this->host.';dbname='.$this->nombre_base;//dns nombre de origend e datos
           
            $opciones =array(
                PDO::ATTR_PERSISTENT=>true,
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
            );

            try {
                $this->dbh=new PDO($dsn,$this->usuario,$this->password,$opciones);
                $this->dbh->exec('set names utf8');
               // echo "conexion valida xd";
            } catch (pdoexception $e) {
                $this->error=$e->getmessage();
                echo 'conexion fallida: '.$this->error;
               
            }
        }
        //prepara la consulta
        public  function  query($sql){
            $this->stmt=$this->dbh->prepare($sql);
        }
        //vincular la consulta  con bind
        public function bind($parametro,$valor,$tipo=null){
            if (is_null($tipo)) {
                switch (true) {
                    case in_int($valor):
                        $tipo=pdo::PARAM_INT;
                        break;
                    case in_bool($valor):
                        $tipo=pdo::PARAM_BOOL;
                        break;
                    case in_null($valor):
                        $tipo=pdo::PARAM_NULL;
                        break;
                    default:
                        $tipo=pdo::PARAM_STR;
                        break;
                }
            }
            $this->stm->bindvalue($parametro,$valor,$tipo);
        }
        //ejecuta la consulta
        public function  execute(){
           return $this->stmt->execute();         
        }
        //obetner registros
        public function registros(){
            $this->execute();
            return $this->stmt->fetchAll(pdo::FETCH_OBJ);
        }
        //para obener unico registro
        public function registro(){
            $this->execute();
            return $this->stmt->fetch(pdo::FETCH_OBJ);
        }
    }