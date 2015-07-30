<?php

class Matword_Students_Model_Resource_Student_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract{
	public function _construct(){
		$this->_init('matword_students/student');
	}
}