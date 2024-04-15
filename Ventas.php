<?php
class Ventas{
    private $numero;
    private $fecha;
    private $objCliente;
    private $objMotos;//una coleccion de objetos motos
    private $precioFinal;
    public function __construct($numeroVenta,$fechaVenta,$cliente,$coleccionMotos,$precioFinalVenta)
    {
        $this->numero=$numeroVenta;
        $this->fecha=$fechaVenta;
        $this->objCliente=$cliente;
        $this->objMotos=$coleccionMotos;
        $this->precioFinal=$precioFinalVenta;
    }
    
    public function getNumero(){
        return $this->numero;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getCliente(){
        return $this->objCliente;
    }
    public function getMotos(){
        return $this->objMotos;
    }
    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    public function setNumero($numVenta){
        $this->numero=$numVenta;
    }
    public function setFecha($fechaVenta){
        $this->fecha=$fechaVenta;
    }
    public function setCliente($clienteNuevo){
        $this->objCliente=$clienteNuevo;
    }
    public function setMotos($motos){
        $this->objMotos=$motos;
    }
    public function setPrecioFinal($precioVenta){
        $this->precioFinal=$precioVenta;
    }

    public function incorporarMoto($objMoto){
        $cargaMoto=false;
        if($objMoto->getActiva()){
            $arrayMotos=$this->getMotos();
            array_push($arrayMotos,$objMoto);
            $this->setPrecioFinal($this->getPrecioFinal()+$objMoto->darPrecioVenta());
            $this->setMotos($arrayMotos);
            $cargaMoto=true;
        }
        return $cargaMoto;

    }






    public function concatenaMotos(){
        $cadena="";
        if ($this->getMotos()==null){
            $cadena="no hay motos";
        }else{
            for($i=0;$i<count($this->getMotos());$i++){
                $cadena=$cadena.$this->getMotos()[$i]->__toString();
            }
        }
        return $cadena;
    }

    

    public function __toString()
    {
        return "numero Venta: ". $this->getNumero(). 
                ", fecha de venta: ". $this->getFecha().
                ", cliente: ". $this->getCliente()->__toString().
                ", Motos: ". $this->concatenaMotos().
                ", precio final: ". $this->getPrecioFinal(). "\n";
    }
        
    
}


?>