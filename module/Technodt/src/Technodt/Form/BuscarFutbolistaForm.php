<?php

namespace Technodt\Form;

use Zend\Form\Form;

class BuscarFutbolistaForm extends Form
{

	
    public function __construct($name = null)
    {
        parent::__construct('buscar_jugador');
        
		
        //SELECTS PARA CLUB, POSICION, COTIZACION
		
		$this->add(array(
            'name' => 'club',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Club: ',
                'value_options' => array('Todos'=>'Todos', '1' => 'Argentinos Jrs','2'=>'Arsenal','3'=>'Atletico Tucumán','4'=>'Banfield','5'=>'Boca','6'=>'Chacarita','7'=>'Colón','8'=>'Estudiantes','9'=>'Gimnasia','10'=>'Godoy Cruz','11'=>'Huracan','12'=>'Independiente','13'=>'Lanus','14'=>"Newell's",'15'=>'Racing','16'=>'River','17'=>'Rosario Central','18'=>'San Lorenzo','19'=>'Tigre','20'=>'Velez')
            ),
        ));
		
		$this->add(array(
            'name' => 'posicion',
            'type' => 'Zend\Form\Element\Select',
			'attributes' => array(
                'style' => 'width:100px;'
            ),
            'options' => array(
                'label' => 'Posicion: ',
                'value_options' => array('Todas'=>'Todas','1'=>'ARQ', '2' => 'DEF', '3' => 'VOL', '4'=>'DEL'),				
            ),
        ));

        $this->add(array(
            'name' => 'cotizacionDesde',
            'type' => 'Zend\Form\Element\Select',
			'attributes' => array(
                'style' => 'width:180px;'
            ),
            'options' => array(
                'label' => 'Cotización Desde: ',
                'value_options' => array('0' => '$0', '200000'=> '$200.000', '300000'=>'$300.000', '400000'=>'$400.000','500000'=>'$500.000', '1000000'=>'$1.000.000', '3000000'=>'3.000.000', '5000000'=>'$5.000.000','10000000'=> '$10.000.000'),
				
            ),
        ));
		
		$this->add(array(
            'name' => 'cotizacionHasta',
            'type' => 'Zend\Form\Element\Select',
			'attributes' => array(
                'style' => 'width:180px;'
            ),
            'options' => array(
                'label' => 'Cotización Desde: ',
                'value_options' => array('200000'=> '$200.000', '300000'=>'$300.000', '400000'=>'$400.000','500000'=>'$500.000', '1000000'=>'$1.000.000', '3000000'=>'3.000.000', '5000000'=>'$5.000.000','10000000'=> '$10.000.000'),
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
	
}