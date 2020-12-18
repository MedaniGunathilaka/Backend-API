<?php
    class Request{
        private $connection;
        private $table='posts';
        public $id;
        public $title;
        public $body;
        public $autor;

        public function __construct($connection ){
            $this->connection=$connection;
        }

        public function getAll(){
            $query="SELECT * FROM $this->table";
            $result=mysqli_query($this->connection,$query);
            return $result;
        }
        public function getSingle(){
            $query="SELECT * FROM $this->table WHERE id=$this->id";
            $result=mysqli_query($this->connection,$query);
            return $result;
        }
        public function create(){
            $query="INSERT INTO $this->table(title,body,autor) VALUES('$this->title','$this->body','$this->autor')";
            $result=mysqli_query($this->connection,$query);
            echo $result;
            return $result;
        }
        public function update(){
            $query="UPDATE $this->table SET title='$this->title',body='$this->body',autor='$this->autor' WHERE id='$this->id'";
            mysqli_query($this->connection,$query);
            $result=mysqli_affected_rows($this->connection);
            return $result;
        }
        public function delete(){
            $query="DELETE FROM $this->table WHERE id='$this->id'";
            mysqli_query($this->connection,$query);
            $result=mysqli_affected_rows($this->connection);
            return $result;
        }
    }
 ?>