<?php
class Moto{
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa;
    public function __construct($codigoMoto,$costMoto,$aniFabMoto,$descripMoto,$porIncreAnual,$sePuedeVender)
    {
        $this->codigo=$codigoMoto;
        $this->costo=$costMoto;
        $this->anioFabricacion=$aniFabMoto;
        $this->descripcion=$descripMoto;
        $this->porcentajeIncrementoAnual=$porIncreAnual;
        $this->activa=$sePuedeVender;
    }
    public function getCodigo(){
        return $this->codigo;
    }
    public function getCosto(){
        return $this->costo;
    }
    public function getAnioFabricacion(){
        return $this->anioFabricacion;
    }
    public function getdescripcion(){
        return $this->descripcion;
    }
    public function getPorcentajeIncrementoAnual(){
        return $this->porcentajeIncrementoAnual;
    }
    public function getActiva(){
        return $this->activa;
    }
    public function setCodigo($codNuevoMoto){
        $this->codigo=$codNuevoMoto;
    }
    public function setCosto($cosNuevo){
        $this->costo=$cosNuevo;
    }
    public function setAnioFabricacion($anioFabuevo){
        $this->anioFabricacion=$anioFabuevo;
    }
    public function setdescripcion($desMotoVueva){
        $this->descripcion=$desMotoVueva;
    }
    public function setPorcentajeIncrementoAnual($porIntAnualNuevo){
        $this->porcentajeIncrementoAnual=$porIntAnualNuevo;
    }
    public function setActiva($activaNuevo){
        $this->activa=$activaNuevo;
    }

    public function darPrecioVenta(){
        $_venta=-1;
        if($this->getActiva()){
            $anioActual=intval(date("Y"));
            $anio=$anioActual-$this->getAnioFabricacion();
            $_venta=$this->getCosto()*(1+$anio*$this->getporcentajeIncrementoAnual()/100);
        }
        return $_venta;
    }

    public function __toString()
    {
        return "codigo: ". $this->getCodigo().
               ", costo: ". $this->getCosto().
               ", anio Fabricacion: ". $this->getAnioFabricacion().
               ", descripcion: ". $this->getdescripcion().
               ", porcentaje incremento anual: ". $this->getPorcentajeIncrementoAnual().
               ", activa: ". $this->getActiva(). "\n";
    }
}
?>