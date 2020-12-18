<?php
    class DBConfig{
        private $dbserver='localhost';
        private $username='root';
        private $password='';
        private $dbname='phpblog';
        private $connection;

        public function connect(){
            $this->connection=mysqli_connect(
                $this->dbserver,
                $this->username,
                $this->password,
                $this->dbname
            );
            if(mysqli_connect_errno()){
                echo mysqli_connect_error();
            }
            else{
                return $this->connection;
            }
        }
    }
?>
