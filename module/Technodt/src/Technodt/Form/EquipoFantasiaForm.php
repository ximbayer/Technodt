<?php

namespace Technodt\Form;

use Zend\Form\Form;
use Technodt\Controller\EquiposFantasiaController;

class EquipoFantasiaForm extends Form
{
	protected $daoFutbolistas;
	
    public function __construct($name = null)
    {
        parent::__construct('equipo_fantasia');
        
        //Texto para el nombre de usuario
        $this->add(array(
            'name' => 'nombreUsuario',
            'attributes' => array(
                'type' => 'text',
                'class' => 'output'
            ),
        ));
		
		//Campo para el Nombre del Equipo Fantasia
		$this->add(array(
            'name' => 'equipo_fantasia_nombre',
            'type' => 'Text',
            'options' => array(
                'label' => 'Nombre del Equipo: ',
            ),
        ));
        
        //Texto para el nombre del equipo fantasia Ya Creado
        $this->add(array(
            'name' => 'nombreEquipo',
            'options' => array(
                'label' => 'Nombre del equipo ',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'output'
            ),
        ));
        
        
     /*
        $cot = new Element\Select('cotizacionDesde');
        $cot->setLabel('Cotizacion desde: ');
        $cot->setEmptyOption('Seleccione...');
        $cot->setValueOptions(array());
        $cot->add($cot);
     
        $cot2 = new Element\Select('cotizacionHasta');
        $cot2->setLabel('hasta: ');
        $cot2->setEmptyOption('Seleccione...');
        $cot2->setValueOptions(array());
        $cot2->add($cot2);
        
        //selector de pagina
     
        $club = new Element\Select('pagina');
        $club->setLabel('Pagina: ');
        $club->setEmptyOption('1');
        $club->setValueOptions(array());
        $club->add($club);*/
     
        //boton para guardar
     
        $this->add(array(
            'name' => 'guardar',
            'attributes' => array(
                'value' => 'Guardar Equipo',
                'title' => 'Guardar',
                'type' => 'Submit'
            ),
        ));
		
		$this->add(array(
            'name' => 'buscar',
            'attributes' => array(
                'value' => '      Buscar Jugadores      ',
                'title' => 'Buscar',
                'type' => 'Submits'
            ),
        ));
		
		//Botón Poner
		$this->add(array(
            'name' => 'poner',
            'attributes' => array(
                'value' => 'Poner',
                'title' => 'Poner',
                'type' => 'Submit'
            ),
        ));
		
		//Botón Sacar
		$this->add(array(
            'name' => 'sacar',
            'attributes' => array(
                'value' => 'Sacar',
                'title' => 'Sacar',
                'type' => 'Submit'
            ),
        ));
        
        //Botón Cambiar
		$this->add(array(
            'name' => 'cambiar',
            'attributes' => array(
                'value' => 'Cambiar',
                'title' => 'Cambiar',
                'type' => 'Submit'
            ),
        ));
        
	}
	
	public function getDAOFutbolistas()
     {
        
         if (!$this->daoFutbolistas) {
             $sm = $this->getServiceLocator();
             $this->daoFutbolistas = $sm->get('Technodt\Model\DAO\DAOFutbolistas');
         }
         return $this->daoFutbolistas;
	}

	
}