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
                'label' => 'Tipo de Documento:',
                'value_options' => array(
                    '0' => 'DNI',
                    '1' => 'LE',
                    '2' => 'LC',
                ),
            ),
        ));
        $this->add(array(
            'name' => 'documento',
            'type' => 'Text',
            'options' => array(
                'label' => 'Documento:',
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