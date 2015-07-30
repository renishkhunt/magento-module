<?php

class Matword_Students_Model_Resource_Student extends Mage_Core_Model_Resource_Db_Abstract{

	public function _construct(){
	
		$this->_init('matword_students/student','student_id');
	
	}

}