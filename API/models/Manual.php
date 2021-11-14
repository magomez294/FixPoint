<?php
require_once('../database/db.php');
class Manual extends DB{
    private const MANUALS = 'manual';
    private const NAME = 'NomMan';
    private const ID = 'ID_Manual';
    private const AUTOR = 'Autor';
    private const VALIDATED= 'Aceptado';
    private const PDF = 'Documento';

    private $pdfDirectory = $_SERVER['DOCUMENT_ROOT'].'/manuals/';

    public function __construct(){
        parent::__construct();    
    }

    public function validate($id){
        $result = $this->update(Manual::MANUALS, [Manual::VALIDATED=>1], "id='$id'");
        if($result){
            return true;
        }
        return false;
    }
    public function create($tile, $autor, $pdf){
        $result = $this->insert(Manual::MANUALS, [Manual::NAME=>$tile, Manual::AUTOR=>$autor]);
        $pdfId = $this->connection->insert_id;
        if(!$result){
            return false;
        }
        $result = $this->update(Manual::MANUALS,[Manual::PDF=>$pdfId.".pdf"], "".Manual::ID."='$pdfId'");
        if(!$result){
            return false;
        }
        $pdfName = $pdfId.".pdf";
        move_uploaded_file($pdf, $this->pdfDirectory.$pdfName);
        return true;
    }
}

?>