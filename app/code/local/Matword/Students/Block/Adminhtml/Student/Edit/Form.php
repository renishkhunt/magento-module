<?php

class Matword_Students_Block_Adminhtml_Student_Edit_Form extends Mage_Adminhtml_Block_Widget_Form{

	public function __construct(){

		parent::__construct();

		$this->setId('matword_students_student_form');
		$this->setTitle($this->__('Student Information'));

	}

	protected function _prepareForm(){

		$model = Mage::registry('matword_students');

		$form = new Varien_Data_Form(array(
			'id' => 'edit_form',
			'action' => $this->getUrl('*/*/save',array('id',$this->getRequest()->getParam('id'))),
			'method' => 'post',
		));

		$fieldset = $form->addFieldset('base_fieldset',array(
			'legend' => Mage::helper('checkout')->__('Student Information'),
			'class'  => 'fieldset-wide'
		));

		if($model->getId()){
			$fieldset->addField('student_id','hidden',array(
				'name' => 'student_id',
			));
		}

		$fieldset->addField('first_name','text',array(
			'name' => 'first_name',
			'label' => Mage::helper('checkout')->__('First Name'),
			'title' => Mage::helper('checkout')->__('First Name'),
			'required' => true,
		));

		$fieldset->addField('last_name','text',array(
			'name' => 'last_name',
			'label' => Mage::helper('checkout')->__('Last Name'),
			'title' => Mage::helper('checkout')->__('Last Name'),
			'required' => true,
		));

		$fieldset->addField('email','text',array(
			'name' => 'email',
			'label' => Mage::helper('checkout')->__('Email'),
			'title' => Mage::helper('checkout')->__('Email'),
			'required' => true,
		));

		$form->setValues($model->getData());
		$form->setUseContainer(true);
		$this->setForm($form);

		return parent::_prepareForm();

	}	

}