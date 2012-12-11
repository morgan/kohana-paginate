<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Paginate Dispatch driver
 * 
 * @package		Paginate
 * @author		Micheal Morgan <micheal@morgan.ly>
 * @copyright	(c) 2011-2012 Micheal Morgan
 * @license		MIT
 */
class Kohana_Paginate_Dispatch extends Paginate
{
	/**
	 * Apply limit
	 * 
	 * @access	protected
	 * @param	int
	 * @return	void
	 */
	protected function _limit($start, $length)
	{
		$this->_object
			->where('page_length', $length)
			->where('page_start', $start);
	}
	
	/**
	 * Apply sort
	 * 
	 * @access	protected
	 * @param	string
	 * @return	void
	 */
	protected function _sort($column, $direction)
	{
		$this->_object->where('page_sort_' . $column, $direction);
	}
	
	/**
	 * Apply search query
	 * 
	 * @access	protected
	 * @param	string
	 * @param	string
	 * @return	void
	 */
	protected function _search($query)
	{
		$this->_object->where('page_search', $query);
	}
	
	/**
	 * Count
	 * 
	 * @access	protected
	 * @return	int
	 */
	protected function _count()
	{
		return $this->_result['count'];
	}
	
	/**
	 * Count total
	 * 
	 * @access	protected
	 * @return	int
	 */
	protected function _count_total()
	{
		return $this->_result['count_total'];
	}	
	
	/**
	 * Count search total
	 * 
	 * @access	protected
	 * @return	int
	 */
	protected function _count_search_total()
	{
		return $this->_result['count_search_total'];
	}	

	/**
	 * Execute result on object
	 * 
	 * @access	protected
	 * @return	mixed
	 */
	protected function _execute()
	{
		return $this->_object->find()->as_array();
	}
}
