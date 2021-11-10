<?php include("../database/db.php"); ?>
<?php

class User extends DB{

    private const ID = 'ID_Usuario';
    private const NAME = 'Nombre';
    private const PASSWORD = 'Contrasena';

    public function __construct(){
        parent::__construct(); 
    }

    public function login($username, $password){
        session_start();
        $json = [];
        $result = $this->connection->query("SELECT ".User::ID.", ".User::NAME.", ".User::PASSWORD." FROM usuario WHERE Nombre='$username'");
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                if ($password == $row[User::PASSWORD]) {
                    $json['id'] = $row[User::ID];
                    $json['username'] = $row[User::NAME];
    
                    return json_encode($json);
                }
            }
        }
        
        return false;
    }
}

?>