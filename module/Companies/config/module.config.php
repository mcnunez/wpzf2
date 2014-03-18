 <?php
 return array(
     'controllers' => array(
         'invokables' => array(
             'Companies\Controller\Index' => 'Companies\Controller\IndexController',
         ),
     ),

 		// The following section is new and should be added to your file
 		'router' => array(
 				'routes' => array(
 						'companies' => array(
 								'type'    => 'segment',
 								'options' => array(
 										'route'    => '/companies[/:action][/:id]',
 										'constraints' => array(
 												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',// asi solo acepta letras y numeros
 												'id'     => '[0-9]+',
 										),
 										'defaults' => array(
 												'controller' => 'Companies\Controller\Index',
 												'action'     => 'index',
 										),
 								),
 						),
 				),
 		),
 			
 		
     'view_manager' => array(
         'template_path_stack' => array(
             'companies' => __DIR__ . '/../view',
         ),
     ),
 );