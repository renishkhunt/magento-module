<?php

class Matword_Students_StudentController extends Mage_Adminhtml_Controller_Action{

	public function indexAction(){

		$this->_initAction()
			 ->renderLayout();

	}

	public function newAction(){

		$this->_forward('edit');

	}

	public function editAction(){

		$this->_initAction();

		$id = $this->getRequest()->getParam('id');
		$model = Mage::getModel('matword_students/student');

		if($id){
			$model->load($id);
			if(!$model->getId()){
				Mage::getSingleton('adminhtml/session')->addError($this->__('This Student no longer exists.'));
				$this->_redirect("*/*/");
				return;
			}
		}

		$this->_title($model->getId() ? $model->getName() : $this->__('New Student'));

		$data = Mage::getSingleton('adminhtml/session')->getStudentData(true);
		if(!empty($data)){
			$model->setData($data);
		}

		Mage::register('matword_students',$model);

		$this->_initAction()
			 ->_addBreadcrumb($id ? $this->__('Edit Student') : $this->__('New Student'), $id ? $this->__('Edit Studet') : $this->__('New Student'))
			 ->_addContent($this->getLayout()->createBlock('matword_students/adminhtml_student_edit')->setData('action',$this->getUrl('*/*/save')))
			 ->renderLayout();

	}
	
	public function deleteAction(){

		$id = $this->getRequest()->getParam('id');
		$model = Mage::getModel('matword_students/student');

		if($id){
			$model->load($id);
			
			if(!$model->getId()){
				Mage::getSingleton('adminhtml/session')->addError($this->__('This Student no longer exists.'));
				$this->_redirect("*/*/");
				return;
			}
			try {
				$model->delete();
				Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Student has been Deleted.'));
				$this->_redirect('*/*/');
				return;
			}catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while deleting this student.'));
            }
		}
        $this->_redirectReferer();
	}

	public function saveAction(){
		if($postData = $this->getRequest()->getPost()){
			$model = Mage::getSingleton('matword_students/student');
			$model->setData($postData);

			try {
				$model->save();
				Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Student has been Saved.'));
				$this->_redirect('*/*/');
				return;
			}catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while saving this baz.'));
            }

            Mage::getSingleton('adminhtml/session')->setStudentData($postData);
            $this->_redirectReferer();
		}
	}

	public function messageAction(){
		$data = Mage::getModel('matword_students')->load($this->getRequest()->getParam('id'));
		echo $data->getContent();
	}

	protected function _isAllowed(){
		return Mage::getSingleton('admin/session')->isAllowed('matword_students/matword_students_student');
	}
	
	public function exportStudentCsvAction(){
		$fileName = "student.csv";
		$grid = $this->getLayout()->createBlock('matword_students/adminhtml_student_grid');
		$this->_prepareDownloadResponse($fileName,$grid->getCsvFile($fileName));
	}

	public function exportStudentExcelAction(){
		$fileName = "student.xml";
		$grid = $this->getLayout()->createBlock('matword_students/adminhtml_student_grid');
		$this->_prepareDownloadResponse($fileName,$grid->getExcelFile($fileName));
	}

	protected function _initAction(){
		$this->loadLayout()
			 ->_setActiveMenu('matword/student')
			 ->_title($this->__('Matword'))
			 ->_title($this->__('Student'))
			 ->_addBreadcrumb($this->__('Matword'),$this->__('Matword'))
			 ->_addBreadcrumb($this->__('Student'),$this->__('Student'));

		return $this;

	}

}