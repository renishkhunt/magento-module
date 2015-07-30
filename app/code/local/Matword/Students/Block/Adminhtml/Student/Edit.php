<?php

class Matword_Students_Block_Adminhtml_Student_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{

	public function __construct(){

		$this->_blockGroup = 'matword_students';
		$this->_controller = 'adminhtml_student';

		parent::__construct();

		$this->_updateButton('save','label',$this->__('Save Student'));
		$this->_updateButton('delete','label',$this->__('Delete Student'));

	}

	public function getHeaderText(){
		if(Mage::registry('matword_students')->getId()){
			return $this->__('Edit Studen');
		}else{
			return $this->__('New Student');
		}

	}

}