<?php

class DB{
    private const host='localhost';
    private const user='root';
    private const password='';
    private const db='fixpoint';
    
    public $connection;
    
    public function __construct(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->connection = new mysqli(DB::host,DB::user,DB::password,DB::db);

        if ($this->connection->connect_error) {
            die("Connection failed: ".$this->connection->connect_error);
        }
    }

    public function insert($table,$para=array()){

        $table_columns = implode(',', array_keys($para));
        $table_value = implode("','", $para);

        $sql="INSERT INTO $table($table_columns) VALUES('$table_value')";

        $result = $this->connection->query($sql);

        return $result;
    }

    public function update($table,$para=array(),$id){

        $args = array();

        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'"; 
        }


        $sql="UPDATE  $table SET " . implode(',', $args);
        $sql .=" WHERE $id";

        $result = $this->connection->query($sql);

        return $result;

    }


    public function delete($table,$id){

        $sql="DELETE FROM $table";

        $sql .=" WHERE $id ";

        $sql;

        $result = $this->connection->query($sql);

        return $result;

    }

    public function select($table,$rows="*",$where = null){

        if ($where != null) {
            $sql="SELECT $rows FROM $table WHERE $where";
        }else{
            $sql="SELECT $rows FROM $table";
        }

        $result = $this->connection->query($sql);

        return $result;

    }

}


?>