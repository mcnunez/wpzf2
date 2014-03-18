<?php
namespace Companies\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Companies\Model\Companies;
use Companies\Form\CompaniesForm;

class IndexController extends AbstractActionController
{
	protected $companiesTable;

	public function indexAction()
	{
		
		return new ViewModel(array(
				'companies' => $this->getCompaniesTable()->fetchAll(),
		));
		
	}

	public function addAction()
	{
		
		$form = new CompaniesForm();
		$form->get('submit')->setValue('Add');

		$request = $this->getRequest();
		if ($request->isPost()) {
			$companies = new Companies();
			$form->setInputFilter($companies->getInputFilter());
			$form->setData($request->getPost());

			if ($form->isValid()) {
				$companies->exchangeArray($form->getData());
				$this->getCompaniesTable()->saveCompanies($companies);

				// Redirect to list of albums
				return $this->redirect()->toRoute('companies');
			}
		}
		return array('form' => $form);
		
	}

	public function editAction()
	{
		
		$id = (int) $this->params()->fromRoute('id', 0);
		if (!$id) {
			return $this->redirect()->toRoute('companies', array(
					'action' => 'add'
			));
		}

		// Get the Companies with the specified idcompanie.  An exception is thrown
		// if it cannot be found, in which case go to the index page.
		try {
			$companies = $this->getCompaniesTable()->getCompanies($id);
		}
		catch (\Exception $ex) {
			return $this->redirect()->toRoute('companies', array(
					'action' => 'index'
			));
		}

		$form  = new CompaniesForm();
		$form->bind($companies);
		$form->get('submit')->setAttribute('value', 'Edit');

		$request = $this->getRequest();
		if ($request->isPost()) {
			$form->setInputFilter($companies->getInputFilter());
			$form->setData($request->getPost());

			if ($form->isValid()) {
				$this->getCompaniesTable()->saveCompanies($companies);

				// Redirect to list of albums
				return $this->redirect()->toRoute('companies');
			}
		}

		return array(
				'idcompanie' => $id,
				'form' => $form,
		);

	}

	public function deleteAction()
	{
		
		$id = (int) $this->params()->fromRoute('id', 0);
		if (!$id) {
			return $this->redirect()->toRoute('companies');
		}

		$request = $this->getRequest();
		if ($request->isPost()) {
			$del = $request->getPost('del', 'No');

			if ($del == 'Yes') {
				$id = (int) $request->getPost('id');
				$this->getCompaniesTable()->deleteCompanies($id);
			}

			// Redirect to list of companies
			return $this->redirect()->toRoute('companies');
		}

		return array(
				'idcompanie'    => $id,
				'companies' => $this->getCompaniesTable()->getCompanies($id)
		);
		
	}



	public function getCompaniesTable()
	{
		
		if (!$this->companiesTable) {
			$sm = $this->getServiceLocator();
			$this->companiesTable = $sm->get('Companies\Model\CompaniesTable');
		}
		return $this->companiesTable;
		
	}
	
}

