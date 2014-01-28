<?php

namespace Video7\Model\Entity;

class Modelo 
{
    private $texto;
    
    public function __construct() 
    {
        $this->texto= "Hola desde el modelo. Enviando Datos desde dentro";
    }
    
    public function getTexto() 
    {
        return $this->texto;
    }
}
