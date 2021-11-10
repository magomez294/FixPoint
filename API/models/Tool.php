<?php
require_once('../database/db.php');
class Tool extends DB{
    private const NAME = 'NomHer';
    private const ID = 'ID_Herramienta';
    private const DESCRIPTION= 'Descripcion';
    private const IMAGE = 'Imagen';
    private $name;
    private $description;
    private $image;
    private $imageId;
    private $imageExtension;
    private $imageName;
    private $validExtensions = array('jpg','png','gif');
    private const MaxImageSize = '10485760';
    private const imageDirectory = $_SERVER['DOCUMENT_ROOT'].'/Images/';

    private $errors = array();
    private const ErrorInvalidExtension = 'La extensión del archivo no es válida o no se ha subido ningún archivo';
    private const ErrorInvalidSize = 'La imagen debe de tener un tamaño inferior a 10 mb';

    public function __construct($name, $description, $image){
        parent::__construct(); 
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
    }

    private function validateImage(){
        $imagePath = pathinfo($this->image['name']);

        $this->imageExtension =  $imagePath['extension'];
        if(!in_array($this->imageExtension, $this->validExtensions)){
            array_push($this->errors, Tool::ErrorInvalidExtension);
            return false;
        }

        $imageSize = $this->image['size'];
        if ($imageSize > Tool::MaxImageSize) {
            array_push($this->errors, Tool::ErrorInvalidSize);
            return false;
        }
        return true;
    }

    function uploadImage(){
        if ($this->validateImage()) {
            $result = $this->insert('herramientas', [Tool::NAME=>$this->name, Tool::DESCRIPTION=>$this->description]);
            $this->imageId = $this->connection->insert_id;
            if (!$result) {
                $_SESSION['message'] = 'Error al intentar guardar la herramienta';
                $_SESSION['color'] = 'red';
                return false;
            }
            $result = $this->update('herramientas',[Tool::IMAGE=>$this->imageId], "".Tool::ID."='$this->imageId'");
            if (!$result) {
                $_SESSION['message'] = 'Error al intentar guardar la herramienta';
                $_SESSION['color'] = 'red';
                return false;
            }
            $this->imageName = $this->imageId.$this->imageExtension;
            move_uploaded_file($this->image['tmp_name'], Tool::imageDirectory.$this->imageName);
            return true;
        }else{
            return false;
        }
        
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