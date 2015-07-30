<?php

class Matword_Students_IndexController extends Mage_Core_Controller_Front_Action{
	
	public function IndexAction(){
		echo 'Students Default Action';
	}
	
	public function studentAction(){
		$this->loadLayout();
		$this->_initLayoutMessages('customer/session');
		$this->renderLayout();
	}

	public function nstudentAction(){
		if($postdata = $this->getRequest()->getPost()){
			
			$model = Mage::getModel('matword_students/student')->setData($postdata);

			try {
				$insertId = $model->save();
				$msg = "Student has been Saved";
				Mage::getSingleton('customer/session')->addSuccess($msg);
			} catch (Exception $e) {
				Mage::getSingleton('customer/session')->addSuccess($e->getMessage());
			}
		}
		$this->_redirect('students/index/student');
	}

	public function layoutsAction(){
		$this->loadLayout();
		$this->renderLayout();
	}

}