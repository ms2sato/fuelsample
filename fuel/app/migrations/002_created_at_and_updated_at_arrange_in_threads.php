<?php

namespace Fuel\Migrations;

class Created_at_and_updated_at_arrange_in_threads
{
	public function up()
	{
		\DBUtil::modify_fields('threads', [
    	'created_at' => ['type' => 'timestamp', 'null' => true],
    	'updated_at' => ['type' => 'timestamp', 'null' => true]
		]);
	}

	public function down()
	{
		\DBUtil::modify_fields('threads', [
    	'created_at' => ['constraint' => 11, 'type' => 'int', 'null' => true],
    	'updated_at' => ['constraint' => 11, 'type' => 'int', 'null' => true]
		]);
	}
}
