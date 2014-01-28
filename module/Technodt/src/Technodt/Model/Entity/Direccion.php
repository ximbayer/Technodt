<?php

namespace Technodt\Model\Entity;

class Direccion
 {
     public $idDireccion;
     public $calle;
     public $numero;
     public $depto;
     public $manzana;

     public function exchangeArray($data)
     {
         $this->idDireccion = (!empty($data['id_direccion'])) ? $data['id_direccion'] : null;
         $this->calle = (!empty($data['calle'])) ? $data['calle'] : null;
         $this->numero = (!empty($data['numero'])) ? $data['numero'] : null;
         $this->depto = (!empty($data['depto'])) ? $data['depto'] : null;
         $this->manzana = (!empty($data['manzana'])) ? $data['manzana'] : null;
     }
 }