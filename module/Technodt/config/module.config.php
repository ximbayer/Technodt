<?php
return array(
    //segun docum traducida
    'di' => array(
        'instance' => array(
            'Zend\View\Resolver\TemplatePathStack' => array(
                'parameters' => array(
                    'paths'  => array(
                        'technodt' => __DIR__ . '/../view',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Technodt\Controller\Index' => 'Technodt\Controller\IndexController',
            'Technodt\Controller\Login' => 'Technodt\Controller\LoginController',
            'Technodt\Controller\Usuarios' => 'Technodt\Controller\UsuariosController'
        ),
    ),
    'router' => array(
        'routes' => array(
            'technodt' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/technodt[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Technodt\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'login' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/technodt/login[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Technodt\Controller\Login',
                        'action'     => 'login',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'album' => __DIR__ . '/../view',
        ),
    ),
);
