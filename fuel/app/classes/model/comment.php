<?php

class Model_Comment extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'body',
		'thread_id',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => true,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => true,
		),
	);

  protected static $_belongs_to = ['thread'];

}
