<?php
namespace Companies;
use Companies\Model\Companies;
use Companies\Model\CompaniesTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
    	return array(
    			'factories' => array(
    					'Companies\Model\CompaniesTable' =>  function($sm) {
    						$tableGateway = $sm->get('CompaniesTableGateway');
    						$table = new CompaniesTable($tableGateway);
    						return $table;
    					},
    					'companiesTableGateway' => function ($sm) {
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Companies());
    						return new TableGateway('companies', $dbAdapter, null, $resultSetPrototype);
    					},
    			),
    	);
    }    
}
