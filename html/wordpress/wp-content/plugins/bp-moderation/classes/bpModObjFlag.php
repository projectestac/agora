<?php

bpModLoader::load_class('bpModAbstractDBobj');

/**
 * Flag Database Object
 *
 * Use this class for get/insert/update/delete single raw from the flags table
 *
 * @see bpModAbstractDBobj
 */
class bpModObjFlag extends bpModAbstractDBobj
{

	/**
	 * define proprierties and optionally get row
	 *
	 * @param bool|int $id id of the row to get from the db
	 */
	function __construct($id = false)
	{
		$this->__table = bpModeration::get_property('flags_table');

		$this->__obj_name = 'bp_moderation_flag';

		$this->__id_field = 'flag_id';

		$this->__fields_format['content_id'] = '%d';
		$this->__fields_format['reporter_id'] = '%d';
		$this->__fields_format['date'] = '%s';

		parent::__construct($id);
	}
}

?>