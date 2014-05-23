<?php

bpModLoader::load_class('bpModAbstractDBobj');

/**
 * Content Database Object
 *
 * Use this class for get/insert/update/delete single raw from the contents table
 *
 * @see bpModAbstractDBobj
 */
class bpModObjContent extends bpModAbstractDBobj
{

	/**
	 * define proprierties and optionally get row
	 *
	 * @param bool|int $id id of the row to get from the db
	 */
	function __construct($id = false)
	{
		$this->__table = bpModeration::get_property('contents_table');

		$this->__obj_name = 'bp_moderation_content';

		$this->__id_field = 'content_id';

		$this->__fields_format['item_type'] = '%s';
		$this->__fields_format['item_id'] = '%d';
		$this->__fields_format['item_id2'] = '%d';
		$this->__fields_format['item_author'] = '%d';
		$this->__fields_format['item_url'] = '%s';
		$this->__fields_format['item_date'] = '%s';
		$this->__fields_format['status'] = '%s';

		parent::__construct($id);
	}
}

?>
