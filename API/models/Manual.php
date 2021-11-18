<?php
require_once('../database/db.php');
class Manual extends DB{
    private const MANUALS = 'manual';
    private const NAME = 'NomMan';
    private const ID = 'ID_Manual';
    private const AUTOR = 'Autor';
    private const VALIDATED= 'Aceptado';
    private const PDF = 'Documento';

    private $pdfDirectory; 

    public function __construct(){
        parent::__construct(); 
        
        $this->pdfDirectory = $_SERVER['DOCUMENT_ROOT'].'/manuals/';  
        
    }
    //llama a las funciones de db.php con parametros recibidos de la web
    public function validate($id){
        $result = $this->update(Manual::MANUALS, [Manual::VALIDATED=>1], "".Manual::ID."='$id'");
        if($result){
            return true;
        }
        return false;
    }
    public function reject($id){
        $result = $this->delete(Manual::MANUALS, "".Manual::ID."='$id'");
        if($result){
            return true;
        }
        return false;
    }
    public function create($title,$pdf){

        $result = $this->insert(Manual::MANUALS, [Manual::NAME=>$title, Manual::AUTOR=>$_SESSION['userId']]);
        if (!$result) {
            $_SESSION['message'] = 'Error al intentar subir el manual';
            $_SESSION['color'] = 'red';
            return false;
        }
        $pdfId = $this->connection->insert_id;
        
        $result = $this->update(Manual::MANUALS,[Manual::PDF=>$pdfId.".pdf"], "".Manual::ID."='$pdfId'");
        if (!$result) {
            $_SESSION['message'] = 'Error al intentar subir el manual';
            $_SESSION['color'] = 'red';
            return false;
        }
        
        $pdfName = $pdfId.".pdf";
        move_uploaded_file($pdf['tmp_name'], $this->pdfDirectory.$pdfName);
        return true;
    }
}

?>