<?php

class Matword_Students_Block_Adminhtml_Student_Grid extends Mage_Adminhtml_Block_Widget_Grid{

	public function __construct(){

		parent::__construct();

		$this->setDefaultSort('student_id');
		$this->setId('matword_students_student_grid');
		$this->setDefaultDir('desc');
		$this->setSaveParametersInSession(true);
		$this->setUseAjax(true);

	}

	protected function _getCollectionClass(){
		return 'matword_students/student_collection';
	}

	protected function _prepareCollection(){
		$collection = Mage::getResourceModel($this->_getCollectionClass());
		$this->setCollection($collection);

		return parent::_prepareCollection();
	}

	protected function _prepareColumns(){
		$this->addColumn('student_id',
			array(
				'header' => $this->__('ID'),
				'align'  => 'right',
				'width'  => '50px',
				'index'  => 'student_id',
			)
		);

		$this->addColumn('first_name',
			array(
				'header' => $this->__('First Name'),
				'index'  => 'first_name',
			)
		);

		$this->addColumn('last_name',
			array(
				'header' => $this->__('Last Name'),
				'index'  => 'last_name',
			)
		);

		$this->addColumn('email',
			array(
				'header' => $this->__('Email'),
				'index'  => 'email',
			)
		);

		$this->addExportType('*/*/exportStudentCsv',$this->__('CSV'));
		$this->addExportType('*/*/exportStudentExcel',$this->__('Excel XML'));

		return parent::_prepareColumns();
	}

	public function getRowUrl($row){
		return $this->getUrl('*/*/edit',array('id'=>$row->getId()));
	}

}