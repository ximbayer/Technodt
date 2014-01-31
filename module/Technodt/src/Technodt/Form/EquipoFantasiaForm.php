<?php

namespace Technodt\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class EquipoFantasiaForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('equipo');
        
        //Texto para el nombre de usuario
        $this->add(array(
            'name' => 'nombreUsuario',
            'attributes' => array(
                'type' => 'text',
                'class' => 'output'
            ),
        ));
        
        //Texto para el nombre del equipo fantasia
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
        
        //SELECTS PARA CLUB, POSICION, COTIZACION
    
        $club = new Element\Select('club');
        $club->setLabel('Club: ');
        $club->setEmptyOption('Todos');
        $club->setValueOptions(array());
        $club->add($club);
     
        $pos = new Element\Select('posicion');
        $pos->setLabel('Posicion: ');
        $pos->setEmptyOption('Todos');
        $pos->setValueOptions(array(
                            'options' => array(
                                    '0' => 'Arquero',
                                    '1' => 'Defensor',
                                    '2' => 'Mediocampista',
                                    '3' => 'Delantero')));
        $pos->add($pos);
     
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
        $club->add($club);
     
        //botones para guardar y cancelar
     
        $this->add(array(
            'name' => 'guardar',
            'attributes' => array(
                'value' => 'Guardar',
                'title' => 'Guardar',
                'type' => 'Submit'
            ),
        ));
        
        $this->add(array(
            'name' => 'cancelar',
            'attributes' => array(
                'value' => 'Cancelar',
                'title' => 'Cancelar',
                'type' => 'Submit'
            ),
        ));
        
    }
}