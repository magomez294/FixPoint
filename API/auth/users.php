<?php include("../database/db.php"); ?>
<?php

class Users extends DB{
    public function __construct(){
        parent::__construct(); 
    }

    public function login($username, $password){
        session_start();
        $json = [];
        $result = $this->connection->query("SELECT ID_Usuario, Nombre, Contrasena FROM usuario WHERE Nombre='$username'");
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                if ($password == $row['Contrasena']) {
                    /* $this->setCurrentUser($row['ID_Usuario']); */
                    $json['id'] = $row['ID_Usuario'];
                    $json['username'] = $row['Nombre'];
    
                    return json_encode($json);
                }
            }
        }
        
        return false;
    }
}

?>