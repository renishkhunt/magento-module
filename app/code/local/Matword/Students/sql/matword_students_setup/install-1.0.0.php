<?php

$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
		 ->newTable($installer->getTable('matword_students/student'))
		 ->addColumn('student_id',Varien_Db_Ddl_Table::TYPE_INTEGER,null,array(
		 	'identity' => true,
		 	'unsigned' => true,
		 	'nullable' => false,
		 	'primary' => true,
		 ),'Student Id')
		 ->addColumn('first_name',Varien_Db_Ddl_Table::TYPE_VARCHAR,null,array(
		 	'nullable' => true,
		 ),'First Name')
		 ->addColumn('last_name',Varien_Db_Ddl_Table::TYPE_VARCHAR,null,array(
		 	'nullable' => true,
		 ),'Last Name')
		 ->addColumn('email',Varien_Db_Ddl_Table::TYPE_VARCHAR,null,array(
		 	'nullable' => true,
		 ),'Email');
$installer->getConnection()->createTable($table);

$installer->endSetup();