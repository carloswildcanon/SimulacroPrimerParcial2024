<?php
class Cliente{
    private $nombre;
    private $apellido; 
    private $estadoAlta;// si está dado de baja o alta es un booleano
    private $tipoDocumento;
    private $numeroDocumanto;
    public function __construct($nombreCliente,$apellidoCliente,$estadoCliente,$tipoDocCliente,$numDocCliente)
    {
        $this->nombre=$nombreCliente;
        $this->apellido=$apellidoCliente;
        $this->estadoAlta=$estadoCliente;
        $this->tipoDocumento=$tipoDocCliente;
        $this->numeroDocumanto=$numDocCliente;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getEstadoAlta(){
        return $this->estadoAlta;
    }
    public function getTipoDocumento(){
        return $this->tipoDocumento;
    }
    public function getNumeroDocumento(){
        return $this->numeroDocumanto;
    }
    public function setNombre($nomCliente){
        $this->nombre=$nomCliente;
    }
    public function setApellido($apeClie){
        $this->apellido=$apeClie;
    }
    public function setEstadoAlta($estClie){
        $this->estadoAlta=$estClie;
    }
    public function setTipoDocumento($tipDoc){
        $this->tipoDocumento=$tipDoc;
    }
    public function setNumeroDocumento($numDoc){
        $this->numeroDocumanto=$numDoc;
    }
    public function __toString()
    {
        return $this->getNombre(). " " .$this->getApellido().
                " ". $this->getTipoDocumento(). ":".
                 $this->getNumeroDocumento(). " ". $this->getEstadoAlta(). "\n"; 
    }
}

?>