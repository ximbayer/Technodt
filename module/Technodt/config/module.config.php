<?php
return array(
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
                    'route'    => '/technodt[/][:controller][/:action]',
                    'constraints' => array(
                        'controller'     => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        //'__NAMESPACE__' => 'Technodt\Controller',
                        'controller' => 'Technodt\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    
    /*'router' => array(
        'routes' => array(
            'technodt' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/technodt',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Technodt\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),*/
    'view_manager' => array(
        'template_path_stack' => array(
            'Technodt' => __DIR__ . '/../view',
        ),
    ),
);
