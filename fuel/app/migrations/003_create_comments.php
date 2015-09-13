<?php

namespace Fuel\Migrations;

class Create_comments
{
	public function up()
	{
		\DBUtil::create_table('comments', [
			'id' => ['constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true],
			'body' => ['type' => 'text'],
			'thread_id' => ['constraint' => 11, 'type' => 'int', 'unsigned' => true],
			'created_at' => ['type' => 'timestamp', 'null' => true],
			'updated_at' => ['type' => 'timestamp', 'null' => true],
		], ['id']);

		\DBUtil::add_foreign_key('comments', [
			  'constraint' => 'index_comments_to_thread',
		    'key' => 'thread_id',
		    'reference' => [
		        'table' => 'threads',
		        'column' => 'id',
		    ],
		    'on_update' => 'CASCADE',
		    'on_delete' => 'CASCADE'
		]);
	}

	public function down()
	{
		\DBUtil::drop_table('comments');
	}
}
