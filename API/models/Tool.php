<?php
require_once('../database/db.php');
class Tool extends DB{
    private const TOOLS = 'herramienta';
    private const NAME = 'NomHer';
    private const ID = 'ID_Herramienta';
    private const DESCRIPTION= 'Descripcion';
    private const IMAGE = 'Imagen';
    private const REQUESTED = 'Solicitado';
    private const AVAILABLE = 'Disponible';
    private const VALIDATED = 'Validado';
    private $name;
    private $description;
    private $image;
    private $imageId;
    private $imageExtension;
    private $imageName;
    private $validExtensions = array('jpg','png','gif');
    private const MaxImageSize = '10485760';
    private $imageDirectory;

    private $error;
    private const ErrorInvalidExtension = 'La extensión del archivo no es válida o no se ha subido ningún archivo';
    private const ErrorInvalidSize = 'La imagen debe de tener un tamaño inferior a 10 mb';

    public function __construct($name, $description, $image){
        parent::__construct(); 
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        /* echo 'entra'; */
        $this->imageDirectory = $_SERVER['DOCUMENT_ROOT'].'/Images/Tools/';
    }
    //valida la imagen comprobando si el sufijo y el tamaño de la misma son correctos
    private function validateImage(){
        $imagePath = pathinfo($this->image['name']);

        /* echo $imagePath; */

        $this->imageExtension =  $imagePath['extension'];
        if(!in_array($this->imageExtension, $this->validExtensions)){
            $this->error = Tool::ErrorInvalidExtension;
            return false;
        }

        $imageSize = $this->image['size'];
        if ($imageSize > Tool::MaxImageSize) {
            $this->error = Tool::ErrorInvalidSize;
            return false;
        }
        return true;
    }
    //funcion que valida, inserta y en caso de que ya exista la herramienta la updatea
    function createTool(){
        if ($this->validateImage()) {
            $result = $this->insert(Tool::TOOLS, [Tool::NAME=>$this->name, Tool::DESCRIPTION=>$this->description]);
            $this->imageId = $this->connection->insert_id;
            if (!$result) {
                $_SESSION['message'] = 'Error al intentar guardar la herramienta';
                $_SESSION['color'] = 'red';
                return false;
            }
            $result = $this->update(Tool::TOOLS,[Tool::IMAGE=>$this->imageId.".".$this->imageExtension], "".Tool::ID."='$this->imageId'");
            if (!$result) {
                $_SESSION['message'] = 'Error al intentar guardar la herramienta';
                $_SESSION['color'] = 'red';
                return false;
            }
            $this->imageName = $this->imageId.".".$this->imageExtension;
            move_uploaded_file($this->image['tmp_name'], $this->imageDirectory.$this->imageName);
            $_SESSION['message'] = 'Herramienta añadida';
            $_SESSION['color'] = 'green';
            return true;
        }else{
            $_SESSION['message'] = $this->error;
            $_SESSION['color'] = 'red';
            return false;
        }
        
    }
    function createToolAdmin(){
        if ($this->validateImage()) {
            $result = $this->insert(Tool::TOOLS, [Tool::NAME=>$this->name, Tool::DESCRIPTION=>$this->description]);
            $this->imageId = $this->connection->insert_id;
            if (!$result) {
                $_SESSION['message'] = 'Error al intentar guardar la herramienta';
                $_SESSION['color'] = 'red';
                return false;
            }
            $result = $this->update(Tool::TOOLS,[Tool::IMAGE=>$this->imageId.".".$this->imageExtension], "".Tool::ID."='$this->imageId'");
            if (!$result) {
                $_SESSION['message'] = 'Error al intentar guardar la herramienta';
                $_SESSION['color'] = 'red';
                return false;
            }
            $this->imageName = $this->imageId.".".$this->imageExtension;
            move_uploaded_file($this->image['tmp_name'], $this->imageDirectory.$this->imageName);
            $this->validate($this->imageId);
            $_SESSION['message'] = 'Herramienta añadida';
            $_SESSION['color'] = 'green';
            return true;
        }else{
            $_SESSION['message'] = $this->error;
            $_SESSION['color'] = 'red';
            return false;
        }
        
    }
    //funciones que cambian la disponibilidad de la herramienta
    function rent($id){
        $result = $this->update(Tool::TOOLS, [Tool::REQUESTED=>0, Tool::AVAILABLE=>0], "".Tool::ID."='$id'");
        if(!$result){
            return false;
        }
        $result = $this->update('alquila', ['Recogido'=>'true'], "".Tool::ID."='$id'");
        if(!$result){
            return false;
        }
        return true;
    }
    function undoRent($id){
        $result = $this->update(Tool::TOOLS, [Tool::REQUESTED=>0, Tool::AVAILABLE=>1], "".Tool::ID."='$id'");
        if(!$result){
            return false;
        }
        $result = $this->delete('alquila', "".Tool::ID."='$id'");
        if(!$result){
            return false;
        }
        return true;
    }

    function reject($id){
        $result = $this->delete(Tool::TOOLS, "".Tool::ID."='$id'");
        if($result){
            return true;
        }
        return false;
    }
    function validate($id){
        $result = $this->update(Tool::TOOLS, [Tool::VALIDATED=>1], "".Tool::ID."='$id'");
        if($result){
            return true;
        }
        return false;
    }
    function request($idTool, $idUser){
        $result = $this->update(Tool::TOOLS, [Tool::REQUESTED=>1], "".Tool::ID."='$idTool'");
        if(!$result){
            return false;
        }
        $result = $this->insert('alquila', ['ID_Usuario'=>$idUser, Tool::ID=>$idTool]);
        if(!$result){
            return false;
        }
        return true;
    }

    function set_name($name) {
        $this->name = $name;
    }

    function get_name() {
        return $this->name;
    }

    function set_description($description) {
        $this->description = $description;
    }
    function get_description() {
        return $this->description;
    }
}


?>