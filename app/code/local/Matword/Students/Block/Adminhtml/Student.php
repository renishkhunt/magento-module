<?php

class Matword_Students_Block_Adminhtml_Student extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct(){

		$this->_controller = 'adminhtml_student';
		$this->_blockGroup = 'matword_students';
		$this->_headerText = $this->__('Student');

		parent::__construct();

	}

}