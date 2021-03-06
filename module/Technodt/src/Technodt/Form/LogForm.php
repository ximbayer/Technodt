<?php

namespace Technodt\Form;

use Zend\Form\Form;

class LogForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('log');
        $this->add(array(
            'name' => 'tipo_documento',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Tipo de Documento: ',
				'empty_option' => 'Seleccione...',
                'value_options' => array(
                    '1' => 'DNI',
                    '2' => 'LE',
                    '3' => 'LC',
                ),
            ),
        ));
        $this->add(array(
            'name' => 'documento',
            'type' => 'Text',
            'options' => array(
                'label' => 'Documento: ',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'type' => 'Password',
            'options' => array(
                'label' => 'Password: ',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Ingresar',
                'id' => 'submitbutton',
            ),
        ));
    }
}