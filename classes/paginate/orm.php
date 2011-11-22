<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Paginate ORM driver
 * 
 * @package		Paginate
 * @author		Micheal Morgan <micheal@morgan.ly>
 * @copyright	(c) 2011 Micheal Morgan
 * @license		MIT
 */
class Paginate_ORM extends Paginate_Database
{
	/**
	 * Count total
	 * 
	 * @access	protected
	 * @return	int
	 */
	protected function _count_total()
	{
		return $this->_object_clone->count_all();
	}
	
	/**
	 * Execute result on object
	 * 
	 * @access	protected
	 * @return	mixed
	 */
	protected function _execute()
	{
		return $this->_object->find_all();
	}
}