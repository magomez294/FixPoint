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

    public function validate($id){
        $result = $this->update(Manual::MANUALS, [Manual::VALIDATED=>1], "id='$id'");
        if($result){
            return true;
        }
        return false;
    }
    public function create($title, $autor, $pdf){

        
        
        $result = $this->insert(Manual::MANUALS, [Manual::NAME=>$title, Manual::AUTOR=>$autor]);
        
        $pdfId = $this->connection->insert_id;
        
        if(!$result){
            echo $result;
            return false;
        }
        $result = $this->update(Manual::MANUALS,[Manual::PDF=>$pdfId.".pdf"], "".Manual::ID."='$pdfId'");
        if(!$result){
            return false;
        }
        
        $pdfName = $pdfId.".pdf";
        if (move_uploaded_file($pdf, $this->pdfDirectory.$pdfName)){

        }else{
            return false;
        }
        return true;
    }
}

?>