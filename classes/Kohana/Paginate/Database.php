<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Paginate Database driver
 * 
 * @package		Paginate
 * @author		Micheal Morgan <micheal@morgan.ly>
 * @copyright	(c) 2011-2012 Micheal Morgan
 * @license		MIT
 */
class Kohana_Paginate_Database extends Paginate
{
	/**
	 * Object clone
	 * 
	 * @access	protected
	 * @var		mixed	NULL|ORM
	 */
	protected $_object_clone;

	/**
	 * Object clone
	 * 
	 * @access	protected
	 * @var		mixed	NULL|ORM
	 */
	protected $_object_search_clone;

	/**
	 * Initialize
	 * 
	 * @access	public
	 * @param	object
	 * @return	void
	 */	
	public function __construct($object)
	{
		parent::__construct($object);
		
		$this->_object_clone = clone $this->_object;
		$this->_object_search_clone = clone $this->_object;
	}	
	
	/**
	 * Apply limit
	 * 
	 * @access	protected
	 * @param	int
	 * @return	void
	 */
	protected function _limit($start, $length)
	{
		$this->_object->offset($start)->limit($length);
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
		$this->_object->order_by($column, mysql_real_escape_string($direction));
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
		// Use search columns if specified; otherwise, search across all columns
		$columns = ( ! empty($this->_search_columns)) ? $this->_search_columns : $this->_columns;

		if (count($columns) > 0)
		{
			$query = '%' . mysql_real_escape_string($query) . '%';
			
			$this->_object->where_open();
			$this->_object_search_clone->where_open();

			foreach ($columns as $key => $column)
			{
				if ($key === 0)
				{
					$this->_object->where($column, 'like', $query);
					$this->_object_search_clone->where($column, 'like', $query);
				}
				else
				{
					$this->_object->or_where($column, 'like', $query);
					$this->_object_search_clone->or_where($column, 'like', $query);
				}
			}

			$this->_object->where_close();
			$this->_object_search_clone->where_close();
		}
	}
	
	/**
	 * Count
	 * 
	 * @access	protected
	 * @return	int
	 */
	protected function _count()
	{
		return count($this->_result);
	}	
	
	/**
	 * Count total
	 * 
	 * @access	protected
	 * @return	int
	 */
	protected function _count_total()
	{
		return $this->_object_clone
			->select(array(DB::expr('COUNT("*")'), 'paginate_count'))
			->execute()
			->get('paginate_count');
	}	
	
	/**
	 * Count search total
	 * 
	 * @access	protected
	 * @return	int
	 */
	protected function _count_search_total()
	{
		return $this->_object_search_clone
			->select(array(DB::expr('COUNT("*")'), 'paginate_count'))
			->execute()
			->get('paginate_count');
	}

	/**
	 * Execute result on object
	 * 
	 * @access	protected
	 * @return	mixed
	 */
	protected function _execute()
	{
		return $this->_object->execute();
	}
}
