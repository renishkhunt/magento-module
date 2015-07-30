<?php

class Matword_Students_Model_Student extends Mage_Core_Model_Abstract{

	public function _construct(){

		parent::_construct();
		$this->_init('matword_students/student');

	}

}