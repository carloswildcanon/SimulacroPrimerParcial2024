<?php
class MotoNacional extends Moto{
    private $descuento;
    public function __construct($codigoMoto,$costMoto,$aniFabMoto,$descripMoto,$porIncreAnual,$sePuedeVender, $descuento)
    {
        parent::__construct($codigoMoto,$costMoto,$aniFabMoto,$descripMoto,$porIncreAnual,$sePuedeVender);
        $this->descuento=$descuento ?? 15;
    }
    public function getDescuento()
    {
        return $this->descuento;
    }
    public function setDescuento($nDescuento){
        $this->descuento=$nDescuento;
    }
    public function __toString()
    {
        $cadena=parent::__toString();
        return $cadena. 
               "Descuento: ". $this->getDescuento() ."\n";
    }

    public function darPrecioVenta()
    {   
        $precio=parent::darPrecioVenta();
        if($precio>0){
            $precio-=$precio * $this->getDescuento()/100;
        }
        return $precio;
    }

}


?>
