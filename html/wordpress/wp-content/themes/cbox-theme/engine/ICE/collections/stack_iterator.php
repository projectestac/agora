<?php
/**
 * ICE API: stack collection iterator class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage collections
 * @since 1.0
 */

/**
 * Implements an iterator for a stack.
 *
 * This is a fork of the Yii CStackIterator implementation
 *
 * Originally authored by Qiang Xue for the {@link http://www.yiiframework.com/ Yii Framework},
 * Copyright 2008-2010 {@link http://www.yiiframework.com/ Yii Software LLC},
 * and released under the {@link http://www.yiiframework.com/license/ Yii License}
 *
 * @package ICE
 * @subpackage collections
 */
class ICE_Stack_Iterator
	extends ICE_Base
		implements Iterator
{
	/**
	 * The data to be iterated through.
	 * 
	 * @var array
	 */
	private $data;
	
	/**
	 * Index of the current item.
	 * 
	 * @var integer
	 */
	private $index;
	
	/**
	 * Count of the data items.
	 * 
	 * @var integer
	 */
	private $count;

	/**
	 * Constructor
	 * 
	 * @param array $data The data to be iterated through
	 */
	public function __construct( &$data )
	{
		$this->data = &$data;
		$this->index = 0;
		$this->count = count( $this->data );
	}

	/**
	 * Rewinds internal array pointer.
	 */
	public function rewind()
	{
		$this->index = 0;
	}

	/**
	 * Returns the key of the current array item.
	 *
	 * @return integer
	 */
	public function key()
	{
		return $this->index;
	}

	/**
	 * Returns the current array item.
	 *
	 * @return mixed
	 */
	public function current()
	{
		return $this->data[$this->index];
	}

	/**
	 * Moves the internal pointer to the next array item.
	 */
	public function next()
	{
		$this->index++;
	}

	/**
	 * Returns whether there is an item at current position.
	 *
	 * @return boolean
	 */
	public function valid()
	{
		return $this->index < $this->count;
	}
}
