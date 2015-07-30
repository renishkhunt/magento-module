<?php

class Matword_Students_StudentsController extends Mage_Adminhtml_Controller_Action{

	public function indexAction(){
		$this->loadLayout();
		// var_dump(Mage::getSingleton('core/layout')->getUpdate()->getHandles());die();
		$this->renderLayout();
	}

}