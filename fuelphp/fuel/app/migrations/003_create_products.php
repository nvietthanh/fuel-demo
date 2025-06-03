<?php

namespace Fuel\Migrations;

class Create_products
{
	public function up()
	{
		\DBUtil::create_table('products', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'name' => array('constraint' => 255, 'null' => false, 'type' => 'varchar'),
			'image_path' => array('constraint' => 255, 'null' => false, 'type' => 'varchar'),
			'description' => array('null' => false, 'type' => 'text'),
			'category_id' => array('constraint' => 11, 'unsigned' => true, 'null' => false, 'type' => 'int'),
			'price' => array('null' => false, 'type' => 'bigint'),
			'quantity' => array('constraint' => 11, 'null' => false, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'null' => true, 'type' => 'int', 'unsigned' => true),
			'updated_at' => array('constraint' => 11, 'null' => true, 'type' => 'int', 'unsigned' => true),
			'deleted_at' => array('constraint' => 11, 'null' => true, 'type' => 'int', 'unsigned' => true),
		), array('id'));

		\DB::query("
			ALTER TABLE `products`
			ADD CONSTRAINT `fk_products_category`
			FOREIGN KEY (`category_id`)
			REFERENCES `categories`(`id`)
			ON DELETE CASCADE
			ON UPDATE CASCADE
		")->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('products');
	}
}