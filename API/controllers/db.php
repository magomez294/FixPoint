<?php
/* session_start(); */
class DB{
    private $host;
    private $user;
    private $password;
    private $db;
    private $connection;

    public function __construct(){
        $this->host = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->db = 'fixpoint';
        $this->connection = null;

       
        $this->connection = new mysqli($this->host,$this->user,$this->password,$this->db);

        if ($this->connection->connect_error) {
            die("Connection failed: ".$this->connection->connect_error);
        }else{
            echo '
            <script type="text/JavaScript">
                console.log("DB is connected");
            </script>
            ';
        }
    }

    /* public function insert($table,$para=array()){

        $table_columns = implode(',', array_keys($para));
        $table_value = implode("','", $para);

        $sql="INSERT INTO $table($table_columns) VALUES('$table_value')";

        $result = $this->mysqli->query($sql);

        return $result;
    }

    public function update($table,$para=array(),$id){

        $args = array();

        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'"; 
        }


        $sql="UPDATE  $table SET " . implode(',', $args);
        $sql .=" WHERE $id";

        $result = $this->mysqli->query($sql);

        return $result;

    }


    public function delete($table,$id){

        $sql="DELETE FROM $table";

        $sql .=" WHERE $id ";

        $sql;

        $result = $this->mysqli->query($sql);

        return $result;

    }

    public function select($table,$rows="*",$where = null){

        if ($where != null) {
            $sql="SELECT $rows FROM $table WHERE $where";
        }else{
            $sql="SELECT $rows FROM $table";
        }

        $result = $this->mysqli->query($sql);

        return $result;

    } */

}


?>