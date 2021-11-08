<?php include("../../database/db.php"); ?>
<?php

class Users extends DB{
    public function __construct(){
        parent::__construct(); 
    }

    public function auth($username, $password){
        $json = [];
        $query = $this->mysqli->prepare("SELECT ID_Usuario, Nombre, Contraseña FROM usuario WHERE Nombre=?");
        $query->execute([$username]);
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($password, $row['Contraseña'])) {
                $json['id'] = $row['ID_Usuario'];
                $json['username'] = $row['Nombre'];

                return json_encode($json);
            }
        }
        return false;
    }
}

    

   /*  $query = sprintf("SELECT * FROM users WHERE username = '$username' AND password = '$md5password'");
    $result = mysqli_query($connection, $query); */

   /*  if($result){

    }else{
        
    } */

?>