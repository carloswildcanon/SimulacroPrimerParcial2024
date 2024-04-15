<?php

class Empresa{
    private $denominacion;
    private $direccion;
    private $coleccionClientes;
    private $coleccionMotos;
    private $coleccionVentas;
    public function __construct($nomEmpresa,$dirEmpresa,$objsClientes,$objsMotos,$objsVentas)
    {
        $this->denominacion=$nomEmpresa;
        $this->direccion=$dirEmpresa;
        $this->coleccionClientes=$objsClientes;
        $this->coleccionMotos=$objsMotos;
        $this->coleccionVentas=$objsVentas;
    }
    public function getDenominacion(){
        return $this->denominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getColeccionClientes(){
        return $this->coleccionClientes;
    }
    public function getColeecionMotos(){
        return $this->coleccionMotos;
    }
    public function getColeccionVentas(){
        return $this->coleccionVentas;
    }

    public function setDenominacion($nombreNuevo){
        $this->denominacion=$nombreNuevo;
    }
    public function setDireccion($direccionNueva){
        $this->direccion=$direccionNueva;
    }
    public function setColeccionClientes($colClientesNueva){
        $this->coleccionClientes=$colClientesNueva;
    }
    public function setColeecionMotos($colMotosNueva){
        $this->coleccionMotos=$colMotosNueva;
    }
    public function setColeccionVentas($colVentasNueva){
        $this->coleccionVentas=$colVentasNueva;
    }

    public function retornarMotos($codigoMoto){
        $bandera=true;
        $contador=0;
        $aux=true;
        if ($this->getColeecionMotos()==null){
            $moto=[];
        }else{
            while($bandera){
                if ($codigoMoto==$this->getColeecionMotos()[$contador]->getCodigo()){
                    $moto=$this->getColeecionMotos()[$contador];
                    $bandera=false;
                    $aux=false;
                }
                if($contador==count($this->getColeecionMotos())-1 && $aux){
                    $moto=[];
                    $bandera=false;
                }
                $contador++;
            }

        }
        return $moto;
    }
    public function registrarVenta($colCodigosMoto,$objCliente){
        $numVenta=1;
        $colNuevaMotos=[];
        $arrayVentas=[];
        if($this->getColeccionVentas()!=null){
            $numVenta=$this->getColeccionVentas()[count($this->getColeccionVentas())-1]->getNumero()+1;
        }
        $objVentaNueva=new Ventas($numVenta,date("d/m/Y H:i:s"),$objCliente,$colNuevaMotos,0);
        foreach($colCodigosMoto as $codigo){
            
            if($this->retornarMotos($codigo)!=null && $objCliente->getEstadoAlta()){
                $cargaMoto=$objVentaNueva->incorporarMoto($this->retornarMotos($codigo));
                if($cargaMoto){
                    $arrayVentas=$this->getColeccionVentas();
                    array_push($arrayVentas,$objVentaNueva);
                    
                }
            }
        } 
        if($arrayVentas != null){
            $this->setColeccionVentas($arrayVentas);
        }
        return $arrayVentas;
    }

    public function retornarVentasXCliente($tipo,$numDoc){
        $colVentasCliente=[];
        
        if($this->getColeccionVentas() != null){
              
            foreach($this->getColeccionVentas() as $venta){
                if($venta->getCliente()->getTipoDocumento()==$tipo && $venta->getCliente()->getNumeroDocumento()==$numDoc){
                      
                    array_push($colVentasCliente,$venta);
                }
            }
        }
        return $colVentasCliente;
        
    }

    public function concatenaClientes(){
        $cadena="";
        if ($this->getColeccionClientes()==null){
            $cadena="no hay clientes";
        }else{
            for($i=0;$i<count($this->getColeccionClientes());$i++){
                
                $cadena = $cadena.$this->getColeccionClientes()[$i]->__toString() ;
            }
        }
        return $cadena;
    }


    public function concatenaMotos(){
        $cadena="";
        if ($this->getColeecionMotos()==null){
            $cadena="no hay motos";
        }else{
            for($i=0;$i<count($this->getColeecionMotos());$i++){
                $cadena=$cadena.$this->getColeecionMotos()[$i]->__toString();
            }
        }
        return $cadena;
    }



    public function concatenaVentas(){
        $cadena="";
        if ($this->getColeccionVentas()==null){
            $cadena="no hay ventas";
        }else{
            for($i=0;$i<count($this->getColeccionVentas());$i++){
                $cadena=$cadena.$this->getColeccionVentas()[$i]->__toString();
            }
        }
        return $cadena;
    }

    public function __toString()
    {
        return "denominacion: ". $this->getDenominacion(). "\n". 
                "direccion: ". $this->getDireccion(). "\n". 
                "clientes: ". $this->concatenaClientes(). "\n". 
                "Motos: ". $this->concatenaMotos(). "\n" .
                "Ventas: ". $this->concatenaVentas(). "\n";


    }

}


?>