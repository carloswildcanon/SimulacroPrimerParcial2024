<?php
class MotoImportada extends Moto{
    private $paisOrigen;
    private $impuesto;
    public function __construct($codigoMoto,$costMoto,$aniFabMoto,$descripMoto,$porIncreAnual,$sePuedeVender,$paisOrigen,$impuesto)
    {
        parent::__construct($codigoMoto,$costMoto,$aniFabMoto,$descripMoto,$porIncreAnual,$sePuedeVender);
        $this->paisOrigen=$paisOrigen;
        $this->impuesto=$impuesto;
    }
    public function getPaisOrigen(){
        return $this->paisOrigen;
    }
    public function getImpuesto(){
        return $this->impuesto;
    }
    public function setPaisOrigen($nPaisOrigen){
        return $this->$nPaisOrigen;
    }
    public function setImpuesto($nImpuesto){
        return $this->$nImpuesto;
    }
    public function __toString()
    {
        $cadena=parent::__toString();
        return $cadena. 
               "Pais Origen: ". $this->getPaisOrigen() ."\n". 
               "Impuesto: ". $this->getImpuesto(). "\n";
    }

    public function darPrecioVenta()
    {
        $precio=parent::darPrecioVenta();
        if($precio>0){
        $precio+=$precio * $this->getImpuesto()/100;
        }
        return $precio;
    }
    
}

?>
