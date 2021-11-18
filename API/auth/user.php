<?php include("../database/db.php"); ?>
<?php

class User extends DB{
    private const USERS = 'usuario';
    private const EMAIL = 'Email';
    private const ID = 'ID_Usuario';
    private const NAME = 'Nombre';
    private const PASSWORD = 'Contrasena';
    private const IS_ADMIN = 'Admin';

    public function __construct(){
        parent::__construct(); 
    }
    //busca en la base de datos los nombres y contraseñas y las guarda para poder usarlas en login.php
    public function login($username, $password){
        $json = [];
        $result = $this->connection->query("SELECT ".User::ID.", ".User::NAME.", ".User::PASSWORD.", ".User::IS_ADMIN.", ".User::EMAIL." FROM ".User::USERS." WHERE Nombre='$username'");
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                /* password_verify($password, $row[User::PASSWORD] */
                if ($password == $row[User::PASSWORD]) {
                    $json['id'] = $row[User::ID];
                    $json['username'] = $row[User::NAME];
                    $json['email'] = $row[User::EMAIL];
                    if($row[User::IS_ADMIN] == 1){
                        if (session_status() === PHP_SESSION_NONE) {
                            session_start();
                        }
                        $_SESSION['admin'] = true;
                    }
    
                    return json_encode($json);
                }
            }
        }
        
        return false;
    }
    //crea un usuario en la bd con la info de createAcount.php, ademas guarda la sesion
    public function createAccount($username, $email, $password){
        $json = [];
        /* $encryptPassword = password_hash($password,PASSWORD_BCRYPT); */
        $result = $this->insert(User::USERS,[User::NAME=>$username, User::EMAIL=>$email, User::PASSWORD=>$password]);
        if($result){
            $id=$this->connection->insert_id;
            $result = $this->select(User::USERS,"*", "".User::ID."='$id'");
            if($result){
                while ($row = mysqli_fetch_array($result)) {
                        $json['id'] = $row[User::ID];
                        $json['username'] = $row[User::NAME];
                        $json['email'] = $row[User::EMAIL];
                        if($row[User::IS_ADMIN] == 1){
                            if (session_status() === PHP_SESSION_NONE) {
                                session_start();
                            }
                            $_SESSION['admin'] = true;
                        }
                        return json_encode($json);
                }
            }
        }
        return false;
    }
}

?>