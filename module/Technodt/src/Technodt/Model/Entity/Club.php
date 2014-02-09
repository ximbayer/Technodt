<?php

namespace Technodt\Model\Entity;

class Club
 {
     public $idClub;
     public $nombre;

     public function exchangeArray($data)
     {
         $this->idClub = (!empty($data['id_club'])) ? $data['id_club'] : null;
         $this->nombre = (!empty($data['nombre'])) ? $data['nombre'] : null;
	}

 }