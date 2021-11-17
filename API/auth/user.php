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

    public function login($username, $password){
        $json = [];
        $result = $this->connection->query("SELECT ".User::ID.", ".User::NAME.", ".User::PASSWORD." FROM ".User::USERS." WHERE Nombre='$username'");
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                if (password_verify($password, $row[User::PASSWORD])) {
                    $json['id'] = $row[User::ID];
                    $json['username'] = $row[User::NAME];
                    if($row[User::IS_ADMIN] == 1){
                        $json['admin'] = true;
                    }
    
                    return json_encode($json);
                }
            }
        }
        
        return false;
    }

    public function createAccount($username, $email, $password){
        $json = [];
        $encryptPassword = password_hash($password,PASSWORD_BCRYPT);
        $result = $this->insert(User::USERS,[User::NAME=>$username, User::EMAIL=>$email, User::PASSWORD=>$encryptPassword]);
        if($result){
            $result = $this->select(User::USERS,"*");
            if($result){
                while ($row = mysqli_fetch_array($result)) {
                        $json['id'] = $row[User::ID];
                        $json['username'] = $row[User::NAME];
                        $json['email'] = $row[User::EMAIL];
                        return json_encode($json);
                }
            }
        }
        return false;
    }
}

?>